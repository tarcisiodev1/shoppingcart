<?php

require 'Product.php'; // Requer o arquivo Product.php que contém a classe Product
require 'Cart.php'; // Requer o arquivo Cart.php que contém a classe Cart

session_start(); // Inicia a sessão

$cart = new Cart; // Instancia um objeto da classe Cart
$productsInCart = $cart->getCart(); // Obtém os produtos no carrinho

var_dump($productsInCart); // Exibe o conteúdo do carrinho

if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']); // Remove qualquer tag HTML indesejada do ID
    $cart->remove($id); // Remove o produto do carrinho com base no ID fornecido
    header('Location: mycart.php'); // Redireciona de volta para a página mycart.php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="/">Go to home</a>

    <ul>
        <?php if (count($productsInCart) <= 0) : ?>
        Nenhum produto no carrinho
        <?php endif; ?>

        <?php foreach ($productsInCart as $product) : ?>
        <li>
            <?php echo $product->getName(); ?>
            <input type="text" value="<?php echo $product->getQuantity() ?>">
            Price: R$ <?php echo number_format($product->getPrice(), 2, ',', '.') ?>
            Subtotal: R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?>
            <a href="?id=<?php echo $product->getId(); ?>">remove</a>
        </li>
        <?php endforeach; ?>
        <li>Total: R$ <?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></li>
    </ul>

</body>

</html>