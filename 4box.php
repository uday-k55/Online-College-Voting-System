<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Home Page</title>
<style>
    /*css for green*/
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
    background-color:#4CAF50;
}
.container {
    display:grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    max-width: 700px;
    margin: auto;
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
}

.profile-box {
    background: white;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    padding: 20px;
    transition: transform 0.3s, box-shadow 0.3s; /* Add transition for transform and box-shadow */
}

.profile-box:hover {
    transform: translateY(-5px); /* Lift the box up */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Increase shadow on hover */
}

.profile-photo {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 15px; /* Adjusted for better spacing */
}

.name {
    font-size: 1.5em;
    margin: 10px 0 5px;
    font-weight: bold; /* Make name bold */
}

.place {
    font-size: 1em;
    color: #777;
    margin-bottom: 30px;
}

.signature {
    width: 120px;
    height: auto;
}

@media (max-width: 600px) {
    .container {
        grid-template-columns: 1fr; /* Stack columns on small screens */
    }
}
.vote-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .vote-button:hover {
            background-color: #45a049;
        }

        .main-vote-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .main-vote-button:hover {
            background-color: #45a049;
        }
		a {
	      text-decoration:none; /* Optional: Remove underline */
}
</style>
</head>
<?php
session_start();
$id=$_SESSION['lid'];

$con=mysql_connect("localhost","root","");
mysql_select_db("uday",$con);
$qry="select * from signup where id=$id";
$cnt=mysql_query($qry,$con);
if($row=mysql_fetch_array($cnt))
{
$name=$row[1];
}
?>
<body>
    <header>
        <h1>ONLINE COLLEGE VOTING SYSTEM </h1>
        <marquee><p>(College Name)</p></marquee>
		<h2>Welcome  <?php echo $name ?></h2>
</header>
<nav>
        <ul>
            <li><a href="4box.php">Home</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="logout.php">Log-out</a></li>
			<li><a href="MyProfile.php">My Profile</a></li>
        </ul>
    </nav>
	<br />
	<a href="voters_login.php" class="main-vote-button">Vote</a>
	<div align="right"><a href="result1.php" class="main-vote-button">Result</a></div>
	
	<div class="container">
	<div class="container">
    <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "uday";

        // Connect to MySQL using mysqli
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the database
        $sql = "SELECT photo, name, place, photo2 FROM addcandidate";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Loop through each record and display as profile box
            while($row = $result->fetch_assoc()) {
                echo "<div class='profile-box'>";
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Profile Photo' class='profile-photo'/>";
                echo "<h3 class='name'>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p class='place'>" . htmlspecialchars($row['place']) . "</p>";
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo2']) . "' width='75' height='70'/>";
                echo "</div>";
            }
        } else {
            echo "<p>No profiles found.</p>";
        }

        $conn->close();
    ?>
</body>
</html>