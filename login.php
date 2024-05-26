<!DOCTYPE html>
<head>

    <title>Log In</title>
    <meta charset="UTF - 8">
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            box-sizing: border-box;
            margin: 50px;
            margin-right: 500px;
            margin-left: 500px;
            margin-top:50px;
            background-color: lightcyan;
        }
        img{
            height:50px;
        }
        
        #email{
            background-color: white;
            outline-color:aqua;
            width: 75%;
           padding: 15px;
           margin: 5px 0 22px 0;
           display: inline-block;
           border-color: aqua;

        }
        #password{
            background-color:white;
            outline-color:aqua;
            width: 75%;
           padding: 15px;
           margin: 5px 0 22px 0;
           display: inline-block;
           border-color: aqua;
        }
      
        #login{
            background-color: cornflowerblue;
            padding: 15px 25px;
            border: none;
            color: white;

        }
       
        #login:hover{
            background-color: green;
        }
       

        h1{
            color:blue;
            
            
        }

        label{
            color:blue;
            
            
        }
        .signup{
            text-decoration: none;
        }

        #background{
           background-image: url("images/form.jpg");
           opacity: 0.2;
           position:absolute;
           top:0;
           bottom:0;
           left:0;
           right:0;
           background-repeat: no-repeat;
           background-size: cover;
           z-index: -1;

     
        }
        
    </style>
   
    
    
    <body>
        <div id = "background"></div>
        <div>
            <img src="images/logo.png">
        </div>
        
        <br>
        <h1><b>Log In<b></h1>
        
        <form method="POST" action="database.php" >
            <label for="email"><b>Email<b></label>
            <br>
        
            <input type="email" name="email" id="email" placeholder="Email"
            value="<?= htmlspecialchars($_POST["email"] ??"") ?> ">
            <br>
            <label for="password"><b>Password<b></label>
            <br>
            <input type="password" name="password" id="password" placeholder="Password">
            <br>
            <button id="login" type="submit" name="login"><b>Log in<b></button>
            <br>
            <h4><b>If you don't have an account yet, you can </b><a class="signup" href="signup.php"><b>Sign up</b></a></h4>

        </form>
    </body>
</head>


<?php
// Kredencialet statike të përdoruesit
$static_username = "grupi18@student.uni-pr.edu";
$static_password = "Ueb2"; // Zëvendëso me një fjalëkalim të sigurtë të statik

session_start(); // Starto sesionin

// Kontrollo nëse forma është dërguar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Kontrollo për kredencialet
    if ($username == $static_username && $password == $static_password) {
        // Kredencialet janë të saktë, regjistro përdoruesin në sesion
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Drejto përdoruesin në faqen e mirëseardhjes
        header("Location: welcome.php");
        exit;
    } else {
        // Kredencialet janë të pasakta, shfaq një mesazh gabimi
        $error = "Username or Password is invalid";
    }
}
?>
