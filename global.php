<?php
require_once "pdo.php";
ob_start();
session_start();
//định nghĩa URL
$ROOT_URL = "/du-an-1-nhom7";
$SITE_URL = "$ROOT_URL/site";
$ADMIN_URL = "$ROOT_URL/admin";

// đường dẫn ảnh
$IMAGE = "$ROOT_URL/public/img";

//đường dẫn css
$STYLE ="$ROOT_URL/public/css";

//đường dẫn js
$JS_URL = "$ROOT_URL/public/js";
?>