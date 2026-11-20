<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Voting Results</title>
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
	/*css for sidebar*/
navbar {
            position:absolute;  
            top: 50;
            left: 0;
            background-color: #333;
            width: 200px;
            height: 100%;
            overflow: auto;
        }

        .navbar a {
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown {
            display: none;
            background-color: #333;
            position: relative;
            left: 0;
        }

        .dropdown a {
            text-align: left;
        }

        .navbar a:hover + .dropdown, .dropdown:hover {
            display: block;
        }
		a {
    color:#000000;/* Example color: blue */
	text-decoration:none; /* Optional: Remove underline */
	};

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .header {
            margin: 20px;
            text-align: center;
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
    </style>
</head>
<?php session_start(); $id=$_SESSION['lid'];
// Database connection details 
$servername = "localhost"; $username = "root"; $password = ""; $dbname = "uday"; 
// Connect to MySQL using MySQLi 
$conn = new mysqli($servername, $username, $password, $dbname); 
if ($conn->connect_error) 
{ die("Connection failed: " . $conn->connect_error); } 
if (isset($_POST['eid_dropdown'])) 
{ $Eid = $_POST['eid_dropdown']; } 
else  die("Eid not selected.");
// Fetch Eid data from the edetails table
$sql = "SELECT Eid FROM edetails";
$result = $conn->query($sql);
?>
<body>
    <header> <h1>ONLINE COLLEGE VOTING SYSTEM</h1>
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
    <br>
    <center><h2>Result of Election ID <?php echo $Eid ?></h2></center>
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uday";

// Connect to MySQL using MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['eid_dropdown'])) {
    $selected_eid = $_POST['eid_dropdown'];

    // Query to get candidates and their votes for the selected Eid
    $sql = "SELECT addcandidate.name, candidate_votes.votes 
            FROM addcandidate 
            JOIN candidate_votes ON addcandidate.id = candidate_votes.candidate_id
            WHERE addcandidate.elid = '$selected_eid'
            ORDER BY candidate_votes.votes DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Use the long array syntax for compatibility with older PHP versions
        $positions = array("Chairman", "Vice Chairman", "General Secretary", "Editor Magazine", "Arts Secretary");
        $index = 0;

        echo "<table border='1'>
                <tr>
                    <th>Position</th>
                    <th>Name</th>
                    <th>Votes</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            if ($index >= count($positions)) {
                break; // Exit loop if more rows exist but no positions remain
            }

            echo "<tr>";
            echo "<td>" . htmlspecialchars($positions[$index]) . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['votes']) . "</td>";
            echo "</tr>";

            $index++;
        }
        echo "</table>";
    } else {
        echo "<p>No voting results found for the selected Election ID.</p>";
    }
}

$conn->close();
?>
