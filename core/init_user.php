<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: /rapor-ukk/auth/login.php");
}