<?php
session_start();

$server="localhost";
$username="root";
$password="";
$database="house";


$conn = new mysqli("localhost", "root", "","house");

if (isset($_POST["LOGIN"])) 
{
	$Email=$_POST["Email"];
	$password=$_POST["password"];
	
	
	$sql="SELECT * From clients Where Email=? AND password=?";

	$stmt=$conn->prepare($sql);
	$stmt->bind_param("ss",$Email,$password);
	$stmt->execute();
	$result=$stmt->get_result();
	$row=$result->fetch_assoc();

	session_regenerate_id();
	$_SESSION['username']=$row['Name'];
	$_SESSION['role']=$row['usertype'];
	$_SESSION['clientsid']=$row['Id'];
	session_write_close();

	/*if ($result->num_rows==1 && $_SESSION['role']=="client") 
	{
		header("location: upload.php");
	}
	else if ($result->num_rows==1 && $_SESSION['role']=="agent") 
	{
		header("location:upload.php");
	}
	else
	{*/
		header('location:display.php');
		//$_SESSION['message']="Username or Password is Incorrect!";
		//$_SESSION['msg_type']="danger";
		echo "<script>alert('Email or Password is Incorrect!')</script>";
 		echo "<script>window.location='login.php'</script>";
	}



if (isset($_POST['register'])) { 

  
    $Name=$_POST["Name"];
    $Email=$_POST["Email"];
    $password=$_POST["password"];
    $Phone=$_POST["Phone"];
    $User_type=$_POST["usertype"];
   
        $sql = "INSERT INTO `clients`(Name,Email,password,Phone_Number,usertype) VALUES ('$Name','$Email','$password','$Phone','$User_type')";

        mysqli_query($conn, $sql); 
        $_SESSION['message']="Record has been saved";
	$_SESSION['msg_type']="success";

	
	header('location:login.php');

}
  

  
/*if ( $_SESSION['role']=="client") 
	{
		header("location: login.php");
	}
		else if ($_SESSION['role']=="agent") 
	{
		header("location:Logins.php");
	}


}
*/


?>