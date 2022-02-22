<?php
require_once 'classes/Connection.php';

class Guitarbody {
    public $id;
    public $body;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'body' => $this->body
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO guitarbodys(
                        body
                    ) VALUES (
                        :body
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE guitarbodys SET
                        body = :body
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save guitarbody");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving guitarbody");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('guitarbodys');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved guitarbody cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM guitarbodys WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete guitarbody");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting guitarbody");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM guitarbodys';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve guitarbodys");
        }
        else {
            $guitarbodys = $stmt->fetchAll(PDO::FETCH_CLASS, 'Guitarbody');
            return $guitarbodys;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM guitarbodys WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve guitarbody");
        }
        else {
            $guitarbody = $stmt->fetchObject('Guitarbody');
            return $guitarbody;
        }
    }
}
?>
