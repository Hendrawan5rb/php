<?php
require "../connect.php";

if (isset($_COOKIE['identifier']) && isset($_COOKIE['login'])) {
    $id = $_COOKIE['identifier'];
    $login = $_COOKIE['login'];

    $result = mysqli_query($connect, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    if ($login === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

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
                <td><input type="text" name="username" id="username" autofocus></td>
            </tr>
            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
        </table>

        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me</label>

        <br>
        <a href="registration.php">Don't have an account?</a>

        <br><br>

        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>