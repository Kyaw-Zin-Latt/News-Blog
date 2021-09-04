<?php
header("Content-Type: application/json; charset=UTF-8");

require_once "../base.php";
require_once "../function.php";

$sql = "SELECT * FROM posts WHERE 1";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql .= " AND id = $id";
}

if (isset($_GET['limit'])) {
    $limit = textFilter($_GET['limit']);
    $sql .= " LIMIT $limit";
}


$rows = [];
$query = mysqli_query(conn(), $sql);
while ($row = mysqli_fetch_object($query)) {
    array_push($rows, $row);
}

print_r(apiOut($rows));
