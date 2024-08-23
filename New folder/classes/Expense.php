<?php
require_once 'Database.php';

class Expense {
    private $db;

    public $id;
    public $title;
    public $categoryId;
    public $accountId;
    public $amount;
    public $description;
    public $date;
    public $userId;

    public function __construct() {
        $this->db = new Database();
    }

    public function create() {
        $stmt = $this->db->prepare("INSERT INTO bills (UserId, Title, Dates, CategoryId, AccountId, Amount, Description) VALUES ( ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issiids", $this->userId,$this->title, $this->date, $this->categoryId,$this->accountId, $this->amount, $this->description);
        return $stmt->execute();
    }

    public function read() {
        $stmt = $this->db->prepare("SELECT * FROM bills WHERE UserId = ? ORDER BY dates DESC");
        $stmt->bind_param("i", $this->userId);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function totalAmount() {
        $stmt = $this->db->prepare("SELECT SUM(amount) as total_amount FROM bills WHERE UserId = ?");
        $stmt->bind_param("i", $this->userId);
        $stmt->execute();
        $stmt->bind_result($total_amount);
        $stmt->fetch();
        return $total_amount;
    }

    public function __destruct() {
        $this->db->close();
    }
}
?>
