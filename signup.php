<!DOCTYPE html>
<head>
    <title>Sign Up</title>
    <meta charset="UTF - 8">
  
    
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
            box-sizing: border-box;
            margin-left: 500px;
            margin-right: 500px;
            background-color: lightcyan;
            margin-top:50px;
        }

       img{
        height: 50px;
        
       }
        #name{
            background-color:white;
            outline-color:aqua;
            width: 75%;
           padding: 15px;
           margin: 5px 0 22px 0;
           display: inline-block;
           border-color: aqua;
        }
        #last_name{
            background-color:white;
            outline-color:aqua;
            width: 75%;
           padding: 15px;
           margin: 5px 0 22px 0;
           display: inline-block;
           border-color: aqua;
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
        #password_confirmation{
            background-color: white;
            outline-color:aqua;
            width: 75%;
           padding: 15px;
           margin: 5px 0 22px 0;
           display: inline-block;
           border-color: aqua;
        }

        .signup{
            background-color: cornflowerblue;
            padding: 15px 25px;
            border: none;
            color: white;

        }
        .cancel{
            background-color: red;
            padding: 15px 25px;
            border:none;
            color:white;
        }

        .signup:hover{
            background-color: green;
        }
        .cancel:hover{
            background-color: green;
        }

        h1{
            color: blue;
            
        }

        label{
            color:blue;
            
        }

        .background{
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
        <div class="background"></div>
        <div>
            <img src = "images/logo.png">
        </div>
        <br>

        

        <h1 ><b>Sign Up</b></h1>
        
        
    
        <form action="database.php" method="post" id="signup" novalidate>
    <div class="form-group hidden">
        <input type="hidden" name="action" id="action" class="form-control mb-3" value="register" />
    </div>
    <div>
        <label for="name"><b>Name</b></label>
        <br>
        <input type="text" placeholder="Enter name" id="name" name="name" required>
    </div>
    <div>
        <label for="last_name"><b>Last Name</b></label>
        <br>
        <input type="text" placeholder="Enter last name" id="last_name" name="lastname" required>
    </div>
    <div class="form-group">
        <label for="position"><b>Position:</b></label>
        <select id="position" name="position" required>
            <option value="Doctor">Doctor</option>
            <option value="Nurse">Nurse</option>
        </select>
    </div>
    <div>
        <label for="email"><b>Email</b></label>
        <br>
        <input type="email" placeholder="Enter email" id="email" name="email" required>
    </div>
    <div>
        <label for="password"><b>Password</b></label>
        <br>
        <input type="password" placeholder="Enter password" id="password" name="password" required>
    </div>
    <div>
        <label for="password_confirmation"><b>Confirm the password</b></label>
        <br>
        <input type="password" placeholder="Re - enter the password" id="password_confirmation" name="password_confirmation">
    </div>
    <h4><b>If you  have an account</b><a class="login" href="login.php"> <b>Login</b></a></h4>
    <button class="signup" type="submit" name="register"><b>Sign up</b></button>
    <button class="cancel" type="button"><b>Cancel</b></button>
</form>


    </body>
</head>