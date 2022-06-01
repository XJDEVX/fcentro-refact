<?php
if (strlen(session_id()) < 1) {
	session_start();
}
require_once('app/php_conexion.php');
$usu = $_SESSION['username'];
$tipo_usu = $_SESSION['rol'];
if ($_SESSION['rol'] !== 'Administrador') {
	header('location:error.php');
}
require_once('partials/header.php'); ?>
<body data-spy="scroll" data-target=".bs-docs-sidebar">
	<div class="container-fluid my-4">
		<div class="row">
			<div class="col-sm-12 d-md-flex align-items-center">
				<h1 class="text-left"><span class="fa fa-bar-chart"></span> Reportes</h1>
				<h5 class="ml-md-2"><i class="fa fa-truck"></i> Nuevo Reporte de Compras</h5>
			</div>
			<div class="col-md-7">
				<form class="form-horizontal mt-4" action="crear_report_compra.php" method="post" id="getOrderReportForm">
					<div class="form-group ml-2">
						<label>Nombre del Proveedor </label>
						<select class="form-control mySelect" name="empresa" id="empresa">
							<?php
							$empresa = $_POST['empresa'];
							$can = querySimple("SELECT * FROM proveedor where estado='s'");
							while ($dato = mysqli_fetch_array($can)) {
							?>
								<option value="<?php echo $dato['empresa']; ?>" <?php if ($empresa == $dato['empresa']) {
									echo 'selected';
								} ?>><?php echo $dato['empresa']; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group mt-3">
						<label for="startDate" class="col-sm-3 control-label">Fecha de Inicio</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="startDate" name="startDate" placeholder="Click aqui para agregar una fecha" />
						</div>
					</div>
					<div class="form-group">
						<label for="endDate" class="col-sm-3 control-label">Fecha Final</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" autocomplete="off" id="endDate" name="endDate" placeholder="Click aqui para agregar una fecha" />
						</div>
					</div><br />
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-10">
							<button type="submit" class="btn btn-success button1" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generar Reporte</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
require_once('partials/feet.php');
require_once('partials/footer.php');
?>
<script src="reportCompra.js"></script>