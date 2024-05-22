<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Basics</title>
</head>

<body>
    <h1>Selamat datang, <?php echo "Zee" ?></h1>

    <?php
    include "../sidebar.php";

    // Komentar satu baris

    /* Komentar multi
    baris */

    $variabel1  = "Katana";
    $nama_variabel = 1;
    $namaVariabel = 2;

    $x = 9;
    $x = 10;
    $y = "10";

    // ---Operator penggabungan string dinamakan Concatenation / Concat---
    echo "x (Integer) : " . $x . "<br>";
    echo "y (String) : " . $y . "<br><br>";

    echo "x + y : " . $x + $y . "<br>";
    echo "x - y : " . $x - $y . "<br>";
    echo "x * y : " . $x * $y . "<br>";
    echo "x / y : " . $x / $y . "<br>";

    // Operator Modulus (Sisa Bagi
    echo "x % y : " . $x % $y . "<br><br>";

    // ---Operator Perbandingan---
    echo "x < y : ";
    var_dump($x < $y);
    echo "<br>";

    echo "x > y : ";
    var_dump($x > $y);
    echo "<br>";

    echo "x <= y : ";
    var_dump($x <= $y);
    echo "<br>";

    echo "x >= y : ";
    var_dump($x >= $y);
    echo "<br>";

    echo "x == y : ";
    var_dump($x == $y);
    echo "<br>";

    echo "x != y : ";
    var_dump($x != $y);
    echo "<br><br>";

    // ---Operator Identitas---
    echo "x === y : ";
    var_dump($x === $y);
    echo "<br>";

    echo "x !== y : ";
    var_dump($x !== $y);
    echo "<br><br>";

    // --- Operator Logika
    echo "true && false : ";
    var_dump(true && false);
    var_dump(true and false);
    echo "<br>";

    echo "true || false : ";
    var_dump(true || false);
    var_dump(true or false);
    echo "<br>";

    echo "!true : ";
    var_dump(!true);
    echo "<br>";

    echo "!false : ";
    var_dump(!false);
    echo "<br><br>";

    // ---Operator Assignment---
    $x += 5;
    echo "x += 5 : " . $x . "<br>";
    $x -= 5;
    echo "x -= 5 : " . $x . "<br>";
    $x *= 5;
    echo "x *= 5 : " . $x . "<br>";
    $x /= 5;
    echo "x /= 5 : " . $x . "<br>";
    $x %= 5;
    echo "x %= 5 : " . $x . "<br>";
    $x .= 5;
    echo "x .= 5 : " . $x . "<br><br>";

    echo "echo : " . "$variabel1 Jum'at" . "<br>";
    echo "echo : " . '$variable1 Hello Zawarudo' . "<br>";
    echo "echo : " . 123 . "<br>";
    echo "echo (true) : " . true . "<br>";
    echo "echo (fasle) : " . false . "<br><br>";

    print "print : " .  "Hello Zawarudo" . "<br>";
    print_r("print_r : " . "Hello Zawarudo" . "<br><br>");
    var_dump("var_dump  : " . "Hello Zawarudo");
    ?>

</body>

</html>