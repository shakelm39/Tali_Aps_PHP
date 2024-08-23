<?php 
session_start();
include 'lib/header.php'; 
?>
<?php include 'lib/sidebar.php'; ?>

<?php 
    include 'config/Functions.php'; 
    $acc = new userFunc();

    if(isset($_SESSION['user_id'])){
        $userid = $_SESSION['user_id'];

        if(isset($_POST['submit'])){
            $accountName = $_POST['accountName'];
            if($accountName==''){
                $msg = '<div class="alert alert-Danger">Field must not be empty!</div>' ;
                echo $msg ;
            }else{
                $sql = "INSERT INTO account (UserId, AccountName) VALUES ('$userid', '$accountName')";
                $crtaccount = $acc->createAccount($sql);
                if($crtaccount){
                    $msg = '<div class="alert alert-success">Success!</div>';
                    echo $msg;
                }
            }
            
           
            
        }
    }
?>
    
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <?php include 'lib/navbar.php' ?>
        
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Add Account</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card" style="background:#000; color:#fff; padding:25px 15px;">
                                
                                <form action="" id="myForm" method="POST">
                                    <div class="form-group-inner">
                                        <label>Account Name</label>
                                        <input type="text" name="accountName" class="form-control" placeholder="Enter Account Name">
                                    </div>
                                    
                                    <div class="login-btn-inner">
                                        <div class="inline-remember-me">
                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit" name="submit">Add Account</button>
                                            <label></label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>View Accounts</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card">
                                <table class="table table-striped table-bordered" id="customtable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Account Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            
                                            $sql = "SELECT * FROM account";
                                            $sln = 1;
                                            $result = $acc->viewAccount($sql);
                                            
                                            while($row = $result->fetch_assoc()){


                                        ?>
                                        <tr>
                                            <td><?php echo $sln?></td>
                                            <td><?php echo $row['AccountName'] ?></td>
                                        </tr>
                                        <?php $sln++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php include 'lib/footer.php'; ?>