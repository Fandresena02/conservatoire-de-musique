<?php
session_start();
session_destroy();
header("Location: ../controleur/index.php");
?>