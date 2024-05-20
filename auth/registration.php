<?php
require '../connect.php';

if (isset($_POST['register'])) {
    if (register($_POST) > 0) {
        echo "<script>
        alert('Registrasi Berhasil');
        document.location.href= '/CRUD/index.php';
        </script>";
    }
} else {
    mysqli_error($connect);
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

        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>