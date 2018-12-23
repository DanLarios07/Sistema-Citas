<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modulos/start/view.php";
	}

	elseif ($_GET['module'] == 'mod_clientes') {
		include "modulos/mod_clientes/view.php";
	}

	elseif ($_GET['module'] == 'form_mod_clientes') {
		include "modulos/mod_clientes/form.php";
	}
	
	elseif ($_GET['module'] == 'mod_empleados') {
		include "modulos/mod_empleados/view.php";
	}

	elseif ($_GET['module'] == 'form_mod_empleados') {
		include "modulos/mod_empleados/form.php";
	}

	elseif ($_GET['module'] == 'mod_citas') {
		include "modulos/mod_citas/view.php";
	}

	elseif ($_GET['module'] == 'form_mod_citas') {
		include "modulos/mod_citas/form.php";
	}

	elseif ($_GET['module'] == 'reporte_2') {
		include "modulos/reporte_2/view.php";
	}

	elseif ($_GET['module'] == 'stock_reporte') {
		include "modulos/stock_reporte/view.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modulos/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modulos/user/form.php";
	}

	elseif ($_GET['module'] == 'perfil') {
		include "modulos/perfil/view.php";
		}


	elseif ($_GET['module'] == 'form_perfil') {
		include "modulos/perfil/form.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modulos/password/view.php";
	}
}
?>