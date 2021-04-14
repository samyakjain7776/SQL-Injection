<!DOCTYPE html>  
<html>  
<head> 
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL injection </title>
    <style>
        BODY {
            background-image: linear-gradient(to bottom right, #e1bee7, #b2ebf2);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        h1,
	h2,
        p,
        button,input[type=submit] {
            font-family: Helvetica, sans-serif;
            font-weight: 100;
            color: black;
        }

        h1,
	h2 {
            letter-spacing: 0.2em;
            text-align: center;
            margin-top: 50px;
            line-height: 1.6em;
        }

        p {
            font-size: 1.1em;
            text-align: center;
            margin: 110px auto 20px;
            letter-spacing: 0.05em;
        }
        input[type=text], select {
              width: 250px;
              padding: 12px 20px;
              margin: 8px 0;
              display: inline-block;
              border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;
        }

        input[type=submit] {
            border-radius: 5px;
            text-transform: uppercase;
            background-image: linear-gradient(to right, #e040fb, #00bcd4);
            border: none;
            color: white;
            padding: 10px 18px;
            font-size: 1.1em;
            letter-spacing: 0.2em;
            margin: 4px 2px;
            box-shadow: 0 4px 12px 0 rgba(152, 160, 180, 10);
            cursor: pointer;
}

        .container {
            text-align: center;
            position: relative;
            width: 700px;
            margin: 0 auto;
            cursor: pointer;
        }

        button {
            position: relative;
            height: 50px;
            width: 280px;
            border: 0;
            border-radius: 5px;
            text-transform: uppercase;
            font-size: 1.1em;
            letter-spacing: 0.2em;
            overflow: hidden;
            box-shadow: 0 4px 12px 0 rgba(152, 160, 180, 10);
            z-index: -2;
        }


        .fill-one {
            position: absolute;
            background-image: linear-gradient(to right, #e040fb, #00bcd4);
            height: 70px;
            width: 420px;
            border-radius: 5px;
            margin: -40px 0 0 -140px;
            z-index: -1;
            transition: all 0.4s ease;
        }

        .container-one:hover .fill-one {
            -webkit-transform: translateX(100px);
            -moz-transform: translateX(100px);
            transform: translateX(100px);
        }

        .fill-two {
            position: absolute;
            background-image: linear-gradient(to right, #e040fb, #00bcd4);
            background-size: 150% 150%;
            height: 70px;
            width: 420px;
            border-radius: 5px;
            margin: -40px 0 0 -140px;
            z-index: -1;
            transition: all 0.4s ease;
        }

        .container-two:hover .fill-two {
            -webkit-animation: gradient 3s ease infinite;
            -moz-animation: gradient 3s ease infinite;
            animation: gradient 3s ease infinite;
        }

        @-webkit-keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @-moz-keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style> 
</head>  
<body>    
	
<p>Have Account!</p>
    <div class="container container-one">
        <a href="/isaa/signUp.php"><button style="color: white;">
                Login
                <div class="fill-one"></div>
            </button></a>
    </div>  
<div class="container">
<?php  
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$servername = "localhost";
$username = "root";
$passwd = "";
$dbname = "isaawebsite";
$host = ini_get("mysqli.default_host");

// Creating connection
$conn = new mysqli($host, $username, $passwd, $dbname);
// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// defining variables to empty values  
$nameErr = $emailErr = $passwErr = $genderErr = "";  
$name = $email = $passw0 = $gender = "";  

$name = input_data($_POST["name"]);  
$email = input_data($_POST["email"]);
$passw0 = input_data($_POST["passw0"]); 
$gender = input_data($_POST["gender"]);  

function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 

?> 
  
<h1>Registration Form</h1>  
<span class = "error" style="color:red">* required field </span>  
<br><br>  

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    Name:   
    <input type="text" name="name">  
    <span class="error" style="color:red">* <?php echo $nameErr; ?> </span>  
    <br><br>  
    <label for="em">Email:  </label>  
    <input id="em" type="text" name="email">  
    <span class="error" style="color:red">* <?php echo $emailErr; ?> </span>  
    <br><br> 
    <label for="pwd">Password:  </label> 
    <input id="pwd" type="text" name="passw0">  
    <span class="error" style="color:red">* <?php echo $passwErr; ?> </span>  
    <br><br> 	 
    Gender:  
    <input type="radio" name="gender" value="male"> Male  
    <input type="radio" name="gender" value="female"> Female  
    <input type="radio" name="gender" value="other"> Other  
    <span class="error" style="color:red">* <?php echo $genderErr; ?> </span>  
    <br><br>  
	                          
    <input type="submit" value="Submit" name="submit"></input>   
    <br><br> 
</form> 
</div> 	  
<div class="container">
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $passwErr == "" && $genderErr == "") {  
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>"; 
		echo "Password: ********" ;  
        echo "<br>"; 
        echo "Gender: " .$gender;  
		echo "<br>"; 
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }
	$sql = "INSERT INTO SQL_INJECTION_DA (email,name,passw,gender) VALUES ('".$email."','".$name."',md5('".$passw0."'),'".$gender."')";
	if ($conn->query($sql) === TRUE) {
		echo "<br>"; 
		echo "New record created successfully <br><br>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}	
}	
?> 
</div>  
</body>  
</html> 