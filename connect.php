<?php
// Memakai mysqli
$connect = mysqli_connect("localhost", "root", "", "php");

function query($query)
{
    global $connect;

    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
