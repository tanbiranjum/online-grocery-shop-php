<?php

require_once "db.class.php";

class User extends Db
{
    private $name;
    private $email;
    private $phone;
    private $address;
    private $rule;
    private $pwd;
    private $repeatPwd;

    public function __construct()
    {
    }

    public function initProp($name, $phone, $email, $address, $pwd, $repeatPwd)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->rule = 'user';
        $this->pwd = $pwd;
        $this->repeatPwd = $repeatPwd;
    }

    // Validator
    public function checkIfExist($email)
    {
    }

    // Validator
    public function checkIfPwdSame($pwd, $repeatPwd)
    {
        if ($pwd == $repeatPwd) {
            return true;
        } else {
            return false;
        }
    }

    public function registerUser()
    {
        try {
            $sql = 'INSERT INTO user(user_name, user_phone, user_email, user_address, user_pwd) VALUES (:name, :phone, :email, :address, :pwd)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(['name' => $this->name, 'phone' => $this->phone, 'email' => $this->email, 'address' => $this->address, 'pwd' => $this->pwd]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            header("Location:" . URL_ROOT . '/signup.php');
        }
    }


    public function loginUser($email, $pwd)
    {
        try {
            $sql = "SELECT * FROM user WHERE user_email = ? AND user_pwd = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $pwd]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                return false;
            } else {
                setcookie('username', $result['user_name'], time() + (86400 * 1), "/");
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getUser($email)
    {
        try {
            $sql = 'SELECT * FROM user where user_email = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $arr = array($result["user_id"], $result["user_name"], $result["user_phone"], $result["user_email"], $result["user_address"], $result["user_rule"]);
            return $arr;
        } catch (PDOException $e) {
            echo "Something went wrong!";
        }
    }

    public function getUserById($id) {
        try {
            $sql = 'SELECT * FROM user where user_id = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $arr = array($result["user_id"], $result["user_name"], $result["user_phone"], $result["user_email"], $result["user_address"], $result["user_rule"]);
            return $arr;
        } catch (PDOException $e) {
            echo "Something went wrong!";
        }
    }

    public function updateUser($value, $i)
    {
        try {
            if ($i == 1) {
                $sql = "UPDATE user SET user_name = ? WHERE user_email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$value, $_SESSION['user']]);
                setcookie('username', $value, time() + (86400 * 1), "/");
            } else if ($i == 2) {
                $sql = "UPDATE user SET user_phone = ? WHERE user_email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$value, $_SESSION['user']]);
            } else if ($i == 3) {
                $sql = "UPDATE user SET user_phone = ? WHERE user_email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$value, $_SESSION['user']]);
                $_SESSION['user'] = $value;
            } elseif ($i == 4) {
                $sql = "UPDATE user SET user_pwd = ? WHERE user_email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$value, $_SESSION['user']]);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
