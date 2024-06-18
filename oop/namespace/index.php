<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/img/app/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/img/app/favicon-16x16.png" sizes="16x16" />
    <link rel="stylesheet" href="/css/style.css">
    <title>Namespace</title>
</head>

<body>

    <?php include '../../sidebar.php' ?>

    <div class="main">

        <h1>Namespace</h1>
        <hr>

        <?php
        /*
        Namespace = Encapsulation

        Namespace adalah sebuah cara untuk mengelompokkan program ke dalam package tersendiri / identitas tersendiri

        WHY!?
        Karena PHP tidak memperbolehkan 2 Class dengan nama yang sama. Terutama di project besar, dengan tim yang besar, dan menggunakan banyak package orang lain.

        Usulan Penulisan Namespace

        namespace Vendor\Namespace\SubNamespace

        Vendor berisi nama pembuat atau nama aplikasinya
        */

        require_once "App/init.php";

        // Alias 
        use App\Produk\User;
        use App\Service\User as ServiceUser;

        new User();

        echo "<br>";

        new ServiceUser();
        ?>

    </div>

</body>

</html>