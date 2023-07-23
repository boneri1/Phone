<?php
 include("session.php");
 include("connection.php");
 $imeiNumber = $_SESSION['Imei'];
 $select=mysqli_query($conn,"SELECT * FROM phone WHERE ImeiNumber_1 = '$imeiNumber'");
 $fetchedData = mysqli_fetch_array($select);
 ?>
<center>
	<form>
		<h1>eRegistry Phone Certificate</h1>
	   <table>
	   	<tr><td>ImeiNumber_1 :</td><td></td><td><?php echo $fetchedData['ImeiNumber_1'];?></td></tr>
        <tr><td>ImeiNumber_2 :</td><td></td><td><?php echo $fetchedData['ImeiNumber_2'];?></td></tr>
        <tr><td>Phone Brand :</td><td></td><td><?php echo $fetchedData['Brand'];?></td></tr>
        <tr><td>Model :</td><td></td><td><?php echo $fetchedData['Model'];?></td></tr>
        <tr><td>Date Of Purchase :</td><td></td><td><?php echo $fetchedData['DateOfPurchase'];?></td></tr>
        <tr><td>Description :</td><td></td><td><?php echo $fetchedData['Description'];?></td></tr>
        <tr><td>Phone Status :</td><td></td><td><?php echo $fetchedData['PhoneStatus'];?></td></tr>
        <tr><td>Email :</td><td></td><td><?php echo $fetchedData['Email'];?></td></tr>
        <tr><td></td><td><input type="submit" value="Download" id="printButton" onclick="hideButton(); window.print();"></td><td></td></tr>
	   </table>
    </form>
</center>
<script>
function hideButton() {
    var printButton = document.getElementById('printButton');
    printButton.style.display = 'none';
}
</script>

