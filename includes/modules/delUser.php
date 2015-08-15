<?php
 $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
  $user = new Users();
  $user->delUser($id);
  header('location:index.php?module=users'); exit();
