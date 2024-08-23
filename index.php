<?php include 'lib/header.php' ?>
<?php 

    require_once 'config/User.php';
        session_start();
     $login = new User();
    if(isset($_POST['login'])){
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedPassword = md5($password);

        $sql = "SELECT * FROM user WHERE Email = '$email' AND Password = '$hashedPassword'";
        
        $row = $login->userLogin($sql);
        
       
        if($row){
            
            header('Location: dashboard.php');
        }
    }
?>
    <div class="color-line"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
                <div class="text-center m-b-md custom-login">
                    <h3 style="color:#fff; padding:50px 0 20px 0">PLEASE LOGIN TO APP</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form action=""  method="POST">
                            <div class="form-group">
                                <label class="control-label" for="email">Email</label>
                                <input type="email" placeholder="example@gmail.com" name="email" id="email" class="form-control">
                                <span class="help-block small">Your unique email to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            
                            <button type="submit" name="login" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="register.php">Register</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
        </div>
        
    </div>

    <?php include 'lib/footer.php' ?>