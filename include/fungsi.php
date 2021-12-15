<?php

//koneksi database
$conn = mysqli_connect('localhost', 'root', '', 'skutrs_srs');
// if (!$conn) {
//     die("Koneksi gagal: " . mysqli_connect_error());
// }
// echo "Koneksi berhasil";
// mysqli_close($conn);

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function queryy($queryy)
{
    global $conn;
    $resultt = mysqli_query($conn, $queryy);
    $rowss = [];
    while ($roww = mysqli_fetch_assoc($resultt)) {
        $rowss[] = $roww;
    }
    return $rowss;
}

$year = date('Y');
$month = date('m');
