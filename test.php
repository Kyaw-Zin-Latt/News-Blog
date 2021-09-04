<?php

$rows = file_get_contents("http://localhost:8080/api/post.php/?id=2");

echo $rows;
