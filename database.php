<?php  
include 'db.php';  

// Krijimi i tabelës Users  
$sqlUsers = "CREATE TABLE IF NOT EXISTS Users (  
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(30) NOT NULL,  
    lastname VARCHAR(30) NOT NULL,  
    position VARCHAR(50) NOT NULL,  
    email VARCHAR(50) NOT NULL UNIQUE,  
    password VARCHAR(50) NOT NULL  
)";  

try {  
    $pdo->exec($sqlUsers);  
    echo "Tabela Users u krijua me sukses<br>";  
} catch (PDOException $e) {  
    echo "Gabim gjatë krijimit të tabelës Users: " . $e->getMessage() . "<br>";  
}  

// Krijimi i tabelës Appointments  
$sqlAppointments = "CREATE TABLE IF NOT EXISTS appointments (  
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
    patient_name VARCHAR(50) NOT NULL,  
    patient_email VARCHAR(50),  
    appointment_date DATE NOT NULL,  
    appointment_time TIME NOT NULL,  
    doctor_name VARCHAR(50) NOT NULL  
)";  

try {  
    $pdo->exec($sqlAppointments);  
    echo "Tabela appointments u krijua me sukses<br>";  

    // Shtimi i kolonës message pas krijimit të tabelës  
    $pdo->exec("ALTER TABLE appointments ADD COLUMN message TEXT");  
    echo "Kolona 'message' u shtua me sukses në tabelën 'appointments'.";  
} catch (PDOException $e) {  
    echo "Gabim gjatë krijimit të tabelës appointments: " . $e->getMessage() . "<br>";  
}  

session_start();  

function validate_input($name, $lastname, $email, $password, $password_confirmation) {
    $errors = [];

    // Validate name
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $errors[] = "Name can only contain letters and spaces.";
    }

    // Validate last name
    if (!preg_match("/^[a-zA-Z\s]+$/", $lastname)) {
        $errors[] = "Last Name can only contain letters and spaces.";
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password (at least 8 characters, 1 uppercase letter, 1 lowercase letter, and 1 number)
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, and one number.";
    }

    // Confirm password
    if ($password !== $password_confirmation) {
        $errors[] = "Passwords do not match.";
    }

    return $errors;
}

// Regjistrimi i përdoruesve  
if (isset($_POST['register'])) {  
    $name = $_POST['name'];  
    $lastname = $_POST['lastname'];  
    $position = $_POST['position'];  
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);  
    $password = $_POST['password'];  
    $password_confirmation = $_POST['password_confirmation'];

    // Validate input
    $validation_errors = validate_input($name, $lastname, $email, $password, $password_confirmation);

    if (!empty($validation_errors)) {
        foreach ($validation_errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $password = md5($password);  // Hashimi i fjalëkalimit për siguri  

        try {  
            $register_stm = $pdo->prepare("INSERT INTO Users (name, lastname, position, email, password)  
            VALUES (:name, :lastname, :position, :email, :password)");  
            
            $register_stm->bindParam(':name', $name);  
            $register_stm->bindParam(':lastname', $lastname);  
            $register_stm->bindParam(':position', $position);  
            $register_stm->bindParam(':email', $email);  
            $register_stm->bindParam(':password', $password);  

            if ($register_stm->execute()) {  
                echo "Përdoruesi u regjistrua me sukses.";  
                header("Location: login.php");  // Ridrejtim në faqen e login  
                exit;  
            } else {  
                echo "Përdoruesi nuk u regjistrua - diçka shkoi keq!";  
            }  
        } catch (PDOException $e) {  
            echo "Gabim gjatë regjistrimit: " . $e->getMessage();  
        }  
    }
}  

// Login  
if (isset($_POST['login'])) {  
    $email = $_POST['email'];  
    $password = md5($_POST['password']); // Hashimi i fjalëkalimit për krahasim  

    try {  
        $login_stm = $pdo->prepare("SELECT * FROM Users WHERE email = :email AND password = :password");  
        $login_stm->bindParam(':email', $email);  
        $login_stm->bindParam(':password', $password);  

        $login_stm->execute();  

        if ($user = $login_stm->fetch(PDO::FETCH_ASSOC)) {  
            $_SESSION['loggedin'] = true;  
            $_SESSION['user_id'] = $user['id'];  
            $_SESSION['user_name'] = $user['name']; // Ruaj emrin në sesion  
            $_SESSION['user_lastname'] = $user['lastname']; // Ruaj mbiemrin në sesion  
            $_SESSION['user_position'] = $user['position']; // Ruaj pozicionin në sesion  

            header("Location: welcome.php"); // Ridrejtim në faqen e mirëseardhjes  
            exit;  
        } else {  
            echo "Email ose fjalëkalim i pavlefshëm.";  
        }  
    } catch (PDOException $e) {  
        echo "Gabim gjatë login: " . $e->getMessage();  
    }  
}  
?>
