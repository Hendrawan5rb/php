<?php
require "../connect.php";

if (!isset($_SESSION['login'])) {
    header("Location: /auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>

<body>
    <h1>Dashboard</h1>

    <?php
    include "../sidebar.php";

    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];

        $limit = 10;
        $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
        $offset = $limit * $page - $limit;

        $total_data = count(read("SELECT judul FROM komik WHERE judul LIKE '%$keyword%' OR ide LIKE '%$keyword%' OR premis LIKE '%$keyword%' ORDER BY id DESC"));

        $total_halaman = ceil($total_data / $limit);

        $komik = search($keyword, $limit, $offset);
    } else {

        $limit = 10;
        $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
        $offset = $limit * $page - $limit;

        $total_data = count(read("SELECT judul FROM komik"));

        $total_halaman = ceil($total_data / $limit);

        $komik = read("SELECT * FROM komik ORDER BY id DESC LIMIT $offset, $limit");
    }
    ?>

    <a style="display: block;" href="create.php"><button>Create Project</button></a>

    <br>

    <form method="GET" action="read.php">
        <input type="text" name="keyword" id="keyword" autofocus>
        <button type="submit">Cari</button>
    </form>

    <br>

    <?php
    // $result = mysqli_query($connect, "SELECT * FROM komik");

    // if (!$result) {
    //     echo mysqli_error($connect);
    // }

    // ---4 cara ambil data (fetch) dari object result---

    // mysqli_fetch_row mengembalikan array numerik
    // $row = mysqli_fetch_row($result);
    // var_dump($row[1]);

    // mysqli_fetch_array gabungan kedua di atas
    // tapi index jadi dobel sehingga kemungkinan berat
    // $array = mysqli_fetch_array($result);
    // var_dump($array[0]);
    // echo "<br>";
    // var_dump($array['judul']);

    // mysqli_fetch_object mengembalikan object
    // $object = mysqli_fetch_object($result);
    // var_dump($object->judul);

    // mysqli_fetch_assoc mengembalikan array asosiatif
    // $assoc = mysqli_fetch_assoc($result);
    // var_dump($assoc['id']);

    // while ($assoc = mysqli_fetch_assoc($result)) {
    //     var_dump($assoc);
    // }

    if ($komik == false) {
    ?>

        <p>Tidak ada data dalam database</p>

        <?php
    } else {
        foreach ($komik as $k) :
        ?>

            <div style="width: 100px; height: 275px; border: 1px solid black; float: left; margin: 10px;">
                <a href="">
                    <img src="<?= $k['gambar']; ?>" width="100" alt="Cover">
                    <p style="text-align: center;"><?= $k['judul']; ?></p>
                </a>
                <center>
                    <a href="update.php?id=<?= $k['id']; ?>">
                        <button>Ubah</button>
                    </a>
                    <br><br>
                    <a href="delete.php?id=<?= $k['id']; ?>&gambar=<?= $k['gambar']; ?>" onclick="return confirm('Hapus?')">
                        <button>Hapus</button>
                    </a>
                </center>
            </div>

    <?php
        endforeach;
    }
    ?>

    <div style="position: fixed; bottom: 0; text-align: center; width: 100%; left: 0;">

        <?php if ($page > 1) : ?>
            <a href="?keyword=<?= isset($keyword) ? $keyword : ""; ?>&page=<?= $page - 1; ?>"><button>&laquo;</button></a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
            <?php if ($i == $page) : ?>
                <a href="?keyword=<?= isset($keyword) ? $keyword : ""; ?>&page=<?= $i; ?>" style="color: red;"><button><?= $i; ?></button></a>
            <?php else : ?>
                <a href="?keyword=<?= isset($keyword) ? $keyword : ""; ?>&page=<?= $i; ?>"><button><?= $i; ?></button></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($page < $total_halaman) : ?>
            <a href="?keyword=<?= isset($keyword) ? $keyword : ""; ?>&page=<?= $page + 1; ?>"><button>&raquo;</button></a>
        <?php endif; ?>

    </div>

</body>

</html>