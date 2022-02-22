<?php
require_once 'classes/Connection.php';

class Handed {
    public $id;
    public $hand;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'hand' => $this->hand
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO handedness(
                        hand
                    ) VALUES (
                        :hand
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE handedness SET
                        hand = :hand
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save handedness");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving handedness");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('handedness');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved handedness cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM handedness WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete handedness");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting handedness");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM handedness';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve handedness");
        }
        else {
            $handedness = $stmt->fetchAll(PDO::FETCH_CLASS, 'Handed');
            return $handedness;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM handedness WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve handedness");
        }
        else {
            $handedness = $stmt->fetchObject('Handed');
            return $handedness;
        }
    }
}
?>
