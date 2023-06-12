<?php

class Product
{
    private int $id; // Propriedade privada para armazenar o ID do produto
    private string $name; // Propriedade privada para armazenar o nome do produto
    private int $price; // Propriedade privada para armazenar o preço do produto
    private int $quantity; // Propriedade privada para armazenar a quantidade do produto

    public function setId(int $id)
    {
        $this->id = $id; // Define o ID do produto
    }

    public function setName(string $name)
    {
        $this->name = $name; // Define o nome do produto
    }

    public function setPrice(int $price)
    {
        $this->price = $price; // Define o preço do produto
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity; // Define a quantidade do produto
    }

    public function getId()
    {
        return $this->id; // Retorna o ID do produto
    }

    public function getName()
    {
        return $this->name; // Retorna o nome do produto
    }

    public function getPrice()
    {
        return $this->price; // Retorna o preço do produto
    }

    public function getQuantity()
    {
        return $this->quantity; // Retorna a quantidade do produto
    }
}

?>