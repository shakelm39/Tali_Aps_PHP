<?php 
 
 require_once ('Database.php');


 class userFunc{
    public $db;

    public function __construct(){
        $this->db = new Database();
    }

   
    //Create Data 

    public function createAccount($sql){
        $create_account = $this->db->query($sql);
        if($create_account){
            return $create_account;
        }
    }
    //Read Data 

    public function viewAccount($sql){
        $view_account = $this->db->query($sql);
        if($view_account){
            return $view_account;
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
   
    //Create Data 

    public function createCategory($sql){
        $create_account = $this->db->query($sql);
        if($create_account){
            return $create_account;
        }
    }
    //Read Data 

    public function viewCategory($sql){
        $view_account = $this->db->query($sql);
        if($view_account){
            return $view_account;
        }
    }

    //create asset

    public function createAsset($sql){
        $create_asset = $this->db->query($sql);
        if($create_asset){
            $msg = "<div class='alert alert-success'>Success!! Data inserted!!</div>";
            return $msg;
        }
    }
    //view asset
    public function viewAsset($sql){

        
        $view_asset = $this->db->query($sql);
        if($view_asset){
            return $view_asset;
        }
    }
    //create asset

    public function createExpense($sql){
        $create_expense= $this->db->query($sql);
        if($create_expense){
            $msg = "<div class='alert alert-success'>Success!! Data inserted!!</div>";
            return $msg;
        }
    }
    //view asset
    public function viewExpense($sql){
        $view_expense = $this->db->query($sql);
        if($view_expense){
            return $view_expense;
        }
    }
    
 }
 
?>