<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 10/6/19
 * Time: 10:09 PM
 */
session_start();
session_destroy();
header("Location: ../../register.php");