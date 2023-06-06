<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enter Verification Code</title>
</head>

<body>
    <form action="../index.php" method="post">
        <label for="code">Enter 6 digit code sent to your e-mail:</label>
        <input type="text" name="code" id="code"/>
        <input type="hidden" name="action" value="code_submit"/>
        <input type="submit" value="submit">
    </form>
</body>

</html>
