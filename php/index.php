<?php 
 include("connection.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center>
	<form action="index.php" method="POST" >
	<h1>Login With Your Credential</h1>
		<table>
			<tr><td>Email</td><td><input type="email" name="email"></td></tr>
			<tr><td>Password</td><td><input type="password" name="password"></td></tr>
			<tr><td></td><td><input type="submit" name="ok" value="Login"></td></tr>
		</table>
			<a href="regist_new_user.php"><u>Don't Have an account</u></a>
	</form>
</center>
<?php 
 if (isset($_POST['ok'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to fetch the hashed password associated with the user's email
    $sel = mysqli_query($conn, "SELECT * FROM users WHERE Email = '$email'");
    if (mysqli_num_rows($sel) > 0) {
        $fetch = mysqli_fetch_array($sel);
        $storedHashedPassword = $fetch['Password'];
        echo $storedHashedPassword;

        // Verify the entered password with the stored hashed password
        if (password_verify($password, $storedHashedPassword)) {
            session_start();
            $_SESSION['user'] = $fetch['0'];
            $_SESSION['secure'] = 1;
            header("location:regist_new_phone.php");
        } else {
            ?>
            <script type="text/javascript">alert("Invalid Credentials");</script>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">alert("Invalid Credentials");</script>
        <?php
    }
}
?>

</body>
</html>