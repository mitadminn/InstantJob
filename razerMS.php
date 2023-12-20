<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
</head>
<body>
    <form method="post" action="process_payment.php">
        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" id="amount" required>
        <br>

        <label for="currency">Currency:</label>
        <input type="text" name="currency" id="currency" required>
        <br>

        <label for="reference">Transaction Reference:</label>
        <input type="text" name="reference" id="reference" required>
        <br>

        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
