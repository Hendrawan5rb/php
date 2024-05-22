<?php
require "../connect.php";

if (!isset($_SESSION['login'])) {
    header("Location: /auth/login.php");
    exit;
}

if (isset($_POST['create'])) {
    if (create($_POST) > 0) {
        echo "<script>
            alert('Berhasil');
            document.location.href= 'index.php'
        </script>";
    } else {
        echo "<script>
            alert('Gagal');
            document.location.href= 'create.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
</head>

<body>
    <h1>Create Project</h1>

    <a href="index.php"><button>Kembali </button></a>
    <br><br>

    <form method="POST" enctype="multipart/form-data">

        <table>
            <tr>
                <td>
                    <label for="judul">Judul</label>
                </td>
                <td> : </td>
                <td>
                    <input type="text" name="judul" id="judul" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ide">Ide</label>
                </td>
                <td> : </td>
                </td>
                <td>
                    <textarea name="ide" id="ide"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="premis">Premis</label>
                </td>
                <td> : </td>
                </td>
                <td>
                    <textarea name="premis" id="premis"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="gambar">Gambar</label>
                </td>
                <td> : </td>
                </td>
                <td>
                    <input type="file" name="gambar" id="gambar">
                </td>
            </tr>
        </table>

        <br>
        <button type="submit" name="create">Create</button>

    </form>

    <!-- <div style="position: absolute; top:0; bottom:0; left: 0; right:0; background-color: black; color: red; text-align: center; font-size: 100px;">WKWKWKWKWK</div> -->
</body>

</html>