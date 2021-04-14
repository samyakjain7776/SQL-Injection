<!DOCTYPE html>  
<html>  
<head> 
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL injection </title>
    <style>
        html {
            background-image: linear-gradient(to bottom right, #e1bee7, #b2ebf2);
            height: 100%;
        }
        body{
            overflow: hidden;
        }
        h1,
	h2,
        p,
        button,input[type=submit]{
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

        .container {
            text-align: center;
            position: relative;
            width: 400px;
            margin: 0 auto;
            cursor: pointer;
        }

        button{
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
            padding: 12px 25px;
            font-size: 1.1em;
            letter-spacing: 0.2em;
            margin: 4px 2px;
            box-shadow: 0 4px 12px 0 rgba(152, 160, 180, 10);
            cursor: pointer;
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

.submitinp {
	width: 150px;
}

    </style> 
</head>  
<body>    
  
<?php  

$servername = "localhost";
$username = "root";
$passwd = "";
$dbname = "isaawebsite";
$host = ini_get("mysqli.default_host");

// Create connection
$conn = new mysqli($host, $username, $passwd, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// define variables to empty values  
$email0Err = $passw0Err = "";   
$passw0 = $email0 = "";


?>  
  <p>Don't have Account? Make One!</p>
    <div class="container container-two">
        <a href="/isaa/registration.php"><button style="color: white;">
                Register
                <div class="fill-two"></div>
        </button></a>
    </div>
   
<h1>Login</h1>  
<div class="container">
<span class = "error" style="color:red">* required field </span>  
<br><br>  

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
    <label for="emi">Email:  </label>   
    <input id="emi" type="text" name="email0" >  
    <span class="error" style="color:red">* <?php echo $email0Err; ?> </span>  
    <br><br>
    Password:   
    <input type="text" name="passw0">  
    <span class="error" style="color:red">* <?php echo $passw0Err; ?> </span>  
    <br><br>	
    <input type="submit" class="submitinp" name="submit0" value="Submit">   
    <br><br>                             
</div>
</form>  
<div class="container">
<?php
if(isset($_POST['submit0'])){


function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 

$email0 = input_data($_POST["email0"]);
$passw0 = input_data($_POST["passw0"]);


	$sql = "SELECT * FROM SQL_INJECTION_DA WHERE email='".$email0."' AND passw=md5('".$passw0."')";
	$result = $conn->query($sql);
    
	if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        echo "<br><br><b>Email: </b>" . $row["email"]. "&nbsp&nbsp <b>Password: </b>" . $row["passw"]. "<br>";}
    } else {
		echo "No such User Registered";
	}
} 


?>	
</div>
  
</body>  
</html> 