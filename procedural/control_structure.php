<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Control Structure</title>
</head>

<body>

    <?php
    include "../sidebar.php";
    ?>

    <div class="main">

        <h1>Control Structure</h1>
        <hr>

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

    </div>

</body>

</html>