<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Page</title>
<style>
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
    border: 1px solid #ddd;
    border-radius: 4px;
}

header {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 1em 0;
}
main {
    display: flex;
    justify-content: space-between;
    padding: 1em;
}

main section {
    flex: 3;
}

main aside {
    flex: 1;
    background-color: #e2e2e2;
    padding: 1em;
    margin-left: 1em;
}
.button-group {
    display: flex;
    justify-content: space-between;
}

.button-group button {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button-group button:hover {
    background-color:#FF6600;
}

button[type="reset"] {
    background-color:#FF9933;
}

button[type="reset"]:hover {
    background-color:#999999;
}
button[type="submit"] {
    background-color:#FF9933;
}

button[type="submit"]:hover {
    background-color:#999999;
}
#message {
            color: red;
            text-align: center;
        }

footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 1em 0;
    position:relative;
    width: 100%;
    bottom: 0;
}
a {
    color:#333399;/* Example color: blue */
	text-decoration:none; /* Optional: Remove underline */
}
</style>
</head>

<body>
<header>
        <h1>ONLINE COLLEGE VOTING SYSTEM </h1>
        <marquee>
        <p>(College Name)</p>
        </marquee>
</header>
<main>
    <section>
        <h2>Welcome</h2>
        <p><img src="images/bg1.jpg" width="800" height="459" /></p>
        <p>Welcome to the College Election platform! We are committed to ensuring a transparent and fair election process for all students. Our goal is to facilitate a smooth voting experience and promote student engagement</p>
    <br>
    The Election Commission of India is an autonomous constitutional authority responsible for administering election processes in India<br>
    <img src="images/College-Election.jpg">
    
    </section>

    <aside>
        <h3>Login</h3>
        <form onsubmit="return login(event);" >
            <div class="input-group">
                <strong>ID:
                <input type="text" id="id" name="id" placeholder="Email" required></strong>
                <strong>Password:
                <input type="password" id="password" name="password" placeholder="Password" required></strong>
            </div>
            <div>
                <center>
                    <p><span class="style6">Don't have an account?</span></p>
                    <p class="style7"><font color="#FFFFFF"><a href="sign-up.php">Sign Up</a></font></p>
                </center>
                <span class="button-group">
                    <button type="reset"><strong>Reset</strong></button>
                    <button type="submit" name="s"><strong>Log-in</strong></button>
                </span>
            </div>
			<?php
			
			if(isset($_REQUEST['msg']))
{
			?>
            <p id="message"><?php echo $_REQUEST['msg'] ?></p>
			
			<?php
			}
			?>
        </form>
    </aside>
</main>
<footer>
    <img src="images/footer.png" width="auto" height="100" />
     <p >&copy; 2024 COLLEGE ELECTION COMMISSION</p>
</footer>
</body>
</html>
<?php
session_start();
if(isset($_REQUEST['s']))
{
    $un = $_REQUEST['id'];
    $pw = $_REQUEST['password'];
    $con = new mysqli("localhost", "root", "", "uday");
    
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $qry = "SELECT * FROM signup";
    $result = $con->query($qry);
    $flg = 0;

    while($row = $result->fetch_assoc())
    {
        if($un == $row['username'] && $pw == $row['password'])
        {
            $_SESSION['lid'] = $row['id'];
            $flg = 1;
        }
    }

    if($flg == 1)
    {
        if($un == 'admin') {
            header("Location: adminpage/admin1.php");
        } else {
            header("Location: 4box.php");
        }
    }
    else
    {
        header("Location: home.php?msg=<b>Invalid User or Password!!!</b>");
    }

    $con->close();
}
?>
