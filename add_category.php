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
            $catName = $_POST['categoryName'];
            $sql = "INSERT INTO category (UserId, CategoryName) VALUES ('$userid', '$catName')";
            $category = $acc->createCategory($sql);
            if($category){
                echo '<div class="alert alert-success">Success!</div>';
            }
        }
    }
?>
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
         <!-- navbar  -->
    <?php include 'lib/navbar.php' ?>
       <!-- navbar  -->
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Add Category</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card" style="background:#000; color:#fff; padding:25px 15px;">
                                <form action="#" id="myForm" method="POST">
                                    <div class="form-group-inner">
                                        <label>Category Name</label>
                                        <input type="text" name="categoryName" class="form-control" placeholder="Enter Category Name">
                                    </div>
                                    
                                    <div class="login-btn-inner">
                                        <div class="inline-remember-me">
                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit" name="submit">Add Category</button>
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
                                            <span class="caption-subject text-uppercase"><b>View Categories</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card">
                                <table class="table table-striped table-bordered" id="customtable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Category Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            
                                            $sql = "SELECT * FROM category";
                                            $sln = 1;
                                            $result = $acc->viewCategory($sql);
                                            
                                            while($row = $result->fetch_assoc()){


                                        ?>
                                        <tr>
                                            <td><?php echo $sln?></td>
                                            <td><?php echo $row['CategoryName'] ?></td>
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