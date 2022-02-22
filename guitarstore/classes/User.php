<?php
require_once 'classes/Connection.php';

class User {
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $password;
    public $role_id;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
            'role_id' => $this->role_id
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO users(
                        first_name, last_name, email, phone, password, role_id
                    ) VALUES (
                        :first_name, :last_name, :email, :phone, :password, :role_id
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE users SET
                        first_name = :first_name,
                        last_name = :last_name,
                        email = :email,
                        phone = :phone,
                        password = :password,
                        role_id = :role_id
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save user");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving user");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('users');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved user cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM users WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete user");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting user");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM users';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve users");
        }
        else {
            $users = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');
            return $users;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM users WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve user");
        }
        else {
            $user = $stmt->fetchObject('User');
            return $user;
        }
    }

    public static function findByEmail($email) {
        $params = array(
            'email' => $email
        );
        $sql = 'SELECT * FROM users WHERE email = :email';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve user");
        }
        else {
            $user = $stmt->fetchObject('User');
            return $user;
        }
    }
}
?>
