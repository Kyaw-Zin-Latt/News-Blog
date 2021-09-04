<?php
session_start();
function conn() {
    return mysqli_connect("localhost","root","","blogs");
}


$url = "http://".$_SERVER['HTTP_HOST'];
$role = ["Admin", "Editor", "User"];