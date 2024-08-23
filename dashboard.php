
<?php 
    session_start();

        if(!isset($_SESSION['user_id'])){
            $name = $_SESSION['name'];
            header('Location:index.php');
        }
   
    include 'lib/header.php';
 ?>
<?php 
    include 'lib/sidebar.php'; 
    include 'config/Functions.php'; 
    $userid = $_SESSION['user_id'];
    $asset = new userFunc();
    $expense = new userFunc();

    //All Income
    $getAllIncome = "SELECT SUM(Amount) as Income FROM assets WHERE UserId = $userid";
     $getIncome = $asset->viewAsset($getAllIncome);
     $AllIncome = $getIncome->fetch_assoc();
     
    //All Expense
    $getAllExpense = "SELECT SUM(Amount) as Expense FROM bills WHERE UserId = $userid";
    $getExpense = $expense->viewExpense($getAllExpense);
    $AllExpense = $getExpense->fetch_assoc();

    

    //this month Income
    $getBalance= "SELECT SUM(Amount) as Balance FROM assets WHERE UserId = $userid AND MONTH(Date) = MONTH(CURRENT_DATE())";
     $getAllBalance = $asset->viewAsset($getBalance);
     $balance = $getAllBalance->fetch_assoc();

    //This month Expense

    $sql = "SELECT SUM(Amount) as Expense FROM bills WHERE UserId = $userid AND MONTH(Dates)=MONTH(CURRENT_DATE())";
    $ExpenseTotal = $expense->viewExpense($sql);
    $expenseCol = $ExpenseTotal->fetch_assoc(); 
     
    //Total Income 
    $totalBalance = $balance['Balance']- $expenseCol['Expense'];  

?>

    
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <!-- navbar  -->
    <?php include 'lib/navbar.php' ?>
       <!-- navbar  -->
        
        <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box tranffic-als-inner">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-success last-month-sc cl-one"><i class="fa fa-sort-asc"></i> Current</small> Balance</h3>
                            <div class="card">
                                <div class="card-body">
                                
                                    <h3 id="balance"><?php echo $AllIncome['Income']-$AllExpense['Expense'] ;?></h3>
                                  
                                </div>
                            </div>
                            <div class="white-box tranffic-als-inner">
                                <h4 ><small style="color:#fff;">Current Total Balance</small></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box tranffic-als-inner res-mg-t-30">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-danger last-month-sc cl-two"><i class="fa fa-sort-desc"></i>Total</small> Expense</h3>
                            <h3 class="text text-danger"><?php echo $AllExpense['Expense']; ?></h3>
                            <div class="white-box tranffic-als-inner">
                                <h4><small style="color:red;">All Expense</small></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box tranffic-als-inner">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-success last-month-sc cl-one"><i class="fa fa-sort-asc"></i> Current</small> Income</h3>
                            <div class="card">
                                <div class="card-body">
                                
                                    <h3 id="balance"><?php echo $balance['Balance'] ;?></h3>
                                    
                                </div>
                            </div>
                            <div class="white-box tranffic-als-inner">
                                <h4 ><small style="color:#fff;">This Month Income</small></h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box tranffic-als-inner res-mg-t-30">
                            <h3 class="box-title"><small class="pull-right m-t-10 text-danger last-month-sc cl-two"><i class="fa fa-sort-desc"></i>Current</small>Total Expense</h3>
                        
                            <h3 class="text text-danger"><?php echo $expenseCol['Expense']; ?></h3>
                            <div class="white-box tranffic-als-inner">
                                <h4><a href="add_expense.php"><small style="color:red;">This Month Expense</small></a></h4>
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
                                            <span class="caption-subject text-uppercase"><b>Assets</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Recent 10 Income</b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <table class="table table-striped table-bordered data-table" id="customtable">
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
                                            $sql = "SELECT * FROM assets order by date desc LIMIT 10";
                                            $result = $asset->viewAsset($sql);
                                            $sln =1 ;
                                            $totalAsset= 0;
                                            while($row = $result->fetch_assoc()){
                                                $totalAsset+=$row['Amount'];;
                                        ?>
                                        <tr>
                                            <td><?php echo $sln; ?></td>
                                            <td><?php echo $row['Date']; ?></td>
                                            <td><?php echo $row['Description']; ?></td>
                                            <td><?php echo $row['Amount']; ?></td>
                                            
                                           
                                        </tr>
                                        <?php $sln++; }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="text-center"> Total Income </td>
                                            <td id="assetTotal"><?php echo $totalAsset ?> ৳</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Report</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>Expense Report</b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <form action="view_expense.php" method="GET">
                                <select name="" id="" class="form-control">
                                        
                                        <?php
                                        $expsql = "SELECT SUM(Amount) as Expense,MONTH(Dates) as Month FROM bills WHERE UserId = $userid GROUP BY MONTH(Dates) DESC";
                                        $ExpenseTotals = $expense->viewExpense($expsql);
                                        
                                            while($expenseCols = $ExpenseTotals->fetch_assoc()){ 
                                                $monthNum  = $expenseCols['Month'];
                                                $monthName = date('F - Y', mktime(0, 0, 0, $monthNum, 10));
                                        ?>
                                        <option value="<?php echo $expenseCols['Month'];?>"><?php echo $monthName." Expense -".$expenseCols['Expense'];?></option>
                                        <?php }?>
                                    </select>
                                    <div class="form-group-inner">
                                        <label style="color:#fff;">Start Date</label>
                                        <input type="date" name="startDate" value="<?php echo date('Y-m-d');?>" class="form-control">
                                    </div>
                                    <div class="form-group-inner">
                                        <label style="color:#fff;">End Date</label>
                                        <input type="date" name="endDate" value="<?php echo date('Y-m-d');?>" class="form-control">
                                    </div>
                                    <div class="login-btn-inner">
                                    <div class="inline-remember-me">
                                        <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit" >Search</button>
                                        
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
<?php include 'lib/footer.php'; ?>