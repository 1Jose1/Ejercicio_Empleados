<?php
	include('../funciones.php');
	
	function cambiarDepartamento($conexionMySQL,$id_empleado,$departamento){
		$respuesta=mysqli_query($conexionMySQL,';');
		
		echo "<br><center><a href='Historial_Departamentos_Manager1.php'>Volver..</a></center>";
	}
	
	function comprobarAntiguoDepartamento($conexionMySQL,$id_empleado,$departamento){
		$respuesta=mysqli_query($conexionMySQL,'select dept_emp.dept_no,departments.dept_name,dept_emp.to_date,dept_emp.from_date from dept_emp,departments where dept_emp.dept_no=departments.dept_no and dept_emp.emp_no='.$id_empleado.' and dept_emp.to_date="9999-01-01";');
		$fila=mysqli_fetch_assoc($respuesta);
		var_dump($fila);		
		if($fila['from_date']!=curdate()){
			if($fila['dept_name']!=$departamento){
				$actualizar=actualizarHistorialDepartamentos($conexionMySQL,$id_empleado);				
				$anadir=anadirHistorialDepartamentos($conexionMySQL,$id_empleado,$departamento);
				mysqli_commit($conexionMySQL);
			}else{
				trigger_error("Este empleado ya esta en este departamento");
				die();
			}
			echo "<center><a href='Cambiar_Departamento_Manager1.php'></a></center>";	
		}else{
			trigger_error("No puedes Cambiar En el mismo dia de departamento");
			die();
		}
			
	}
	
	function actualizarHistorialDepartamentos($conexionMySQL,$id_empleado){
		$respuesta=mysqli_query($conexionMySQL,"update dept_emp set to_date = '".curdate()."' where to_date='9999-01-01' and emp_no=$id_empleado;");
		echo "Actualizado Correctamente<br>";
		return $respuesta;
	}
	
	function anadirHistorialDepartamentos($conexionMySQL,$id_empleado,$departamento){
		$id_departamento=mysqli_query($conexionMySQL,"select dept_no from departments where dept_name='$departamento'");
		$id_departamento=mysqli_fetch_assoc($id_departamento);		
		$respuesta=mysqli_query($conexionMySQL,"insert into dept_emp (emp_no,dept_no,from_date,to_date) values ($id_empleado,'".$id_departamento['dept_no']."','".curdate()."','9999-01-01')");
		echo "Añadido Correctamente<br>";
		return $respuesta;
	}
	
	function curdate() {
		return date('Y-m-d');
	}

	$id_empleado=$_REQUEST['id'];
	$departamento=$_REQUEST['departamento'];	
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Comprobamos existencia del Empleado
	comprobarExistenciaEmpleado($conexionMySQL,$id_empleado);
	
	//Cambiar Departamento
	comprobarAntiguoDepartamento($conexionMySQL,$id_empleado,$departamento);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>
