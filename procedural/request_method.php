<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Request Method</title>
</head>

<body>

    <?php
    include "../sidebar.php";
    ?>

    <div class="main">

        <h1>Request Method</h1>
        <hr>

        <h3>Selamat datang, <?= (isset($_GET['nama'])) ? $_GET['nama'] : "Admin"; ?></h3>
        <h4><?= (isset($_POST['jurusan'])) ? "Dari jurusan " . $_POST['jurusan'] : ""; ?></h4>

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

    </div>

</body>

</html>