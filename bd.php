<?php 
session_start();

if (strstr(("HTTP_HOST"), "51.178.86.117")){

    $name = "blog";
    $username = "denys";
    $password = "oem9Fi_j";
}else{
    $username = "root";
    $password = "";
}