<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>signup</title>
<style>
    header {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 1em 0;
}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
}

.input-group input {
    width: 100%;
    padding: 8px;
    border: 1px solid #080808;
    border-radius: 4px;
}
/*css for <login>*/
.login-container {
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    width: 350px;
    text-align: center;
}

.login-container h1 {
    font-size: 1.5em;
    color: #4CAF50;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group span {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
}

.input-group input[type="text"],
.input-group input[type="ID"],
.input-group input[type="tel"],
.input-group input[type="email"],
.input-group input[type="password"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.button-group {
    display: flex;
    justify-content: space-between;
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
    width: 45%;
}

.button-group button:hover {
    background-color:#999999;
}

.button-group a {
    color: white;
    text-decoration: none;
}

a {
    color:#FFFFFF; /* Example color: blue */
    text-decoration: none; /* Optional: Remove underline */
}
</style>
</head>
<body alink="#FFFFFF">
    <header>
        <h1>ONLINE COLLEGE VOTING SYSTEM </h1>
        <marquee>
        <p>(College Name)</p>
        </marquee>
</header>
<br />
<center>
<div class="login-container" style="background-image">
        <h1><font color="#4CAF50">Sign Up</font></h1>
        <form action="sign-up.php" method="POST">
            <div class="input-group">
               <font color="#000000"><strong><span class="style8">Name:
               </span>
               <input type="text" id="name" name="name" placeholder="Name" required>
               </strong>
			   <strong><span class="style8">Student ID:</span>
                <input type="ID" id="voter_id" name="voter_id" placeholder="Roll No" required>
               </strong>
                <strong><span class="style8">Phone Number:</span>
                <input type="tel" id="phone" name="phone" placeholder="Mobile No" required>
               </strong>
				<strong><span class="style8">Email:</span>
                <input type="email" id="email" name="email" placeholder="Email ID" required>
				</strong>
				<strong><span class="style8">Password:</span>
                <input type="password" id="password" name="password"  placeholder="Password" required>
				</strong>
               </font></div>
            <div>
              <font color="#FFFFFF"><span class="button-group">
              <button type="cancel">
              <strong><a href="home.php">Cancel</a></strong>
              </button>
              <button type="submit" name="s"><strong>Sign-Up</strong></button>
          </span></font></div>
        </form>
    </center>
</div>
</body>
</html>

<?php
session_start();
if(isset($_REQUEST['s'])) {
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $voter_id = $_REQUEST['voter_id'];
    // Create connection
    $con = new mysqli("localhost", "root", "", "uday");

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $qry = "INSERT INTO signup (name, phone, email, password, voter_id) VALUES ('$name', '$phone', '$email', '$password', '$voter_id')";
    

    $_SESSION['lid'] = $con->insert_id;
    
    if ($con->query($qry) === TRUE) {
        echo "Data Inserted";
        header("Location: home.php");
        exit();
    } else {
        echo "Failed: " . $con->error;
    }

    $con->close();
}
?>
