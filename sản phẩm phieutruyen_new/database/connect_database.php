<?php
define('HOST', 'localhost');
define('USENAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'comic_online');
//define('DATABASE', 'COMIC_ONLINE');
//define('DATABASE', 'webtruyen');

date_default_timezone_set('asia/ho_chi_minh');

$connect = mysqli_connect(HOST, USENAME, PASSWORD, DATABASE);

if(!$connect) {
    die("<br>" . "KẾT NỐI DATABASE THẤT BẠI. ");
} else {
    mysqli_close($connect);
}



function EXECUTE($sql_query) {
    $connect = mysqli_connect(HOST, USENAME, PASSWORD, DATABASE);
    mysqli_query($connect, $sql_query);
    mysqli_close($connect);
}

function EXECUTE_RESULT($sql_query) {
    $connect = mysqli_connect(HOST, USENAME, PASSWORD, DATABASE);
    
    $result = mysqli_query($connect, $sql_query);
    $data = [];
    //if($result == false) return $data;
    while ($row = mysqli_fetch_array($result, 1)) {
        $data[] = $row;
    }
    mysqli_close($connect);
    return $data;
}

