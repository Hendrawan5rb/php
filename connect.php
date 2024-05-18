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

    return $rows;
}

function create($data)
{
    global $connect;

    $judul = htmlspecialchars($data['judul']);
    $ide = htmlspecialchars($data['ide']);
    $premis = htmlspecialchars($data['premis']);
    $gambar = htmlspecialchars("https://picsum.photos/id/" . rand(1, 100) . "/100");

    $query = "INSERT INTO komik (judul, ide, premis, gambar) VALUES ('$judul', '$ide', '$premis', '$gambar');";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function update($data)
{
    global $connect;

    $id = htmlspecialchars($data['id']);
    $judul = htmlspecialchars($data['judul']);
    $ide = htmlspecialchars($data['ide']);
    $premis = htmlspecialchars($data['premis']);
    $gambar = htmlspecialchars("https://picsum.photos/id/" . rand(1, 100) . "/100");

    $query = "UPDATE komik SET judul = '$judul', ide = '$ide', premis = '$premis', gambar = '$gambar' WHERE id = $id;";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}

function delete($id)
{
    global $connect;

    $query = "DELETE FROM komik WHERE id = $id";
    mysqli_query($connect, $query);

    return mysqli_affected_rows($connect);
}
