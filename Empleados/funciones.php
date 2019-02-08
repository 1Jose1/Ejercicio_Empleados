<?php
	// set_error_handler("errores");
	
	//Errores
	function errores($error_level,$error_message){
			echo "<div style='border:6px double red;width:60%;margin:5% 20% 5% 20%;'>Codigo: ".$error_level." /",$error_message."</div>";
			echo '<center><a href="../index.html">Atras</a></center>';
			die();			
	}

	// Iniciar Conexion con la Base de Datos
	function iniciarConexion(){		
		// Parametros para la Base de Datos
		$servername="localhost";
		$usuario="root";
		$contrasena="rootroot";
		$baseDatos="employees";
		
		$conexionMySQL=mysqli_connect($servername,$usuario,$contrasena,$baseDatos);		
		return $conexionMySQL;
	}
	
	
	// Cierre Conexion con la Base de Datos
	function cierreConexion($conexionMySQL){
		mysqli_close($conexionMySQL);
	}
	
	//Guardamos Variables de Sesion
	function guardarSesion($nombre,$id){
		session_start();
		$_SESSION['nombre']=$nombre;
		$_SESSION['id']=$id;
	}
	
	//Destruimos la Sesion
	function destruirSesion(){
		session_destroy();
	}
	
	function comprobarExistenciaEmpleado($conexionMySQL,$id_empleado){
		$respuesta=mysqli_query($conexionMySQL,"select * from employees where emp_no=$id_empleado;");
		
		if(mysqli_num_rows($respuesta)==0){
			trigger_error("No existe el Empleado");
			die();
		}
	}