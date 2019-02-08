<?php
	include('../funciones.php');
	
	function cambiarDepartamento($conexionMySQL,$id_empleado,$departamento){
		$respuesta=mysqli_query($conexionMySQL,';');
		
		echo "<br><center><a href='Historial_Departamentos_Manager1.php'>Volver..</a></center>";
	}
	
	function cambiarCategoria($conexionMySQL,$id_empleado,$categoria){
		$respuesta=mysqli_query($conexionMySQL,'select emp_no,title,from_date,to_date from titles where emp_no='.$id_empleado.' and to_date="9999-01-01";');
		$fila=mysqli_fetch_assoc($respuesta);
		var_dump($fila);		
		if($fila['from_date']!=curdate()){
			if($fila['title']!=$categoria){
				$actualizar=actualizarCategoria($conexionMySQL,$id_empleado);				
				$anadir=anadirCategoria($conexionMySQL,$id_empleado,$categoria);
				mysqli_commit($conexionMySQL);
					
			}else{
				trigger_error("Este empleado ya esta en esta categoria");
				die();
			}
			echo "<center><a href='Cambiar_Categoria1.php'></a></center>";	
		}else{
			trigger_error("No puedes Cambiar En el mismo dia de categoria");
			die();
		}
			
	}
	
	function actualizarCategoria($conexionMySQL,$id_empleado){
		$respuesta=mysqli_query($conexionMySQL,"update titles set to_date = '".curdate()."' where to_date='9999-01-01' and emp_no=$id_empleado;");
		echo "Actualizado Correctamente<br>";
		return $respuesta;
	}
	
	function anadirCategoria($conexionMySQL,$id_empleado,$categoria){
		$respuesta=mysqli_query($conexionMySQL,"insert into titles (emp_no,title,from_date,to_date) values ($id_empleado,'".$categoria."','".curdate()."','9999-01-01')");
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
	
	//Cambiamos Categoria
	cambiarCategoria($conexionMySQL,$id_empleado,$categoria);
		
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>
