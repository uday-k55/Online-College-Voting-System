<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Candidate</title>
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
 .navbar {
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
}
table {
            width: 67%;
            margin-left: 50px;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        img {
            width: 100px;
            height: 100px;
            border-radius: 5px;
        }
        .table a {
            color: #4CAF50;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<?php
session_start();
$id = $_SESSION['lid'];

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uday";

// Connect to MySQL using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch Eid data from the edetails table
$sql = "SELECT Eid FROM edetails";
$result = $conn->query($sql);
?>
<body>
<header>
        <h1>ONLINE COLLEGE VOTING SYSTEM </h1>
        <marquee>(College Name)</marquee> <br />
        <h2 align="right">Admin</h2>
        <p align="right"><a href="../logout.php"><input type="button" value="Log-out" /></a>
        </p>
</header>
<div class="navbar">
<h2 align="center"><font color="#FFFFFF"><a href="admin1.php"><strong>Admin</strong></a></font></h2><hr>
<a href="e_details.php"><strong>Election Deatils</strong></a>
<div class="dropdown">
		<a href="edetails.php">Add Election</a>
  </div>
      <a href="candidate1.php"><strong>Candidate</strong></a>
    <div class="dropdown">
		<a href="addcandidate.php">New Candidate</a>
        <a href="modify/candidate_edit.php">Edit Candidate</a>
  </div>
  <a href="voters_list.php"><strong>Voter's</strong></a>
  </div>
    <center>
        <div class="login-container">
            <h2>Candidate List</h2>
            <form action="" method="post">
                <div class="form-container">
                    <label for="eid_dropdown">Choose an Election ID:
                    <select name="eid_dropdown" id="eid_dropdown" onchange="this.form.submit()"></label>
                        <?php
                        // Check if there are any results
                        if ($result->num_rows > 0) {
                            // Loop through the results and create option elements
                            while($row = $result->fetch_assoc()) {
                                echo "<option value='" . htmlspecialchars($row['Eid']) . "'>" . htmlspecialchars($row['Eid']) . "</option>";
                            }
                        } else {
                            echo "<option value=''>No items found</option>";
                        }
                        ?>
                    </select>
                    <br />
                    <br />
                    <input type="submit" name="btn" value="OK">
                </div>
            </form>
        </div>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selected_eid = $_POST['eid_dropdown'];
            // Fetch candidate data based on selected Eid
            $sql = "SELECT photo, name, place, photo2, id, ElId FROM addcandidate WHERE ElId='$selected_eid'";
            $result = $conn->query($sql);

            echo '<table border="1" >
                    <tr>
                      <th>Photo</th>
                      <th>Name</th>
                      <th>Place</th>
                      <th>Symbol</th>
                      <th>Election ID</th>
                      <th>Candidate ID</th>
                      <th>Actions</th>
                    </tr>';

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['photo']) . "' width='100' height='100'/></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['place'] . "</td>";
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['photo2']) . "' width='100' height='100'/></td>";
                    echo "<td>" . $row['ElId'] . "</td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><a href='modify/candidate_del.php?id=" . $row["id"] . "'>Delete</a></td></tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No candidates found for the selected Election ID</td></tr>";
            }
            echo '</table>';
        }

        $conn->close();
        ?>
    </center>
</body>
</html>
