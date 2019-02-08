<?php
	include("../funciones.php");
	
	function comprobacionNombres($conexionMySQL,$nombre,$contrasena){
		$respuesta=mysqli_query($conexionMySQL,"select employees.emp_no,employees.first_name,employees.last_name,titles.title from employees,titles where employees.emp_no=titles.emp_no and employees.first_name='".$nombre."' and employees.last_name='".$contrasena."' and titles.to_date='9999-01-01';");
		
		if(mysqli_num_rows($respuesta)>0){
			$respuesta=mysqli_fetch_assoc($respuesta);			
			guardarSesion($respuesta['first_name'],$respuesta['emp_no']);
			if($respuesta['title']=='Manager'){				
				header("Location:Opciones_Manager.php");
			}else{
				header("Location:Opciones_Empleado.php");
			}			
		}else{
			trigger_error("Te has equivocado en algo amigo");
			die();
		}
	}	
	
	
	//Inicio
	$nombre=trim($_REQUEST['nombre']);
	$contrasena=trim($_REQUEST['contrasena']);
		
	//Iniciamos la Conexion MySQL
	$conexionMySQL=iniciarConexion();

	//Validamos las Contraseñas
	comprobacionNombres($conexionMySQL,$nombre,$contrasena);	
	
	//Cerramos la Conexion MySQL	
	cierreConexion($conexionMySQL);
	
?>