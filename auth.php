<?php


if (empty($_SESSION['userName'])){
    header("location:login.php");
}