<?php
// Memakai mysqli
$connect = mysqli_connect("localhost", "root", "", "php");

function read($query)
{
    global $connect;

    $result = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    if (!isset($rows)) {
        return false;
    } else {
        return $rows;
    }
}

function search($keyword)
{
    $query = "SELECT * FROM komik WHERE judul LIKE '%$keyword%' OR ide LIKE '%$keyword%' OR premis LIKE '%$keyword%' ORDER BY id DESC";

    return read($query);
}

function create($data)
{
    global $connect;

    $judul = htmlspecialchars($data['judul']);
    $ide = htmlspecialchars($data['ide']);
    $premis = htmlspecialchars($data['premis']);

    if (!is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $gambar = htmlspecialchars("https://picsum.photos/id/" . rand(1, 100) . "/100");
    } else {
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }

    $query = "INSERT INTO komik (judul, ide, premis, gambar) VALUES ('$judul', '$ide', '$premis', '$gambar');";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function upload($gambar_lama = "")
{
    $nama_file = $_FILES['gambar']['name'];
    // $ext_file = strtolower($_FILES['gambar']['type']);
    $ukuran_file = $_FILES['gambar']['size'];
    // $error = $_FILES['gambar']['error'];
    $tmp = $_FILES['gambar']['tmp_name'];

    // if ($error === 4) {
    //     echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
    //     return false;
    // }

    // ---Masih bisa di bypass---
    $ext = ['jpg', 'jpeg', 'png'];
    $extension = explode(".", $nama_file);
    $extension = strtolower(end($extension));
    if (!in_array($extension, $ext)) {
        echo "<script>alert('Yang anda upload bukan gambar')</script>";
        return false;
    }

    // ---Masih bisa di bypass juga---
    // $ext = ['image/jpg', 'image/jpeg', 'image/png'];
    // if (!in_array($ext_file, $ext)) {
    //     echo "<script>alert('Yang anda upload bukan gambar')</script>";
    // }

    if ($ukuran_file > 1048576) {
        echo "<script>alert('Ukuran gambar terlalu besar')</script>";
        return false;
    }

    $nama_file_baru = uniqid();
    $nama_file_baru .= ".";
    $nama_file_baru .= $extension;

    move_uploaded_file($tmp, 'img/' . $nama_file_baru);
    unlink($gambar_lama);

    return "img/" . $nama_file_baru;
}

function update($data)
{
    global $connect;

    $id = htmlspecialchars($data['id']);
    $judul = htmlspecialchars($data['judul']);
    $ide = htmlspecialchars($data['ide']);
    $premis = htmlspecialchars($data['premis']);

    if (!is_uploaded_file($_FILES['gambar']['tmp_name'])) {
        $gambar = htmlspecialchars($data['gambar_lama']);
    } else {
        $gambar = upload($data['gambar_lama']);
        if (!$gambar) {
            return false;
        }
    }

    $query = "UPDATE komik SET judul = '$judul', ide = '$ide', premis = '$premis', gambar = '$gambar' WHERE id = $id";
    mysqli_query($connect, $query);

    return mysqli_error($connect);
}

function delete($id, $gambar)
{
    global $connect;

    $query = "DELETE FROM komik WHERE id = $id";
    mysqli_query($connect, $query);
    if (mysqli_affected_rows($connect) > 0) {
        unlink($gambar);
    }

    return mysqli_affected_rows($connect);
}
