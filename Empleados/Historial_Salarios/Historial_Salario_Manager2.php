<?php
	include('../funciones.php');
	
	function mostrarSalarios($conexionMySQL,$id_empleado){
		session_start();
		$respuesta=mysqli_query($conexionMySQL,"select salary,from_date,to_date
												from salaries
												where emp_no=$id_empleado;");
		echo "<center><table border='1'>
				<tr>
					<td>Salario</td>					
					<td>Inicio de Salario</td>
					<td>Fin de Salario</td>
				</tr>";
		while($fila=mysqli_fetch_assoc($respuesta)){			
			echo "<tr>
					<td>$fila[salary]</td>					
					<td>$fila[from_date]</td>
					<td>$fila[to_date]</td>
				</tr>";			
		}
		echo "</table><br><a href='Historial_Salario_Manager1.php'>Volver..</a></center>";
	}
	$id_empleado=$_REQUEST['id'];
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Comprobamos existencia del Empleado
	comprobarExistenciaEmpleado($conexionMySQL,$id_empleado);	
	
	//Mostramos las Categorias
	mostrarSalarios($conexionMySQL,$id_empleado);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>