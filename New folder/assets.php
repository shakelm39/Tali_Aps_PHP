<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'config/config.php';
require_once 'classes/Expense.php';
require_once 'classes/Function.php';

$category = new FuncClass();
$category->userId = $_SESSION['user_id'];
$accounts = new FuncClass();
$accounts->userId = $_SESSION['user_id'];
$expense = new Expense();
$expense->userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $expense->title = $_POST['title'];
    $expense->categoryId = $_POST['categoryId'];
    $expense->accountId = $_POST['accountId'];
    $expense->description = $_POST['description'];
    $expense->amount = $_POST['amount'];
    $expense->date = $_POST['date'];
    $expense->create();
}

$expenses = $expense->read();
$total_amount = $expense->totalAmount();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Expense Calculator</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Expense Calculator</h2>
        <form method="post" action="index.php">
            <label for="title">Title:</label>
            <input type="text" name="title" required>
            <label for="date">Date:</label>
            <input type="date" name="date" required>
            <label for="categoryId">Category:</label>
            <select name="categoryId" class="custom_select" type="text" style="width:100%; padding:8px;margin-bottom:10px; border:1px solid #ddd; border-radius:4px;" required>
                <?php 
                        $categories = $category->category_read();
                        while($row = $categories->fetch_assoc()){
                ?>
                <option value="<?php echo $row['CategoryId'] ?>"><?php echo $row['CategoryName'] ?></option>
                <?php };?>
            </select>
            <label for="accountId">Account:</label>
            <select name="accountId" class="custom_select" type="text" style="width:100%; padding:8px;margin-bottom:10px; border:1px solid #ddd; border-radius:4px;" required>
                <?php 
                        $account = $accounts->accounts_read();
                        while($row = $account->fetch_assoc()){
                ?>
                <option value="<?php echo $row['AccountId'] ?>"><?php echo $row['AccountName'] ?></option>
                <?php };?>
            </select>
            <label for="amount">Amount:</label>
            <input type="number" step="0.01" name="amount" required>
            <label for="description">Description:</label>
            <input type="text" name="description" required>
            
            
            <button type="submit">Add Expense</button>
        </form>

        <h3>Total Expenses: $<?= number_format($total_amount, 2) ?></h3>

        <table>
            <tr><th>Date</th><th>Description</th><th>Amount</th></tr>
            <?php while ($rows = $expenses->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($rows['Dates']) ?></td>
                <td><?= htmlspecialchars($rows['Description']) ?></td>
                <td>৳<?= htmlspecialchars($rows['Amount']) ?></td>
                
            </tr>
            <?php endwhile; ?>
        </table>

        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
