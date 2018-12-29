<?php 

if ($_SESSION['permisos_acceso']=='Super Usuario') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

  if ($_GET["module"]=="mod_clientes" || $_GET["module"]=="form_mod_clientes") { ?>
    <li class="active">
      <a href="?module=mod_clientes"><i class="fa fa-folder"></i> Datos de Clientes </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=mod_clientes"><i class="fa fa-folder"></i> Datos de Clientes </a>
      </li>
  <?php
  }

if ($_GET["module"]=="mod_empleados" || $_GET["module"]=="form_mod_empleados") { ?>
    <li class="active">
      <a href="?module=mod_empleados"><i class="fa fa-folder"></i> Datos de Empleados </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=mod_empleados"><i class="fa fa-folder"></i> Datos de Empleados </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="mod_citas" || $_GET["module"]=="form_mod_citas") { ?>
    <li class="active">
      <a href="?module=mod_citas"><i class="fa fa-folder"></i> Datos de Citas </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=mod_citas"><i class="fa fa-folder"></i> Datos de Citas </a>
      </li>
  <?php
  }

	if ($_GET["module"]=="reporte_2") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes </a></li>
        		<li><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="stock_reporte") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes </a></li>
        		<li class="active"><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes </a></li>
        		<li><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
      		</ul>
    	</li>
    <?php
	}


	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}


	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

elseif ($_SESSION['permisos_acceso']=='Empleado') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { ?>
		<li class="active">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	}


  if ($_GET["module"]=="reporte_2") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes</a></li>
            <li><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="stock_reporte") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes </a></li>
            <li class="active"><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_2"><i class="fa fa-circle-o"></i>  Reporte de Clientes </a></li>
            <li><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
if ($_SESSION['permisos_acceso']=='Gerente') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

  if ($_GET["module"]=="start") { ?>
    <li class="active">
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="mod_clientes" || $_GET["module"]=="form_mod_clientes") { ?>
    <li class="active">
      <a href="?module=mod_clientes"><i class="fa fa-folder"></i> Datos de Clientes </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=mod_clientes"><i class="fa fa-folder"></i> Datos de Clientes </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="mod_empleados" || $_GET["module"]=="form_mod_empleados") { ?>
    <li class="active">
      <a href="?module=mod_empleados"><i class="fa fa-folder"></i> Datos de Empleados </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=mod_empleados"><i class="fa fa-folder"></i> Datos de Empleados </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="mod_citas" || $_GET["module"]=="form_mod_citas") { ?>
    <li class="active">
      <a href="?module=mod_citas"><i class="fa fa-folder"></i> Datos de Citas </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=mod_citas"><i class="fa fa-folder"></i> Datos de Citas </a>
      </li>
  <?php
  }


  if ($_GET["module"]=="transaccion_medicinas" || $_GET["module"]=="form_transaccion_medicinas") { ?>
    <li class="active">
      <a href="?module=transaccion_medicinas"><i class="fa fa-clone"></i> Proto Citas </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=transaccion_medicinas"><i class="fa fa-clone"></i> Proto Citas </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="reporte_2") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes </a></li>
            <li><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
          </ul>
      </li>
    <?php
  }
  elseif ($_GET["module"]=="stock_reporte") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes </a></li>
            <li class="active"><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
          </ul>
      </li>
    <?php
  }
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=reporte_2"><i class="fa fa-circle-o"></i> Reporte de Clientes </a></li>
            <li><a href="?module=stock_reporte"><i class="fa fa-circle-o"></i> Reporte de Citas </a></li>
          </ul>
      </li>
    <?php
  }

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
?>