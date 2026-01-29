<?php
$koneksi = new mysqli("localhost", "root", "", "perpus-p4");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
