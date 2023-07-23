<?php 
include("connection.php");
?>
	<?php 
      if(isset($_POST['ok'])){
      	$fistName = $_POST['firstName'];
      	$lastName = $_POST['lastName'];
      	$password = $_POST['password'];
      	$phoneNumber = $_POST['phoneNumber'];
      	$email = $_POST['email'];
      	$nationalId = $_POST['nationalId'];
      	$address = $_POST['address'];
      	$hashedPassword = password_hash($password, PASSWORD_DEFAULT)
      	$ins=mysqli_query($conn,"INSERT INTO users(FirstName, LastName, Password, ContactInfo, Email, NationalId, Address)VALUES('$fistName', '$lastName', '$hashedPassword', '$phoneNumber', '$email', '$nationalId', '$address')");
      	if($ins){
      		?>
      		<script type="text/javascript">window.alert("Data Inserted");</script>
      		<?php
      		header("location:view.php");
      	}
      	else{
      		?>
            <script type="text/javascript">window.alert("Data Failed");</script>
      		<?php
      	}
        
      }
	?>

