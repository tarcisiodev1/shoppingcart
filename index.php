<?php

require 'Cart.php'; // Requer o arquivo Cart.php que contém a classe Cart
require 'Product.php'; // Requer o arquivo Product.php que contém a classe Product

session_start(); // Inicia a sessão

$products = [
    1 => ['id' => 1, 'name' => 'geladeira', 'price' => 1000, 'quantity' => 1],
    2 => ['id' => 2, 'name' => 'mouse', 'price' => 100, 'quantity' => 1],
    3 => ['id' => 3, 'name' => 'teclado', 'price' => 10, 'quantity' => 1],
    4 => ['id' => 4, 'name' => 'monitor', 'price' => 5000, 'quantity' => 1],
];

if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']); // Remove qualquer tag HTML indesejada do ID
    $productInfo = $products[$id]; // Obtém as informações do produto com base no ID fornecido

    $product = new Product; // Instancia um objeto da classe Product
    $product->setId($productInfo['id']); // Define o ID do produto
    $product->setName($productInfo['name']); // Define o nome do produto
    $product->setPrice($productInfo['price']); // Define o preço do produto
    $product->setQuantity($productInfo['quantity']); // Define a quantidade do produto

    $cart = new Cart; // Instancia um objeto da classe Cart
    $cart->add($product); // Adiciona o produto ao carrinho
}
echo "<pre>";
print_r($_SESSION['cart'] ?? []); // Exibe o conteúdo do carrinho
echo "</pre>";
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
    <a href="mycart.php">Go to cart</a>
    <ul>
        <li>Geladeira <a href="?id=1">Add</a> R$ 1000</li>
        <li>Mouse <a href="?id=2">Add</a> R$ 2000</li>
        <li>Teclado <a href="?id=3">Add</a> R$ 100</li>
        <li>Monitor <a href="?id=4">Add</a> $$ 50</li>
    </ul>
</body>

</html>