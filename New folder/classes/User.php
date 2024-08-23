<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($firstName,$lastName,$email, $password) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO user (FirstName, LastName, Email, Password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstName,$lastName,$email, $password_hash);
        return $stmt->execute();
    }

    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT id, Password FROM user WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            
            $stmt->fetch();
            
            if (password_verify($password, $hashed_password)) {
                return $id;
            }
        }
        return false;
    }

    public function __destruct() {
        $this->db->close();
    }
}
?>
