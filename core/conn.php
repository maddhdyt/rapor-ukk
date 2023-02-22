<?php
$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_rapor';

$koneksi = mysqli_connect($host, $username, $password, $db) or die(mysqli_error($koneksi));