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
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Database</title>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }

        .card {
            width: 100px;
            height: 275px;
            border: 1px solid black;
            float: left;
            margin: 10px;
        }
    </style>
</head>

<body>

    <?php
    include "../sidebar.php";

    if (isset($_GET['keyword']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];

        $limit = 16;
        $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
        $offset = $limit * $page - $limit;

        $total_data = count(read("SELECT judul FROM komik WHERE judul LIKE '%$keyword%' OR ide LIKE '%$keyword%' OR premis LIKE '%$keyword%' ORDER BY id DESC"));

        $total_halaman = ceil($total_data / $limit);

        $komik = search($keyword, $limit, $offset);
    } else {

        $limit = 16;
        $page = (!isset($_GET['page'])) ? 1 : $_GET['page'];
        $offset = $limit * $page - $limit;

        $total_data = count(read("SELECT judul FROM komik"));

        $total_halaman = ceil($total_data / $limit);

        $komik = read("SELECT * FROM komik ORDER BY id DESC LIMIT $offset, $limit");
    }
    ?>

    <div class="main">

        <h1 class="no-print">CRUD</h1>
        <hr class="no-print">

        <br>

        <div>
            <a href="create.php"><button class="no-print">Create Project</button></a>
            <button onclick="window.print(); return false;" class="no-print">Print</button>
            <a href="/oop/mpdf.php" target="_blank"><button class="no-print">Print mPDF</button></a>
        </div>

        <br>

        <form method=" GET" action="read.php" class="no-print">
            <input type="text" name="keyword" id="keyword" placeholder="Search" autofocus>
            <!-- <button type="submit" id="submit">Cari</button> -->
        </form>

        <br>

        <div id="container">

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

                <p>Data tidak ditemukan</p>

                <?php
            } else {
                foreach ($komik as $k) :
                ?>

                    <div class="card">
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

            <input type="hidden" id="total" value="<?= $total_halaman; ?>">

            <div style="position: fixed; bottom: 0; text-align: center; width: 100%; left: 100px;" class="no-print">

                <a href="#" id="previous"><button>&laquo;</button></a>

                <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <?php if ($i == $page) : ?>
                        <a href="#" class="page" page="<?= $i; ?>"><button><?= $i; ?></button></a>
                    <?php else : ?>
                        <a href="#" class="page" page="<?= $i; ?>"><button><?= $i; ?></button></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <a href="#" id="next"><button>&raquo;</button></a>

            </div>

        </div>

    </div>

    <script src="/js/jquery-3.7.1.min.js"></script>
    <script src="/js/jquery.js"></script>

</body>

</html>