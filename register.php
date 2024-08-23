<?php include 'lib/header.php' ?>

<?php include 'config/User.php' ?>

<?php 
  $user = new User();
  if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO user (FirstName, LastName, Email, Password) VALUES('$firstName','$lastName','$email','$password')";
    $result = $user->userRegistration($sql);
    if($result){
      header('location: index.php');
    }
    
  }
?>   


    <div class="color-line"></div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3 style="color:#fff; padding:50px 0 20px 0;">
                      
                      Registration From 
                    </h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                      <?php 
                          if(isset($result)){
                            echo $msg;
                          }
                      ?>
                        <form action=""  method="POST">
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>First Name</label>
                                    <input name="firstName" type="text" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Last Name</label>
                                    <input type="text" name="lastName" class="form-control">
                                </div>
                                
                                <div class="form-group col-lg-12">
                                    <label>Email Address</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-success loginbtn">Register</button>
                                <p> Already have account? <a href="index.php"> Login here </a> </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        
    </div>

    <?php include 'lib/footer.php' ?>