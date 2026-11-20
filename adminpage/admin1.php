<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>admin1</title>
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
 /*css for sidebar*/
 .navbar {
            position: fixed;
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
</head>
<body background="../images/Admin.gif">
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
</body>
</html>