<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 7/24/19
 * Time: 12:05 PM
 */
ob_start(); //Turns on output buffering
session_start();

$timezone = date_default_timezone_set("Asia/Dhaka");

$con = mysqli_connect("localhost","root","","sociobuddy");

if (mysqli_connect_errno()){
    echo "Failed to connect: ".mysqli_connect_error();
}