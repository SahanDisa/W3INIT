<?php
include("connect.php"); 
$tbl_name="user_levels"; 

$username=$_POST['username']; 
$password=$_POST['password']; 

$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($dbhandle,$username);
$password = mysqli_real_escape_string($dbhandle,$password);

$result = mysqli_query($dbhandle, "SELECT * FROM $tbl_name WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($result) != 1){
						echo "<script>alert(' Wrong Username or Password Access Denied !!! Try Again');
						window.location='index.php';
						</script>";
					}else{
						$row = mysqli_fetch_assoc($result);	
						if($row['userlevel'] == 1){
							header('location: admin.php');
						}else if($row['userlevel'] == 2 ){
							header("Location: faculty.php");
						}else if($row['userlevel'] == 3 ){
							header("Location: student.php");
						}
						else if($row['userlevel'] == 4 ){
				  		   header("Location: staff.php");
						}
						else{
							echo "<script>alert('Wrong Username or Password Access Denied !!! Try Again');
						window.location='index.php';
						</script>";
						}
					}

?>