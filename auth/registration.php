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

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('Registrasi Berhasil');
        document.location.href= '/CRUD/read.php';
        </script>";
    } else {
        mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
            <tr>
                <td><label for="confirm">Confirm Password</label></td>
                <td>:</td>
                <td><input type="password" name="confirm" id="confirm"></td>
            </tr>
        </table>

        <a href="login.php">Already have an account?</a>
        <br><br>

        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>