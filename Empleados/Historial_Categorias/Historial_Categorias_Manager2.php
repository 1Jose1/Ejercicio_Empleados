<?php
	
	include('../funciones.php');
	
	function mostrarCategorias($conexionMySQL,$id_empleado){
		session_start();
		$respuesta=mysqli_query($conexionMySQL,"select * from titles where emp_no=$id_empleado;");
		echo "<center><table border='1'>
				<tr>
					<td>Id Empleado</td>
					<td>Categoria</td>
					<td>Inicio de Categoria</td>
					<td>Fin de Categoria</td>
				</tr>";
		while($fila=mysqli_fetch_assoc($respuesta)){			
			echo "<tr>
					<td>$fila[emp_no]</td>
					<td>$fila[title]</td>
					<td>$fila[from_date]</td>
					<td>$fila[to_date]</td>
				</tr>";			
		}
		echo "</table><br><a href='Historial_Categorias_Manager1.php'>Volver..</a></center>";
	}	
	
	$id_empleado=$_REQUEST['id'];	
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Comprobamos existencia del Empleado
	comprobarExistenciaEmpleado($conexionMySQL,$id_empleado);
	
	//Mostramos las Categorias
	mostrarCategorias($conexionMySQL,$id_empleado);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>

