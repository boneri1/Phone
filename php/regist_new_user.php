<?php 
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>e-Registiify</title>
	<link rel="stylesheet" type="text/css" href=".css/style.css">
</head>
<body>
	<center><form method="POST" action="regist_new_user.php" id="myForm">
		<h1>Registration Form</h1>
		<table>
			<tr><td>FirstName:</td><td><input type="text" name="firstName" required></td></tr>
			<tr><td>LastName:</td><td><input type="text" name="lastName" required ></td></tr>
			<tr><td>Password:</td><td><input type="password" name="password" required></td></tr>
			<tr><td>PhoneNumber:</td><td><input type="number" name="phoneNumber" id="phone" required maxlength="10"></td></tr>
			<tr><td>Email:</td><td><input type="email" name="email" required></td></tr>
			<tr><td>NationalId:</td><td><input type="number" name="nationalId" id="validateId" required></td></tr>
			<tr><td>Address:</td><td><input type="text" name="address" required></td></tr>
			<tr><td></td><td><input type="submit" name="ok" value="Record✍"></td></tr>

		</table>
		<a href="index.php">Already Have An Account</a>
	</form></center>
	<?php
if (isset($_POST['ok'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $nationalId = $_POST['nationalId'];
    $address = $_POST['address'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validate form data here if necessary
    // ...

    // Perform data sanitization and validation before inserting into the database
    // ...

    $insert = mysqli_query($conn, "INSERT INTO users (FirstName, LastName, Password, ContactInfo, Email, NationalId, Address) VALUES ('$firstName', '$lastName', '$hashedPassword', '$phoneNumber', '$email', '$nationalId', '$address')");
    if ($insert) {
        // Display success message or redirect to a success page
        echo "Data Inserted Successfully";
    } else {
        // Display error message or redirect to an error page
        echo "Data Insertion Failed";
    }
}
?>

	?>
	<script type="text/javascript" src="./js/validate.js"></script>
	</body>
</html>