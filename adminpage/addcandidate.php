<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add New Candidate</title>
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
		body{
		
            font-family: Arial, sans-serif;
        }
		
        .container {
            width: 40%;
            margin: auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="file"] {
            padding: 3px;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .buttons .cancel {
            background-color: #f44336;
            color: white;
        }
        .buttons .add {
            background-color: #4CAF50;
            color: white;
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

    </style>
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
	<br>
	<br>
    <div class="container">
<h2>New Candidate</h2>
    <form action="addcandidate.php" method="post" enctype="multipart/form-data">
		<div class="form-group">
            <label for="photo">Election ID</label>
            <input type="text" id="id" name="Eid" required>
        </div>
	<div class="form-group">
            <label for="photo">Candidate ID</label>
            <input type="text" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" id="photo" name="photo" required>
        </div>
        <div class="form-group">
            <label for="name">Candidate Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="place">Place</label>
            <input type="text" id="place" name="place" required>
        </div>
        <div class="form-group">
            <label for="photo2">Photo</label>
            <input type="file" id="photo2" name="photo2" required>
        </div>
        <div class="buttons">
            <a href="admin1.php"><button type="button" class="cancel">Cancel</button></a>
            <button type="submit" name="s" class="add">Add</button>
        </div>
    </form>
</body>
</html>
<?php
if (isset($_POST['s'])) {
    // File upload paths
    $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $photo2 = addslashes(file_get_contents($_FILES['photo2']['tmp_name']));
    $eid=$_REQUEST['Eid'];
    $name = $_POST['name'];
    $place = $_POST['place'];
	$id = $_POST['id'];

    // Database connection
    $con = mysql_connect("localhost", "root", "");
    mysql_select_db("uday", $con);

    // Insert query
    $qry = "INSERT INTO addcandidate (photo, name, place, photo2, id,ElId) VALUES ('$photo', '$name', '$place', '$photo2', '$id',$eid)";
    $cnt = mysql_query($qry, $con);

    if ($cnt > 0) {
        echo "Data Inserted";
        header("Location: candidate_list.php");
    } else {
        echo "Failed";
    }

    mysql_close($con);
}
?>
