<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Users</title>
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
	};
	
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
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
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
        };

	</style>
</head>

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
	<div align="center"><br>
	    <br>
</div>
	<h2 align="center">Voter's List</h2>
    <div align="center" class="table">
      <table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Created_at</th>
        <th>Actions</th>
    </tr>
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

     $sql = "SELECT id, name, phone, email, created_at FROM signup WHERE email != 'admin'";
    $result = mysql_query($sql, $conn);

    if (mysql_num_rows($result) > 0) {
        while($row = mysql_fetch_assoc($result)) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>" . $row["created_at"] . "</td>";
            echo "<td><a href='modify/user_del.php?email=" . $row["email"] . "'>Delete</a></td></tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No results found</td></tr>";
    }
    mysql_close($conn);
    ?>
</table>
    </div>
</body>
</html>