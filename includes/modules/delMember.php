<?php
$id = $_GET['id'];
$member = new Members();
$member->delMember($id);
header('location:index.php?module=members'); exit();