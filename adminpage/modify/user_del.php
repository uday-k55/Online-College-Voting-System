<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>user_del</title>
    <style>
	body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1em 0;
        }
       
        h1 {
            text-align: center;
            color: #333;
			}
		.form-container { 
			background-color: white; 
			padding: 20px; 
			margin-top:100px; 
			border-radius: 10px; 
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
			text-align: center; 
			width: 300px; } 
		.form-container h2 { 
			margin-bottom: 20px; 
			color: #4CAF50; } 
		.form-container input[type="text"] { 
		width: calc(100% - 22px); 
		padding: 10px; 
		margin-bottom: 10px; 
		border: 1px solid #ccc; 
		border-radius: 5px; } 
		.form-container input[type="button"] { 
	    padding: 10px 20px; 
		background-color: #4CAF50; 
		color: white; 
		border: none; 
		border-radius: 5px; 
		cursor: pointer; 
		transition: background-color 0.3s ease; } 
	.form-container input[type="button"]:hover {
	    background-color: #45a049; }
	.form-container input[type="submit"] { 
	    padding: 10px 20px; 
		background-color: #4CAF50; 
		color: white; 
		border: none; 
		border-radius: 5px; 
		cursor: pointer; 
		transition: background-color 0.3s ease; } 
	.form-container input[type="submit"]:hover {
	    background-color: #45a049; }
	</style>
</head>

<body>
<header>
        <h1 align="center">ONLINE COLLEGE VOTING SYSTEM</h1>
        <marquee>(College Name)</marquee>
</header>
<center>
<div class="form-container"> <h2>Delete User</h2>
	<form action="user_del.php"> 
	  <div align="center"><strong>Email: 
	    <input type="text" name="email" required>
        <br>
	    </strong>
		<a href="../voters_list.php"><input type="button" value="Cancel"></a>
	    <input type="submit" name="s" value="Delete"> 
      </div>
	</form> </div>
</center>
</body>
</html>
<?php
if(isset($_REQUEST['s']))
{
$email = $_REQUEST['email'];
$con = mysql_connect("localhost", "root", "");
mysql_select_db("uday", $con);
$qry = "delete from signup where email = '$email'";
$cnt = mysql_query($qry, $con);
if ($cnt > 0)
    echo "<script>alert('User deleted successfully'); window.location.href='voters_list.php';</script>";
}
?>
