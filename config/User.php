<?php 
 
 require_once ('Database.php');


 class User{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

   
    // User Login 
    public function userLogin($sql) {
        $result = $this->db->query($sql);
        if ($result === false) {
            throw new Exception("Error executing query: " . $this->db->error);
        }

        // Check if the result is a valid mysqli_result
        if ($result instanceof mysqli_result) {
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Set session variables
                $_SESSION['user_id'] = $user['UserId'];
                $_SESSION['name'] = $user['FirstName'].$user['LastName'];
                $_SESSION['logged_in'] = true;

                return true; // Login successful
            } else {
                return false; // No matching user found
            }
        } else {
            throw new Exception("Query did not return a valid result set.");
        }
    }

    // User Registration 
    public function userRegistration($sql){
        
        $insert_row = $this->db->query($sql) or 
        die($this->db->error.__LINE__);
        
        if($insert_row){
            return $insert_row;
            
        } else {
            return false;
        }
    }

    // Update data
    public function update($query){
        $update_row = $this->db->query($query) or 
        die($this->db->error.__LINE__);
        if($update_row){
        return $update_row;
        } else {
        return false;
        }
    }

    // Delete data
    public function delete($query){
        $delete_row = $this->db->query($query) or 
        die($this->db->error.__LINE__);
        if($delete_row){
        return $delete_row;
        } else {
        return false;
        }
    }
   



 }
 
?>