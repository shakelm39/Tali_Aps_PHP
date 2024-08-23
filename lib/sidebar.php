<div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="dashboard.php"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="img/logo/logosn.png" alt="" /></strong>
            </div>
			<div class="nalika-profile">
				<div class="profile-dtl">
					<a href="#"><img src="img/notification/4.jpg" alt="" /></a>
                    <?php
                        if(isset($_SESSION['user_id'])){
                            $name = $_SESSION['name'];
                        }
                    ?>
					<h2><?php echo $name; ?></h2>
				</div>
				<div class="profile-social-dtl">
					<ul class="dtl-social">
						<li><a href="#"><i class="icon nalika-facebook"></i></a></li>
						<li><a href="#"><i class="icon nalika-twitter"></i></a></li>
						<li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="dashboard.php">
								   <i class="icon nalika-home icon-wrap"></i>
								   <span class="mini-click-non">Expense Calculator</span>
								</a>
                            
                        </li>
                        
                        
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-new-file icon-wrap"></i> <span class="mini-click-non">Assests</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Add Assets" href="add_asset.php"><span class="mini-sub-pro">Add Assets</span></a></li>
                            </ul>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-new-file icon-wrap"></i> <span class="mini-click-non">Expenses</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Add Expense" href="add_expense.php"><span class="mini-sub-pro">Add Expense</span></a></li>
                            </ul>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-new-file icon-wrap"></i> <span class="mini-click-non">Accounts</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Add Accounts" href="add_accounts.php"><span class="mini-sub-pro">Add Accounts</span></a></li>
                            </ul>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="icon nalika-new-file icon-wrap"></i> <span class="mini-click-non">Category</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Add Categories" href="add_category.php"><span class="mini-sub-pro">Add Categories</span></a></li>
                            </ul>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="logout.php" aria-expanded="false"><i class="icon nalika-unlocked author-log-ic"></i> <span class="mini-click-non">Log out</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        
    </div>