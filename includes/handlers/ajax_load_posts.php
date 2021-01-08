<?php
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 10/8/19
 * Time: 11:27 PM
 */
include ("../../config/config.php");
include ("../Classes/User.php");
include ("../Classes/Post.php");

$limit = 10;

$posts = new Post($con,$_REQUEST['userLoggedIn']);
$posts->loadPostsFriends($_REQUEST,$limit);
