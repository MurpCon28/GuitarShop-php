<?php
require_once 'classes/Connection.php';

class Brand {
    public $id;
    public $name;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'name' => $this->name
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO brands(
                        name
                    ) VALUES (
                        :name
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE brands SET
                        name = :name
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save brand");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving brand");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('brands');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved brand cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM brands WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete brand");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting brands");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM brands';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve brands");
        }
        else {
            $brands = $stmt->fetchAll(PDO::FETCH_CLASS, 'Brand');
            return $brands;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM brands WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve brand");
        }
        else {
            $brand = $stmt->fetchObject('Brand');
            return $brand;
        }
    }
}
?>
