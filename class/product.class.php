<?php
require_once "db.class.php";

class Product extends Db
{
    protected $name;
    protected $tag;
    protected $price;
    protected $catagory;
    protected $url;


    public function __construct()
    {
    }

    public function initProd($name, $price, $tag, $catagory, $url)
    {
        $this->name = $name;
        $this->price = $price;
        $this->tag = $tag;
        $this->catagory = $catagory;
        $this->url = $url;
    }

    public function insertProduct()
    {
        try {
            $sql =
                'INSERT INTO product(product_name, product_tag, product_price, product_catagory, product_image) VALUES (:name, :tag, :price, :catagory, :image)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['name' => $this->name, 'tag' => $this->tag, 'price' => $this->price, 'catagory' => $this->catagory, 'image' => $this->url]);
        } catch (PDOException $e) {
            echo "Something went wrong!"; //Change should be made here.
        }
    }

    public function getProducts()
    {
        $product = array();
        try {
            $sql = 'SELECT * FROM product';
            $i = 0;
            $stmt = $this->connect()->query($sql);
            while ($row = $stmt->fetch()) {
                $product[$i] = array($row['product_name'], $row['product_price'], $row['product_tag'], $row['product_catagory'], $row['product_image'], $row['product_id']);
                $i++;
            }
            return $product;
        } catch (PDOException $e) {
            echo "Something went wrong!";
        }
    }

    public function getProduct($id)
    {
        try {
            $sql = 'SELECT * FROM product where product_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $arr = array($result["product_id"], $result["product_name"], $result["product_tag"], $result["product_price"], $result["product_catagory"], $result["product_image"]);
            return $arr;
        } catch (PDOException $e) {
            echo "Something went wrong!";
        }
    }
}


// $sql = "SELECT * FROM USER";
// $stmt = $this->connect()->query($sql);
// # Fetch() just get one row
// while ($row = $stmt->fetch()) {
//     echo $row['user_name'];
// }