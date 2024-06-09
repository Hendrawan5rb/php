<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Class and Object</title>
</head>

<body>

    <?php include '../sidebar.php' ?>

    <div class="main">

        <h1>Class and Object</h1>
        <hr>

        <?php
        class Komik
        {
        }

        $test = new Komik();
        $test2 = new Komik();
        $test3 = new Komik();

        var_dump($test);
        var_dump($test2);
        var_dump($test3);
        ?>

    </div>

</body>

</html>