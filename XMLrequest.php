<?php
session_start();

if (!isset($_SESSION['user_id'])) {
   
    header("Location: login.php");
    exit("User ID not set in session.");
}

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX User Update</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Users</h1>
        <div id="users"></div>

        <h2 class="text-center mt-5">Update User</h2>
<form id="updateForm" method="post">
    <div class="hidden">
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $user_id  ?>">
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="lastname">Lastname:</label>
        <input type="text" class="form-control" id="lastname" name="lastname" required>
    </div>
    <input type="button" class="btn btn-primary" value="Update User" onclick="updateUser()">
</form>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    function loadUsers() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'read_users.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var users = JSON.parse(xhr.responseText);
                    var usersDiv = document.getElementById('users');
                    usersDiv.innerHTML = '';
                    for (var i = 0; i < users.length; i++) {
                        usersDiv.innerHTML += 'ID: ' + users[i].id + ', Name: ' + users[i].name + ', Lastname: ' + users[i].lastname + '<br>';
                    }
                } else {
                    console.error('Error loading users: ' + xhr.status);
                }
            }
        };
        xhr.send();
    }

    function updateUser() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_user.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        var id = document.getElementById('user_id').value;
        var name = document.getElementById('name').value;
        var lastname = document.getElementById('lastname').value;

        var params = 'id=' + id + '&name=' + name + '&lastname=' + lastname;

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    alert(xhr.responseText);
                    loadUsers(); 
                } else {
                    console.error('Error updating user: ' + xhr.status);
                }
            }
        };
        xhr.send(params);
    }

    window.onload = loadUsers;
</script>

</body>
</html>
