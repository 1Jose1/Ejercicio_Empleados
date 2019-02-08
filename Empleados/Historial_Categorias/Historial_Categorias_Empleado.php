<?php
	include('../funciones.php');
	
	function mostrarCategorias($conexionMySQL){
		session_start();
		$respuesta=mysqli_query($conexionMySQL,"select * from titles where emp_no=".$_SESSION['id'].";");
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
		echo "</table><br><a href='../Mandar_Menu/Opciones_Empleado.php'>Volver..</a></center>";
	}	
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Mostramos las Categorias
	mostrarCategorias($conexionMySQL);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>