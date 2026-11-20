<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Profile</title>
</head>
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

.profile-page {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    width: 80%;
    max-width: 600px;
    text-align: center;
}

.profile-header {
    border-bottom: 1px solid #ccc;
    margin-bottom: 20px;
    padding-bottom: 20px;
}

.profile-photo {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    margin-bottom: 10px;
}

.profile-name {
    font-size: 2em;
    color: #333;
    margin: 10px 0;
}

.profile-title {
    font-size: 1.2em;
    color: #777;
}

.profile-body {
    text-align: left;
    margin-top: 20px;
}

.profile-body h3 {
    color: #4CAF50;
    margin-bottom: 10px;
}

.profile-body p {
    margin: 10px 0;
    color: #555;
}

.profile-body strong {
    color: #333;
}

</style>
</head>
<?php
session_start();
$id = $_SESSION['lid'];

$con = new mysqli("localhost", "root", "", "uday");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$qry = "SELECT * FROM signup WHERE id=$id";
$cnt = $con->query($qry);

if ($cnt->num_rows > 0) {
    $row = $cnt->fetch_assoc();
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $voter_id = $row['voter_id'];
}
?>

<body>
<header>
        <h1>ONLINE COLLEGE VOTING SYSTEM </h1>
        <marquee><p>(College Name)</p></marquee>
</header>
<br />
    <center><div class="profile-page">
      <div class="profile-header">
            <h2 class="profile-name"> <?php echo $name ?></h2>
            <p class="profile-title"><strong>Student ID</strong>: <?php echo $voter_id ?> </p>
        </div>
        <div class="profile-body">
            <h3>Contact Information</h3>
            <p><strong>Email:</strong><?php echo $email ?></p>
            <p><strong>Phone:</strong><?php echo $phone ?></p>
			<p><strong>Date of Birth:</strong><?php echo $dob ?></p>
            <p><strong>Gender:</strong><?php echo $gender ?></p>
			<p><strong><strong>Blood:</strong>:</strong><?php echo $blood_group ?></p>
			<p><strong>Place:</strong><?php echo $place ?></p>
            <h3>Bio</h3>
            <p>A brief bio about yourself. Share your story, your passions, and what makes you unique.</p>
        </div>
		<div class="button-group">
          <a href="4box.php"><button type="cancel">Cancel</button></a>
				<a href="profile_edit.php"><button type="edit">Edit</button></a>
            </div>
</body>
</html>

