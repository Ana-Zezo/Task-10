<?php

class DB
{
    private $conn;

    // Connection Database
    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=clinic", "root", "");
    }
    public function createTable($table, $data)
    {
        $columns = implode(", ", $data);
        $sql = "CREATE TABLE IF NOT EXISTS `$table` (
        `id` BIGINT PRIMARY KEY AUTO_INCREMENT,
        $columns
    )";
        $result = $this->conn->query($sql);
    }
    // Fetch Data From Table
    public function getData($table, $col = "*", $condition = true)
    {
        $sql = "SELECT $col FROM `$table` WHERE $condition";
        $result = $this->conn->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getArray($table, $col = "*", $condition = true)
    {
        $sql = "SELECT $col FROM `$table` WHERE $condition";
        $result = $this->conn->query($sql);
        return $result->fetchObject(PDO::FETCH_ASSOC);
    }

    // Inset Data Into Table
    public function insertData($table, $data)
    {
        $columns = $this->getColumn($data);
        $values = $this->getValue($data);
        $sql = "INSERT INTO `$table`($columns) VALUES($values)";
        $result = $this->conn->query($sql);
    }

    // Update Data From Table
    // UPDATE `tasks` SET `id`='[value-1]',`task`='[value-2]' WHERE 1
    public function updateData($table, $data, $condition = true)
    {
        $setValues = $this->getSetValues($data);
        $sql = "UPDATE `$table` SET $setValues WHERE $condition";
        $result = $this->conn->query($sql);
    }
    private function getSetValues($data)
    {
        $setValuesArr = [];
        foreach ($data as $column => $value) {
            // If the value is not an integer, add single quotes
            $value = is_integer($value) ? $value : "'$value'";
            $setValuesArr[] = "`$column` = $value";
        }

        return implode(", ", $setValuesArr);
    }

    public function deleteData($table, $condition = true)
    {
        $sql = "DELETE FROM `$table` WHERE $condition";
        $result = $this->conn->query($sql);
    }
    private function getColumn($data)
    {
        // ['name' => 'Mezo' , 'email => "user@gmail.com"]
        $col = array_keys($data);
        // I Want To Add Backtect Before And After Column
        $newCol = array_map(function ($item) {
            return "`" . $item . "`";
        }, $col);
        // Convert Array To String Sparated By ,
        // To GET [`title`,`email`,`pass`];
        return implode(",", $newCol);
    }
    private function getValue($data)
    {
        // Get Value Of Column
        $value = array_values($data);

        // I Want To Add Single Qoutation Before And After Value
        $arrValue = array_map(function ($item) {
            if (is_integer($item)) {
                return $item;
            } else {
                return "'" . $item . "'";
            }

        }, $value);
        return implode(",", $arrValue);
    }
    public function countRows($table)
    {
        $sql = "SELECT COUNT(*) AS row_count FROM `$table`";
        $stmt = $this->conn->query($sql);

        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_OBJ);
            $rowCount = $row->row_count; // Access the property directly
            return $rowCount;
        } else {
            return 0; // Return 0 if an error occurs or no results are found
        }
    }
    public function getPaginatedData($table, $page, $perPage)
    {
        $page = max(1, $page);
        $perPage = max(1, $perPage);

        $start = ($page - 1) * $perPage;

        $stmt = $this->conn->prepare("SELECT * FROM $table LIMIT :start, :perPage");
        $stmt->bindParam(':start', $start, PDO::PARAM_INT);
        $stmt->bindParam(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
}
$users = new DB();
$users->createTable("users", ["`name` VARCHAR(255)", "`phone` VARCHAR(255)", "`email` VARCHAR(255)", "`password` VARCHAR(255)", "`role` ENUM('0','1')"]);
$users->createTable("doctors", ["`name` VARCHAR(255)", "`bio` VARCHAR(75)", "price BIGINT", "`image` VARCHAR(255)", "status ENUM('0','1')", "`major_id` BIGINT"]);
$users->createTable("majors", ["`name` VARCHAR(255)", "`status` ENUM('0','1')", "`image` VARCHAR(255)"]);
$users->createTable("contacts", ["`name` VARCHAR(255)", "`phone` VARCHAR(255)", "`email` VARCHAR(255)", "`subject` VARCHAR(255)", "`message` TEXT"]);
$users->createTable("booking", ["`name` VARCHAR(255)", "`phone` VARCHAR(255)", "`user_id` BIGINT", "`doctor_id` BIGINT", "`date` date", "`status` ENUM('No','Yes')"]);
// $users->updateData("majors", ["name" => "Nasser", "status" => "0", "image" => "newImage.jpg"], "id = 13");
// $users->getPaginatedData($table, $page, $perPage);