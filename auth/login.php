<?php
require "../connect.php";

if (isset($_SESSION['login'])) {
    header("Location: /CRUD/read.php");
    exit;
}

if (isset($_POST['login'])) {
    if (login($_POST) === false) {
        echo "<script>alert('Username atau password salah');</script>";
        // mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="POST">
        <table>
            <tr>
                <td><label for="username">Username</label></td>
                <td>:</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
        </table>

        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>