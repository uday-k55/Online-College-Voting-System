<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Details</title>
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
        form {
            max-width: 400px;
            margin: 20px auto; /* Ensured margin is only on the auto sides */
            padding: 30px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 15px; /* Added margin for spacing */
        }
		input[type="butn"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="butn"]:hover {
            background-color: #45a049;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .marquee {
             overflow: hidden;
             white-space: nowrap;
             animation: marquee 15s linear infinite; /* Change '10s' to your desired speed */
}

@keyframes marquee {
    from { transform: translateX(100%); }
    to { transform: translateX(-100%); }
}
body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
    <main>
        <h1>Election Details</h1>
        <form>
		    <label for="electionName">Election ID:</label>
            <input type="text" id="Eid" name="Eid" required>
		
            <label for="electionName">Election Name:</label>
            <input type="text" id="eName" name="eName" required>

            <label for="electionDate">Election Date:</label>
            <input type="date" id="eDate" name="eDate" required>

            <label for="electionLocation">Election Location:</label>
            <input type="text" id="eLocation" name="eLocation" required>

            <a href="e_details.php"><input type="butn" value="Cancel"></a>
            <input type="submit" name="s" value="Submit">
        </form>
   
</body>
</html>
<?php
if(isset($_REQUEST['s']))
{
$eName=$_REQUEST['eName'];
$eDate=$_REQUEST['eDate'];
$eLocation=$_REQUEST['eLocation'];
$Eid=$_REQUEST['Eid'];
$con=mysql_connect("localhost","root","");
mysql_select_db("uday",$con);
$qry="insert into edetails(eName,eDate, eLocation, Eid) values('$eName',$eDate,'$eLocation', Eid)";
echo "$qry";
$cnt=mysql_query($qry,$con);
if($cnt>0){
  echo " Data Inserted ";
header("location:e_details.php");
  }
else
  echo " Failed ";
  
  }
?>
