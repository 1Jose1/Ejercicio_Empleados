<?php
	include('../funciones.php');
	
	function mostrarDepartamentos($conexionMySQL,$id_empleado){
		session_start();
		$respuesta=mysqli_query($conexionMySQL,"select departments.dept_name, dept_emp.from_date, dept_emp.to_date
												from dept_emp,departments
												where departments.dept_no=dept_emp.dept_no and dept_emp.emp_no=$id_empleado;");
		echo "<center><table border='1'>
				<tr>
					<td>Nombre Departamento</td>					
					<td>Inicio de Departamento</td>
					<td>Fin de Departamento</td>
				</tr>";
		while($fila=mysqli_fetch_assoc($respuesta)){			
			echo "<tr>
					<td>$fila[dept_name]</td>					
					<td>$fila[from_date]</td>
					<td>$fila[to_date]</td>
				</tr>";			
		}
		echo "</table><br><a href='Historial_Departamentos_Manager1.php'>Volver..</a></center>";
	}

	$id_empleado=$_REQUEST['id'];
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Comprobamos existencia del Empleado
	comprobarExistenciaEmpleado($conexionMySQL,$id_empleado);
	
	//Mostramos las Categorias
	mostrarDepartamentos($conexionMySQL,$id_empleado);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>
