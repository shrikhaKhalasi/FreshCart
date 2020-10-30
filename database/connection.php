<?php

$conn = new mysqli('localhost', 'root', '', 'fresh_cart');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// function abs_url($path){
//     return "http://localhost:8080/project/FreshCart/".$path;
// }
