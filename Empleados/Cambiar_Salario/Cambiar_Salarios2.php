<?php
	include('../funciones.php');
	
	function cambiarDepartamento($conexionMySQL,$id_empleado,$departamento){
		$respuesta=mysqli_query($conexionMySQL,';');
		
		echo "<br><center><a href='Historial_Departamentos_Manager1.php'>Volver..</a></center>";
	}
	
	function cambiarSalario($conexionMySQL,$id_empleado,$salario){
		$respuesta=mysqli_query($conexionMySQL,'select emp_no,salary,from_date,to_date from salaries where emp_no="$id_empleado";');
		$fila=mysqli_fetch_assoc($respuesta);				
		if($fila['from_date']!=curdate()){
			
				$actualizar=actualizarSalario($conexionMySQL,$id_empleado);				
				$anadir=anadirSalario($conexionMySQL,$id_empleado,$salario);						
				mysqli_commit($conexionMySQL);
			echo "<center><a href='Cambiar_Salarios1.php'>Volver</a></center>";	
		}else{
			trigger_error("No puedes Cambiar En el mismo dia de departamento");
			die();
		}
			
	}
	
	function actualizarSalario($conexionMySQL,$id_empleado){
		$respuesta=mysqli_query($conexionMySQL,"update salaries set to_date = '".curdate()."' where to_date='9999-01-01' and emp_no=$id_empleado;");
		echo "Actualizado Correctamente<br>";
		return $respuesta;
	}
	
	function anadirSalario($conexionMySQL,$id_empleado,$salario){			
		$respuesta=mysqli_query($conexionMySQL,"insert into salaries (emp_no,salary,from_date,to_date) values ($id_empleado,$salario,CURDATE(),'9999-01-01')");
		echo "Añadido Correctamente<br>";
		return $respuesta;
	}
	
	function curdate() {
		return date('Y-m-d');
	}

	$id_empleado=$_REQUEST['id'];
	$categoria=$_REQUEST['categoria'];	
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Comprobamos existencia del Empleado
	comprobarExistenciaEmpleado($conexionMySQL,$id_empleado);
	
	//Cambia el Categoria
	cambiarCategoria($conexionMySQL,$id_empleado,$categoria);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>
