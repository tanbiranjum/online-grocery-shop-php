<?php
require_once "db.class.php";


class Order extends Db
{
    protected $orderId;
    protected $userId;
    protected $orderDate;
    protected $orderPhone;
    protected $orderCity;
    protected $orderDetails;
    protected $orderStatus;
    protected $orderPrice;

    public function initOrder($userId, $orderDate, $orderPhone, $orderDetails, $orderPrice, $orderCity)
    {
        $this->userId = $userId;
        $this->orderDate = $orderDate;
        $this->orderPhone = $orderPhone;
        $this->orderDetails = $orderDetails;
        $this->orderPrice = $orderPrice;
        $this->orderStatus = 'pending';
        $this->orderCity = $orderCity;
    }

    public function createOrder($id)
    {
        try {
            if ($this->getOrder($id) == -1) {
                $sql = "INSERT INTO customerorder(user_id,order_date,order_phone,order_city,oder_details, order_status, order_price) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$this->userId, $this->orderDate, $this->orderPhone, $this->orderCity, $this->orderDetails, $this->orderStatus, $this->orderPrice]);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "<script>alert(\"Error\")</script>";
        }
    }

    public function getOrder($user_id)
    {
        try {
            $sql = "SELECT order_id from customerorder WHERE user_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$user_id]);
            if ($result = $stmt->fetch()) {
                return $result['order_id'];
            } else {
                return -1;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertPDetails($orderId, $name, $quantity, $price)
    {
        try {
            $sql = "INSERT INTO orderdetails(order_id,product_name,order_quantity,order_price) VALUES (:oid, :name, :quantity, :price)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['oid' => $orderId, 'name' => $name, 'quantity' => $quantity, 'price' => $price]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function changeOrderStatus($id)
    {
        try {
            $status = "Confirmed";
            $sql = 'UPDATE customerorder SET order_status = ? WHERE order_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$status, $id]);
            return true;
        } catch (PDOException $e) {
            return false;
            echo $e->getMessage();
        }
    }

    public function getOrderDetails($user_id)
    {
        $result = array();
        try {
            $id = $this->getOrder($user_id);
            if ($id == -1) {
                return false;
            }
            $sql = "SELECT * FROM orderdetails where order_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            $i = 0;
            while ($row = $stmt->fetch()) {
                $result[$i] = array($row['product_name'], $row['order_quantity'], $row['order_price']);
                $i++;
            }
            return $result;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAllOrder()
    {
        $result = array();
        try {
            $sql = "SELECT * FROM customerorder";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $i = 0;
            while ($row = $stmt->fetch()) {
                $result[$i] = array($row['order_id'], $row['user_id'], $row['order_date'], $row['order_phone'], $row['order_price'], $row['ship_date'], $row['order_status']);
                $i++;
            }
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getOrderInformation($userId)
    {
        try {
            $sql = "SELECT * FROM customerorder WHERE user_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$userId]);
            while ($row = $stmt->fetch()) {
                $result = array($row['order_date'], $row['order_phone'], $row['order_city'], $row['oder_details'], $row['order_status'], $row['order_price']);
            }
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
