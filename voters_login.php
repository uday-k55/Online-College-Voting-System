<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Voters Login</title>
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

nav {
    background-color: #333;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 1em;
}

nav ul li a {
    color: white;
    text-decoration: none;
    padding: 0.5em 1em;
    display: block;
}

nav ul li a:hover {
    background-color: #575757;
}
/*css for login*/

.login-container {
    background-color: white;
	margin-top: 50px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    width: 450px;
    text-align: center;
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    font-size: 14px;
    color: #333;
    display: block;
}

.input-group input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 5px;
}

.input-group input:focus {
    outline: none;
    border-color: #007BFF;
}

.btn {
    width: 100%;
    padding: 12px;
    background-color:#4CAF50;
    border: none;
    color: white;
    font-size: 16px;
    border-radius: 4px;
    cursor: pointer;
}

.btn:hover {
    background-color:#4CAF50;
}

.forgot-password {
    margin-top: 10px;
}

.forgot-password a {
    text-decoration: none;
    font-size: 14px;
    color: #007BFF;
}

.forgot-password a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<header>
        <h1>ONLINE COLLEGE VOTING SYSTEM </h1>
        <marquee><p>(College Name)</p></marquee>
</header>
    <nav>
        <ul>
            <li><a href="4box.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Log-out</a></li>
        </ul>
    </nav>
<center><div class="login-container">
        <h2>Voter's Login</h2>
        <form onsubmit="return login(event);" >
          <div class="input-group">
              <label for="student-id"><strong>Voter ID</strong></label>
              <strong>
                <input type="text" id="voter_id" name="voter_id" placeholder="Enter Your Roll No" required>
                  </strong></div>
            <div class="input-group">
                <strong>
                <label for="password">Password</label>
                </strong>
                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <button type="submit" name="s" class="btn">Vote</button>
            <p class="forgot-password"><a href="#">Forgot Password?</a></p>
        </form>
        </center>
    </div>
</body>
</html>
<?php
session_start();
if(isset($_REQUEST['s']))
{
    $voter_id = $_REQUEST['voter_id'];
    $pw = $_REQUEST['password'];
    $con = new mysqli("localhost", "root", "", "uday");
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $qry = "SELECT * FROM signup WHERE status='NA'";
    $result = $con->query($qry);
    $flg = 0;

    while($row = $result->fetch_assoc())
    {
        if($pw == $row['password'] && $voter_id == $row['voter_id'])
        {
            $_SESSION['lid'] = $row['id'];
            $flg = 1;
        }
    }

    if($flg == 1)
    {
        header("Location: candidates.php");
    }
    else
    {
        echo "<script>alert('Invalid request or you already marked your vote'); window.location.href='voters_login.php';</script>";
    }

    $con->close();
}
?>
