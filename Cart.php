<?php

class Cart
{
    public function add(Product $product)
    {
        $inCart = false; // Variável para verificar se o produto já está no carrinho
        $this->setTotal($product); // Atualiza o total do carrinho com base no produto

        if (count($this->getCart()) > 0) { // Verifica se o carrinho não está vazio
            foreach ($this->getCart() as $productInCart) {
                if ($productInCart->getId() === $product->getId()) { // Verifica se o produto já está no carrinho
                    $quantity = $productInCart->getQuantity() + $product->getQuantity(); // Atualiza a quantidade do produto
                    $productInCart->setQuantity($quantity); // Define a nova quantidade do produto
                    $inCart = true;
                    break;
                }
            }
        }

        if (!$inCart) { // Se o produto não estiver no carrinho, adiciona-o
            $this->setProductsInCart($product);
        }
    }

    private function setProductsInCart($product)
    {
        $_SESSION['cart']['products'][]  = $product; // Adiciona o produto ao carrinho na sessão
    }

    private function setTotal(Product $product)
    {
        $_SESSION['cart']['total'] += $product->getPrice() * $product->getQuantity(); // Atualiza o total do carrinho na sessão
    }

    public function remove(int $id)
    {
        if (isset($_SESSION['cart']['products'])) { // Verifica se há produtos no carrinho
            foreach ($this->getCart() as $index => $product) {
                if ($product->getId() === $id) { // Verifica se o produto corresponde ao ID fornecido
                    unset($_SESSION['cart']['products'][$index]); // Remove o produto do carrinho na sessão
                    $_SESSION['cart']['total'] -= $product->getPrice() * $product->getQuantity(); // Atualiza o total do carrinho na sessão
                }
            }
        }
    }

    public function getCart()
    {
        return $_SESSION['cart']['products'] ?? []; // Retorna o conteúdo do carrinho da sessão
    }

    public function getTotal()
    {
        return $_SESSION['cart']['total'] ?? 0; // Retorna o total do carrinho da sessão
    }
}

?>