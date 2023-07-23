<?php 
 include("connection.php");
 include("session.php");
 $Id=$_SESSION['user'];
 $select=mysqli_query($conn,"SELECT Email FROM users where UserId='$Id'");
 $email=mysqli_fetch_array($select);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body bgcolor="skyblue">
<center>
	<a href="logout.php">Logout</a>
	<form action="regist_new_phone.php" method="POST">
		<h1>Regist New Phone</h1>
      <table>
      	  <tr><td>Email :</td>
      	  	<td><input type="email" name="email" value="<?php echo $email['Email']; ?>" readonly ></td>
      	  </tr>
    	  <tr><td><input type="checkbox" id="disableCheckbox" onclick="checkSim()"/>
    	     I use Single Simcard In My Phone</td>
    	  </tr>
          <tr>
          	<td>First Imei:</td>
            <td><input type="text" name="firstImei"></td>
          </tr>
         <tr>
        	<td>Second Imei:</td>
        	<td><input type="text" name="secondImei" id="second"></td>
         </tr>
         <tr><td>Brand Name</td><td><input type="text" name="brand" required></td></tr>
         <tr><td>Model</td><td><input type="text" name="model" required></td></tr>
         <tr><td>Date Of Purchase</td><td><input type="date" name="dateOfPuchase" required></td></tr>
         <tr><td>Price Of Phone</td><td><input type="text" name="priceOfPhone" required></td></tr>
         <tr><td>Description</td><td><textarea name="description"></textarea></td></tr>
         <tr><td>Phone Status</td><td>
        <select name="phonestatus">
         	<option value="Null">Select Phone Status</option>
            <option value="Active">Active</option>
         	<option value="Stolen">Stolen</option>
         	<option value="Lost">Lost</option>
        </select></td></tr>
        <tr><td></td><td><input type="submit" name="ok" value="Record"></td></tr>
       </table>
      </form>
 </center>
  <script>
    function checkSim() {
      var fieldset = document.getElementById("second");
      var checkbox = document.getElementById("disableCheckbox");
      fieldset.hidden = checkbox.checked;
    }
  </script>
  <?php 
   if(isset($_POST['ok'])){
   	$firstImei=$_POST['firstImei'];
   	$secondImei=$_POST['secondImei'];
   	$brand=$_POST['brand'];
   	$model=$_POST['model'];
   	$dateOfPurchase=$_POST['dateOfPuchase'];
   	$priceOfPhone=$_POST['priceOfPhone'];
   	$description=$_POST['description'];
    $phonestatus=$_POST['phonestatus'];
    $phonestatus=$_POST['phonestatus'];
    $gmail=$_POST['email'];
    $insert=mysqli_query($conn,"INSERT INTO  phone(ImeiNumber_1,ImeiNumber_2,Brand,Model,DateOfPacharse,Description,PhoneStatus,Email)Values('$firstImei','$secondImei','$brand','$model','$dateOfPurchase','$description','$phonestatus','$gmail')");
    if($insert){
    	$_SESSION['Imei'] = $firstImei;
    	header("location:certificate.php");
    }
    else{
        echo "mysqli_error()";         
    }
   }
  ?>

</body>
</html>
	