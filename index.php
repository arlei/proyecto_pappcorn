<!DOCTYPE html>
<html>
<head>
	<!-- bootstrap css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css" media="all">

    <!-- js -->
    <script src="js/jquery.min1_12_4.js"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap-modal-carousel.min.js"></script>
    <script src="js/papp.js"></script>

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="css/estilo.css" media="all">

	<title>Prueba PappCorn</title>
</head>
<body onload="consultar_clientes();">
	<h1 class="text-center">BANCO PAPP</h1>
	<h3 class="text-center">administrador</h3>

	<div class="nopadding_lados text-center">
		<button class="btn_menu_cte" onClick="consultar_clientes();">clientes</button>
		<button class="btn_menu_cta" onClick="consultar_cuentas();">cuentas</button>
		<button class="btn_menu_trs" data-toggle="modal" data-target="#modal_transaccion" onClick="cargar_transaccion();">transacción +</button>
	</div>

	<main id="contenido_principal" class="text-center">
		
	</main>

	
	<!-- Crear cliente -->
	<div class="modal fade" id="modal_cliente" role="dialog">
		<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content form_cte">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">cliente nuevo</h4>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" id="cte_nombre" placeholder="Nombre" name="cte_nombre">
					<div class="control col-lg-12"><div id="valida_cte_nombre" class="registro_valida"></div></div>
					<input type="text" class="form-control" id="cte_documento" placeholder="Documento" name="cte_documento">
					<div class="control col-lg-12"><div id="valida_cte_documento" class="registro_valida"></div></div>
					<input type="text" class="form-control" id="cte_direccion" placeholder="Dirección" name="cte_direccion">
					<div class="control col-lg-12"><div id="valida_cte_direccion" class="registro_valida"></div></div>
					<input type="date" class="form-control" id="cte_fecha_nacimiento" placeholder="Fecha de nacimiento" name="cte_fecha_nacimiento">
					<div class="control col-lg-12"><div id="valida_cte_fecha_nacimiento" class="registro_valida"></div></div>

					<div id="valida_cte"></div>

				</div>
				<div class="modal-footer">
					<button id="btn_crear_cte" type="button" class="col-lg-12 btn_crear_cte nopadding_lados" onClick="crear_cliente();">
						Crear
					</button>
				</div>
			</div>
		</div>
	</div>
	<!--fin crear cliente -->

	
	<!-- Asignar cuenta -->
	<div class="modal fade" id="modal_cuenta" role="dialog">
		<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content form_cta">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">asignar cuenta</h4>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" id="cta_id_cte" placeholder="Nombre" name="cta_id_cte" disabled="disabled">
					<input type="text" class="form-control" id="cta_nombre_cte" placeholder="Nombre" name="cta_nombre_cte" disabled="disabled">
					<select class="form-control" id="cta_tipo_cuenta" name="cta_tipo_cuenta">
				        <option value="1">Cuenta de ahorros</option>
				        <option value="2">Cuenta corriente</option>
				     </select>
					<div id="valida_cta"></div>
				</div>
				<div class="modal-footer">
					<button id="btn_crear_cta" type="button" class="col-lg-12 btn_crear_cta nopadding_lados" onClick="asignar_cuenta();">
						Aceptar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!--fin asignar cuenta -->

	<!-- Asignar tarjeta -->
	<div class="modal fade" id="modal_tarjeta" role="dialog">
		<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content form_tja">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">asignar tarjeta</h4>
				</div>
				<div class="modal-body">
					<input type="text" class="form-control" id="tja_id_cta" placeholder="Nombre" name="cta_id_cte" disabled="disabled">
					<div id="valida_tja"></div>
				</div>
				<div class="modal-footer">
					<button id="btn_crear_tja" type="button" class="col-lg-12 btn_crear_tja nopadding_lados" onClick="asignar_tarjeta();">
						Aceptar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!--fin asignar cuenta -->


	<!-- Realizar transacción -->
	<div class="modal fade" id="modal_transaccion" role="dialog">
		<div class="modal-dialog modal-sm">
			<!-- Modal content-->
			<div class="modal-content form_trs">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">transacción</h4>
				</div>
				<div class="modal-body">
					<select class="form-control" id="trs_cuenta_1" name="trs_cuenta_1">
				     </select>

					<select class="form-control" id="trs_tipo" name="trs_tipo" onchange="sel_transaccion()">
				        <option value="1">Transferencia</option>
				        <option value="2">Consignación</option>
				        <option value="3">Retiro</option>
				     </select>

				     <select class="form-control" id="trs_cuenta_2" name="trs_cuenta_2">
				     </select>

				    <input type="text" class="form-control" id="trs_monto" placeholder="$ Monto" name="trs_monto">
					<div class="control col-lg-12"><div id="valida_trs_monto" class="registro_valida"></div></div>

					<div id="valida_trs"></div>
				</div>
				<div class="modal-footer">
					<button id="btn_realizar_trs" type="button" class="col-lg-12 btn_realizar_trs nopadding_lados" onClick="realizar_transaccion();">
						Aceptar
					</button>
				</div>
			</div>
		</div>
	</div>
	<!--fin realizar transacción -->


</body>
</html>