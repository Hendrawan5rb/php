<?php
session_start();

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

    $query = "INSERT INTO komik (judul, ide, premis, gambar) VALUES ('$judul', '$ide', '$premis', '$gambar')";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function upload($gambar_lama = "")
{
    $nama_file = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tmp = $_FILES['gambar']['tmp_name'];
    // $ext_file = strtolower($_FILES['gambar']['type']);
    // $error = $_FILES['gambar']['error'];

    // if ($error === 4) {
    //     echo "<script>alert('Pilih gambar terlebih dahulu')</script>";
    //     return false;
    // }

    // ---Masih bisa di bypass juga---
    // $ext = ['image/jpg', 'image/jpeg', 'image/png'];
    // if (!in_array($ext_file, $ext)) {
    //     echo "<script>alert('Yang anda upload bukan gambar')</script>";
    // }

    // ---Masih bisa di bypass---
    $ext = ['jpg', 'jpeg', 'png'];
    $extension = explode(".", $nama_file);
    $extension = strtolower(end($extension));
    if (!in_array($extension, $ext)) {
        echo "<script>alert('Yang anda upload bukan gambar')</script>";
        return false;
    }

    if ($ukuran_file > 1048576) {
        echo "<script>alert('Ukuran gambar terlalu besar')</script>";
        return false;
    }

    $nama_file_baru = uniqid();
    $nama_file_baru .= ".";
    $nama_file_baru .= $extension;

    move_uploaded_file($tmp, '../img/' . $nama_file_baru);
    unlink($gambar_lama);

    return "../img/" . $nama_file_baru;
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

function register($data)
{
    global $connect;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($connect, $data['password']);
    $confirm = mysqli_real_escape_string($connect, $data['confirm']);

    $result = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar. Mohon buat username lain.')</script>";
        return false;
    }

    if ($password !== $confirm) {
        echo "<script>alert('Password dan Konfirmasi Password tidak sama')</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connect, "INSERT INTO users (username, password) VALUES ('$username', '$password')");

    $_SESSION['login'] = true;

    return mysqli_affected_rows($connect);
}

function login($data)
{
    global $connect;

    $username = $data['username'];
    $password = $data['password'];

    $result = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {

            if (isset($data['remember'])) {
                setcookie('identifier', $row['id'], time() + 60 * 60 * 24 * 30, '/');
                setcookie('login', hash('sha256', $row['username']), time() + 60, '/');
            }

            $_SESSION['login'] = true;

            header("Location: /CRUD/read.php");
            exit;
        }
    }

    return false;
}
