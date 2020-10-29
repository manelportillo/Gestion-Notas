<?php
require_once 'administrador.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location:index.php');
}