<?php
require_once "db.class.php";

class Cart extends Db
{
    private $user_id;
    private $product_id;
    private $quantity;
    private $price;


    public function __construct($user_id, $product_id, $quantity, $price)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function insertCart()
    {
        try {
            $sql = "INSERT INTO cart(user_id, product_id, quantity, price) VALUES (:user_id, :product_id, :quantity, :price)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['user_id' => $this->user_id, 'product_id' => $this->product_id, 'quantity' => $this->quantity, 'price' => $this->price]);
        } catch (PDOException $p) {
            echo "Something went wrong!";
        }
    }

    public function getCartAll() {
        
    }
}
