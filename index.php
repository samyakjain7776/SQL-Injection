<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL injection</title>
    <style>
        html {
            background-image: linear-gradient(to bottom right, #e1bee7, #b2ebf2);
            height: 100%;
        }
        body{
            overflow: hidden;
        }
        h1,
        p,
        button {
            font-family: Helvetica, sans-serif;
            font-weight: 100;
            color: black;
        }

        h1 {
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
            width: 300px;
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
    <h1>ISSA (SQL Injection)</h1>
    <p>Have Account!</p>
    <div class="container container-one">
        <a href="signUp.php"><button style="color: white;">
                Login
                <div class="fill-one"></div>
            </button></a>
    </div>
    <p>Don't have Account? Make One!</p>
    <div class="container container-two">
        <a href="registration.php"><button style="color: white;">
                Register
                <div class="fill-two"></div>
        </button></a>
    </div>
</body>

</html>