<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>

    <?php
    include "../sidebar.php";

    // ---Cara penulisan array gaya lama---
    $array = array('Satu', 2, false);

    // ---Cara penulisan array gaya baru---
    $array2 = ['Empat', 5, true];

    var_dump($array);
    echo "<br>";

    // ---Menampilkan array---
    print_r($array2);
    echo "<br>";
    echo $array[1] . "<br>";

    // ---Menambahkan element pada array---
    $array[] = "Element ke-4";
    var_dump($array);
    echo "<br>";
    foreach ($array as $arr) {
        echo "[" . $arr . "]";
    }
    echo "<br>";

    /* ---Menampilkan array dengan perulangan, array multi dimensi, dan array asosiatif---
    Karena contoh di atas adalah array numerik yang indeksnya harus berurutan */
    $multi = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];
    echo $multi[0][2] . "<br>";
    foreach ($multi as $mlt) {
        foreach ($mlt as $m) {
            echo "[" . $m . "]";
        }
    }
    echo "<br>";

    $ass = [
        [
            "nama" => "Andika",
            "jurusan" => "RPL"
        ],
        [
            "nama" => "Ilham",
            "jurusan" => "MM"
        ]
    ];
    echo $ass[0]['nama'] . "<br>";
    foreach ($ass as $as) {
        echo $as['nama'] . " " . $as['jurusan'] . " ";
    }
    ?>

</body>

</html>