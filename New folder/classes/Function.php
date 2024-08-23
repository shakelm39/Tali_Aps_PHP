<?php
require_once 'Database.php';

class FuncClass {
    private $db;

    public $id;
    
    public $categoryName;
    public $label;
    
    public $userId;

    public function __construct() {
        $this->db = new Database();
    }

    public function category_create() {
        $stmt = $this->db->prepare("INSERT INTO category (UserId, CategoryName, Level) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $this->userId,$this->categoryName, $this->label);
        return $stmt->execute();
    }

    public function category_read() {
        $stmt = $this->db->prepare("SELECT CategoryId, UserId, CategoryName, Level FROM category WHERE UserId=?");
        $stmt->bind_param("i", $this->userId);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function accounts_create() {
        $stmt = $this->db->prepare("INSERT INTO category (UserId, CategoryName, Level) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $this->userId,$this->categoryName, $this->label);
        return $stmt->execute();
    }

    public function accounts_read() {
        $stmt = $this->db->prepare("SELECT AccountId, UserId, AccountName FROM account WHERE UserId=?");
        $stmt->bind_param("i", $this->userId);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function __destruct() {
        $this->db->close();
    }
}
?>
