<?php
require_once 'classes/Connection.php';

class Guitar {
    public $id;
    public $guitar_name;
    public $price;
    public $handedness;
    public $guitar_quote;
    public $description;
    public $image;
    public $brand;
    public $guitar_body;
    public $colour;
    public $material_type;
    public $num_frets;

    public function __construct() {
    }

    public function save() {
        $params = array(
            'guitar_name' => $this->guitar_name,
            'price' => $this->price,
            'handedness' => $this->handedness,
            'guitar_quote' => $this->guitar_quote,
            'description' => $this->description,
            'image' => $this->image,
            'brand' => $this->brand,
            'guitar_body' => $this->guitar_body,
            'colour' => $this->colour,
            'material_type' => $this->material_type,
            'num_frets' => $this->num_frets
        );

        if ($this->id === NULL) {
            $sql = "INSERT INTO guitars(
                        guitar_name, price, handedness, guitar_quote, description, image, brand, guitar_body, colour, material_type, num_frets
                    ) VALUES (
                        :guitar_name, :price, :handedness, :guitar_quote, :description, :image, :brand, :guitar_body, :colour, :material_type, :num_frets
                    )";
        }
        else if ($this->id !== NULL) {
            $params["id"] = $this->id;

            $sql = "UPDATE guitars SET
                        guitar_name = :guitar_name,
                        price = :price,
                        handedness = :handedness,
                        guitar_quote = :guitar_quote,
                        description = :description,
                        image = :image,
                        brand = :brand,
                        guitar_body = :guitar_body,
                        colour = :colour,
                        material_type = :material_type,
                        num_frets = :num_frets
                    WHERE id = :id";
        }

        $conn = Connection::getInstance();
        $stmt = $conn->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to save guitar");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error saving guitar");
            }
            if ($this->id === NULL) {
                $this->id = $conn->lastInsertId('guitars');
            }
        }
    }

    public function delete() {
        if (empty($this->id)) {
            throw new Exception("Unsaved guitar cannot be deleted");
        }
        $params = array(
            'id' => $this->id
        );
        $sql = 'DELETE FROM guitars WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to delete guitar");
        }
        else {
            $rowCount = $stmt->rowCount();
            if ($rowCount !== 1) {
                throw new Exception("Error deleting guitar");
            }
        }
    }

    public static function all() {
        $sql = 'SELECT * FROM guitars';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve guitars");
        }
        else {
            $guitars = $stmt->fetchAll(PDO::FETCH_CLASS, 'Guitar');
            return $guitars;
        }
    }

    public static function find($id) {
        $params = array(
            'id' => $id
        );
        $sql = 'SELECT * FROM guitars WHERE id = :id';
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute($params);
        if (!$success) {
            throw new Exception("Failed to retrieve guitar");
        }
        else {
            $guitar = $stmt->fetchObject('Guitar');
            return $guitar;
        }
    }
    
//    public static function newest($amount) {
//        $sql = 'SELECT * FROM guitars ORDER BY id DESC LIMIT 3';
//        $connection = Connection::getInstance();
//        $stmt = $connection->prepare($sql);
//        $success = $stmt->execute();
//        if (!$success) {
//            throw new Exception("Failed to retrieve guitar");
//        }
//        else {
//            $guitar = $stmt->fetchObject('Guitar');
//            return $guitar;
//        }
//    }

        public static function newest($amount) {
        $sql = 'SELECT * FROM guitars ORDER BY id DESC LIMIT '. $amount;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve guitars");
        }
        else {
            $guitars = $stmt->fetchAll(PDO::FETCH_CLASS, 'Guitar');
            return $guitars;
        }
    }
    public static function popular($amount) {
        $sql = 'SELECT * FROM guitars ORDER BY id ASC LIMIT '. $amount;
        $connection = Connection::getInstance();
        $stmt = $connection->prepare($sql);
        $success = $stmt->execute();
        if (!$success) {
            throw new Exception("Failed to retrieve guitars");
        }
        else {
            $guitars = $stmt->fetchAll(PDO::FETCH_CLASS, 'Guitar');
            return $guitars;
        }
    }
    
//    public static function newestOne() {
//        $sql = 'SELECT * FROM guitars ORDER BY id DESC LIMIT 1';
//        $connection = Connection::getInstance();
//        $stmt = $connection->prepare($sql);
//        $success = $stmt->execute();
//        if (!$success) {
//            throw new Exception("Failed to retrieve guitar");
//        }
//        else {
//            $guitar = $stmt->fetchObject('Guitar');
//            return $guitar;
//        }
//    }

}
?>
