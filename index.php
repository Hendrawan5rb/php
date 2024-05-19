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
    require "connect.php";
    include "sidebar.php";

    if (isset($_POST['search'])) {
        $komik = search($_POST['keyword']);
    } else {
        $komik = read("SELECT * FROM komik ORDER BY id DESC");
    }
    ?>

    <a style="display: block;" href="create.php"><button>Create Project</button></a>

    <br>

    <form method="POST">
        <input type="text" name="keyword" id="keyword" autofocus>
        <button type="submit" name="search">Cari</button>
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

</body>

</html>