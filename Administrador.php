<?php
session_start();
require 'app/php_conexion.php';
require 'app/Globals.php';
if (!$_SESSION['rol']) {
  header('location:error.php');
}
if ($_SESSION['rol'] == 'Administrador') {
  $titulo = 'Sistema de Facturacion';
} else {
  $titulo = 'Cajero/a';
}
$empresa = 'Fcentro';
require_once 'partials/header.php';
require_once 'partials/navbar.php';
require_once 'partials/themeSelector.php';
require_once 'partials/sidebar.php';
?>

<div class="main-panel">
  <iframe src="caja.php" class="px-2" frameborder="0" scrolling="auto" name="admin" width="100%" height="1000"></iframe>
  <?php
  require_once 'partials/footer.php';
  ?>