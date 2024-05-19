<?php
require "connect.php";

$id = $_GET['id'];

$komik = read("SELECT * FROM komik WHERE id = $id")[0];

if (isset($_POST['update'])) {

    if (empty(update($_POST))) {
        echo "<script>
            alert('Berhasil');
            document.location.href= 'index.php' 
        </script>";
    } else {
        echo "<script>
            alert('Gagal');
            document.location.href= 'update.php?id=$id'
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

    <form method="POST" enctype="multipart/form-data">

        <table>
            <tr>
                <td>
                    <label for="judul">Judul</label>
                </td>
                <td> : </td>
                <td>
                    <input type="hidden" name="id" id="id" value="<?= $komik['id']; ?>" required>
                    <input type="hidden" name="gambar_lama" id="gambar_lama" value="<?= $komik['gambar']; ?>" required>
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
                    <label for="premis">Premis</label>
                </td>
                <td> : </td>
                </td>
                <td>
                    <textarea name="premis" id="premis"><?= $komik['premis']; ?></textarea>
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
        <img src="<?= $komik['gambar']; ?>" width="100" alt="Gambar">

        <br>
        <button type="submit" name="update">Update</button>

    </form>

    <!-- <div style="position: absolute; top:0; bottom:0; left: 0; right:0; background-color: black; color: red; text-align: center; font-size: 100px;">WKWKWKWKWK</div> -->
</body>

</html>