document.getElementById("myForm").addEventListener("submit", function(event){
	event.preventDefault();
const phoneNumber = document.getElementById("phone").value;
const idNumber = document.getElementById("validateId").value;
const cleanerPhone = phoneNumber.replace(/\D/g,'');
const cleanerIdNumber = idNumber.replace(/\D/g,'');
if(cleanerPhone.length === 10 || cleanerIdNumber === 16){
	event.target.submit();
}
else{
	alert("Check your Mobile Number or idNumber");
}
});