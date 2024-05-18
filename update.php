<?php
require "connect.php";

$id = $_GET['id'];

$komik = read("SELECT * FROM komik WHERE id = $id")[0];

if (isset($_POST['update'])) {
    if (update($_POST) > 0) {
        echo "<script>
            alert('Berhasil');
            document.location.href= 'index.php'
        </script>";
    } else {
        echo "<script>
            alert('Gagal');
            document.location.href= 'update.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Project</title>
</head>

<body>
    <h1>Update Project</h1>

    <a href="index.php"><button>Kembali </button></a>
    <br><br>

    <form method="POST">

        <table>
            <tr>
                <td>
                    <label for="judul">Judul</label>
                </td>
                <td> : </td>
                <td>
                    <input type="hidden" name="id" id="id" value="<?= $komik['id']; ?>" required>
                    <input type="text" name="judul" id="judul" value="<?= $komik['judul']; ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ide">Ide</label>
                </td>
                <td> : </td>
                </td>
                <td>
                    <textarea name="ide" id="ide"><?= $komik['ide']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ide">Premis</label>
                </td>
                <td> : </td>
                </td>
                <td>
                    <textarea name="premis" id="premis"><?= $komik['premis']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="ide">Gambar</label>
                </td>
                <td> : </td>
                </td>
                <td>
                    <input type="file" name="gambar" id="gambar">
                </td>
            </tr>
        </table>

        <br>
        <button type="submit" name="update">Update</button>

    </form>

    <!-- <div style="position: absolute; top:0; bottom:0; left: 0; right:0; background-color: black; color: red; text-align: center; font-size: 100px;">WKWKWKWKWK</div> -->
</body>

</html>