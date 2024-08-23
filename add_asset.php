<?php
    session_start();
    $userid = $_SESSION['user_id'];
    include 'lib/header.php';
 ?>
<?php include 'lib/sidebar.php'; ?>
<?php 

    include 'config/Functions.php'; 

    $createAsset = new userFunc();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $title = $_POST['title'];
        $date = $_POST['date'];
        $categoryId = $_POST['categoryId'];
        $accountId = $_POST['accountId'];
        $amount = $_POST['amount'];
        $description = $_POST['description'];

        $sql = "INSERT INTO assets (UserId, Title, Date, CategoryId, AccountId, Amount, Description) VALUES ('$userid', '$title', '$date', '$categoryId', '$accountId', '$amount', '$description')";

        $insertAsset = $createAsset->createAsset($sql);

    }

?>
    
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="icon nalika-menu-task"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n hd-search-rp">
                                            <div class="breadcome-heading">
												<form role="search" class="">
													<input type="text" placeholder="Search..." class="form-control">
													<a href=""><i class="fa fa-search"></i></a>
												</form>
											</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<i class="icon nalika-user"></i>
															<span class="admin-name">Advanda Cro</span>
															<i class="icon nalika-down-arrow nalika-angle-dw"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        
                                                        <li><a href="#"><span class="icon nalika-user author-log-ic"></span> My Profile</a>
                                                        </li>
                                                        
                                                        <li><a href="logout.php"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Add Assets</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php 
                            
                                if(isset($insertAsset)){
                                    echo $insertAsset;
                                }

                            ?>
                            <div class="card" style="background:#000; color:#fff; padding:25px 15px;">
                                <form action="" id="myForm" method="POST">
                                    <div class="form-group-inner">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter Title" />
                                    </div>
                                    <div class="form-group-inner">
                                        <label>Date</label>
                                        <input type="date" name="date" value="<?php echo date('Y-m-d')?>" class="form-control">
                                    </div>
                                    <div class="form-group-inner">
                                        <label>Category</label>
                                        
                                        <select name="categoryId" id="" class="form-control">
                                        <?php 
                                            $cat = new userFunc();

                                            $sql = "SELECT * FROM category";

                                            $viewCate =$cat->viewCategory($sql);
                                            while($row = $viewCate->fetch_assoc()){

                                        ?>
                                            <option value="<?php echo $row['CategoryId'] ?>"><?php echo $row['CategoryName'] ?></option>

                                        <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group-inner">
                                        <label>Account</label>
                                        <select name="accountId" id="" class="form-control">
                                        <?php 
                                            $account = new userFunc();

                                            $sql = "SELECT * FROM account";

                                            $viewAccount =$cat->viewAccount($sql);
                                            while($row = $viewAccount->fetch_assoc()){

                                        ?>
                                            <option value="<?php echo $row['AccountId'] ?>"><?php echo $row['AccountName'] ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group-inner">
                                        <label>Description</label>
                                        <textarea name="description" id="" class="form-control">

                                        </textarea>
                                    </div>
                                    <div class="form-group-inner">
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control" placeholder="Enter Amount" />
                                    </div>
                                    <div class="login-btn-inner">
                                        <div class="inline-remember-me">
                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit" name="submit">Add Expense</button>
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
                                            <span class="caption-subject text-uppercase"><b>View Assets</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card">
                                <table class="table table-striped table-bordered" id="customtable">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                            $viewAsset = new userFunc();

                                            $sql = "SELECT * FROM assets";

                                            $viewAsst = $viewAsset-> viewAsset($sql);
                                            $sln=1;
                                            while($result  = $viewAsst->fetch_assoc()){
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $sln;?></td>
                                            <td><?php echo $result['Date']?></td>
                                            <td><?php echo $result['Description']?></td>
                                            <td><?php echo $result['Amount']?></td>
                                        </tr>
                                        <?php $sln++; }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php include 'lib/footer.php'; ?>