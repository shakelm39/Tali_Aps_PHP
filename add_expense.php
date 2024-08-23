<?php
    session_start();
    $userid = $_SESSION['user_id'];
    include 'lib/header.php';
 ?>
<?php include 'lib/sidebar.php'; ?>
<?php 

    include 'config/Functions.php'; 

    $createExpense = new userFunc();

    if($_SERVER['REQUEST_METHOD']=='POST'){
        
        $title = $_POST['title'];
        $date = $_POST['date'];
        $categoryId = $_POST['categoryId'];
        $accountId = $_POST['accountId'];
        $amount = $_POST['amount'];
        $description = $_POST['description'];

        $sql = "INSERT INTO bills(UserId, Title, Dates, CategoryId, AccountId, Amount, Description) VALUES ('$userid','$title','$date','$categoryId','$accountId','$amount','$description')";

        $insertExpense = $createExpense->createExpense($sql);

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
                                            <span class="caption-subject text-uppercase"><b>Add Expense</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <?php 
                            
                            if(isset($insertExpense)){
                                echo $insertExpense;
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
                                            <span class="caption-subject text-uppercase"><b>View Expenses</b></span>
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

                                            $viewExp = new userFunc();

                                            $sql = "SELECT * FROM bills WHERE UserId=$userid AND MONTH(Dates)=MONTH(CURRENT_DATE()) order by dates desc";

                                            $viewExpns = $viewExp-> viewExpense($sql);
                                            $sln=1;
                                            $expensetotal=0;
                                            while($result  = $viewExpns->fetch_assoc()){
                                                $expensetotal+= $result['Amount'];
                                        ?>
                                        <tr>
                                            <td><?php echo $sln;?></td>
                                            <td><?php echo $result['Dates']?></td>
                                            <td><?php echo $result['Description']?></td>
                                            <td><?php echo $result['Amount']?></td>
                                        </tr>
                                        <?php $sln++; }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-right">Total</td>
                                            <td><?php echo $expensetotal ?>৳</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php include 'lib/footer.php'; ?>