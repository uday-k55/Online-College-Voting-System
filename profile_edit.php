<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.form-container {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    width: 350px;
    text-align: center;
}

h1 {
    color: #4CAF50;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.input-group input,
.input-group select {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.button-group {
    margin-top: 20px;
}

.button-group button {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    width: 100%;
}

.button-group button:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
    <div class="form-container">
        <h1>Enter Your Details</h1>
        <form action="profile_edit.php" method="POST">
            <div class="input-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="input-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="input-group">
                <label for="blood_group">Blood Group:</label>
                <select id="blood_group" name="blood_group" required>
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="input-group">
                <label for="place">Place:</label>
                <input type="text" id="place" name="place" placeholder="Enter your place" required>
            </div>
            <div class="button-group">
                <a href="MyProfile.php"><button type="cancel">Cancel</button></a>
				<button type="submit" name="s">Save Details</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
session_start();
if(isset($_REQUEST['s']))
{
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$place = $_POST['place'];
$con=mysql_connect("localhost","root","");
mysql_select_db("uday",$con);
$qry="insert into myprofile values($dob,'$gender','$blood_group','$place')";
$_SESSION['lid']=$row[0];
$cnt=mysql_query($qry,$con);
if($cnt>0){
  echo "<script>alert('Details saved successfully'); window.location.href='MyProfile.php';</script>";
  }
else
  echo " Failed ";
  
  }
?>
