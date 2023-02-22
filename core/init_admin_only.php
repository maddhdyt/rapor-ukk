<?php 

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: /rapor-ukk/auth/login_pa.php");
} else if ($_SESSION['level'] == 'petugas') {
    header("Location: dashboard.php");
}