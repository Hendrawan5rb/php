<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Method</title>
</head>

<body>

    <h1>Selamat datang, <?= (isset($_GET['nama'])) ? $_GET['nama'] : "Admin"; ?></h1>
    <h2><?= (isset($_POST['jurusan'])) ? "Dari jurusan " . $_POST['jurusan'] : ""; ?></h2>

    <?php include "../sidebar.php"; ?>

    <?php
    $a = 7;

    function echoes()
    {
        global $a;
        return $a . " " . $a . " " . $a;
    }

    echo echoes() . "<br><br>";
    ?>

    <form method="POST">
        <input type="text" name="jurusan">
        <input type="submit" name="submit" value="Kirim">
    </form>
</body>

</html>