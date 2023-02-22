<?php

session_start();
if (!isset($_SESSION['login_admin'])) {
    header("Location: /rapor-ukk/auth/login_pa.php");
}