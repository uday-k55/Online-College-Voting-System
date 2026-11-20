<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Candidate Voting</title>
	<head>
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
    background-color:#4CAF50;
}

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .profile-box {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 200px;
            transition: transform 0.3s ease;
        }

        .profile-box:hover {
            transform: translateY(-10px);
        }

        .profile-photo {
            border-radius: 50%;
            width: 100px;
            height: 100px;
        }

        .name {
            font-size: 1.2em;
            margin: 10px 0;
            color: #333;
        }

        .place {
            color: #777;
            margin-bottom: 10px;
        }

        .symbol {
            width: 75px;
            height: 70px;
            border-radius: 10px;
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
        </ul>
    </nav>
    <div class="container">
        <?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uday";

// Connect to MySQL
$conn = mysql_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysql_error());
}
mysql_select_db($dbname, $conn);
$dt=date("y/m/d");
//echo $dt;
$sql = "SELECT * FROM addcandidate,edetails where addcandidate.elid=edetails.eid and edetails.edate='$dt'";
$result = mysql_query($sql, $conn);

// Check if the query was successful
if ($result) {
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            echo "<div class='profile-box'>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' alt='Profile Photo' class='profile-photo'/>";
            echo "<h3 class='name'>" . htmlspecialchars($row['name']) . "</h3>";
            echo "<p class='place'>" . htmlspecialchars($row['place']) . "</p>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($row['photo2']) . "' alt='Symbol' class='symbol'/>";
			echo "<h3 class='name'>" . htmlspecialchars($row['id']) . "</h3>";
            echo "<form action='vote.php' method='POST'>";
            echo "<input type='hidden' name='candidate_id' value='" . htmlspecialchars($row['id']) . "'>";
            echo "<button type='submit' class='vote-button'>Vote</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "<p>No profiles found</p>";
    }
} else {
    echo "<p>Error executing query: " . mysql_error() . "</p>";
}

mysql_close($conn);
?>

</div>
</body>
</html>