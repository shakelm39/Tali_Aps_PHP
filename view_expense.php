<?php
    session_start();
    $userid = $_SESSION['user_id'];
    include 'lib/header.php';
 ?>
<?php include 'lib/sidebar.php'; ?>
<?php 

    include 'config/Functions.php'; 

    $createExpense = new userFunc();

    

?>
    
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
         <!-- navbar  -->
    <?php include 'lib/navbar.php' ?>
       <!-- navbar  -->
        
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject text-uppercase"><b>View Expenses </b></span>
                                            <span class="pull-right"><a href="dashboard.php"><b>Dashboard</b></a></span>
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
                                            if($_SERVER['REQUEST_METHOD']=='GET'){
        
                                                $start_date  = $_GET['startDate'];
                                                $end_date    = $_GET['endDate'];
                                        
                                                
                                        
                                            
                                            $sql = "SELECT * FROM bills WHERE Dates BETWEEN '$start_date' AND '$end_date' AND UserId= $userid";

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
                                        <?php $sln++; }}?>
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