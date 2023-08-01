<!DOCTYPE html>
<html>
<head>
    <title>Currency Exchange Rates</title>
   
</head>
<body>
 <body style='background-color:#FBB917'>
    <h1>Currency Exchange Rates</h1>

    <form method="post">
        <label for="currency">Select Currency:</label>
        <select name="currency" id="currency">
            <option value="usd" name="usd">USD</option>
            <option value="eur" name="eur">EUR</option>
            <option value="gbp" name="gbp">GBP</option>
        </select>
        <input type="submit" value="Fetch Data">
    </form>

	<?php include 'fetch_data.php'; ?>

<?php if (isset($result)) { ?>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Exchange Rate</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['date']; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['rate']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php } ?>

</body>
</html>
