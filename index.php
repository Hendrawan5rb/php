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
    ?>

    <a style="display: block;" href="create.php"><button>Create Project</button></a>

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

    $komik = read("SELECT * FROM komik");
    foreach ($komik as $k) :
    ?>

        <div style="width: 100px; height: 250px; border: 1px solid black; float: left; margin: 10px;">
            <a href="">
                <img src="https://picsum.photos/id/<?= $k['id']; ?>/100" alt="Cover">
                <p style="text-align: center;"><?= $k['judul']; ?></p>
            </a>
            <a href="delete.php?id=<?= $k['id']; ?>" onclick="return confirm('Hapus?')">
                <center><button type="submit">Hapus</button></center>
            </a>
        </div>

    <?php
    endforeach;
    ?>

</body>

</html>