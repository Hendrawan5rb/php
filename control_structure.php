<?php

/* Perulangan for terdiri dari 3 bagian.
1. Inisialisasi (Menentukan variabel awal untuk pengulangan. Biasanya $i, index.)
2. Kondisi Terminasi (Kondisi untuk memberhentikan perulangannya.)
3. Increment/Decrement (Perulangan maju atau mundur.) */

for ($i = 0; $i < 9; $i++) {
    echo "Anpan! ";
}

$w = 0;
while ($w < 7) {
    echo "Anpan! ";
    $w++;
}

$a = 0;
do {
    echo "Anpan! ";
    $a++;
} while ($a <= 4);

echo "<br><br>";

if (true == true) {
    echo "If";
}

echo "<br>";

if (true == true) {
    echo "If Else True";
} else {
    echo "If Else False";
}

echo "<br>";

$tes = -3;
if ($tes < 10) {
    echo "Kurang dari 10";
} elseif ($tes == 10) {
    echo "10";
} else {
    echo "Lebih dari 10";
}

echo "<br>";

$tes2 = 4;
switch ($tes2) {
    case 1:
        echo "1";
        break;
    case 2:
        echo "2";
        break;
    case 3:
        echo "3";
        break;
    default:
        echo "IDK";
        break;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <br><br>
    <table border="1">
        <?php for ($baris = 1; $baris <= 9; $baris++) : ?>
            <tr>
                <?php for ($kolom = 1; $kolom <= 7; $kolom++) : ?>
                    <td>
                        <?= ($kolom % 2 == 0) ? "$baris, $kolom" : "Kolom Ganjil"; ?>
                    </td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>