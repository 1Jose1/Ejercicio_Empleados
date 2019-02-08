<?php
	include('../funciones.php');
	
	function mostrarSalarios($conexionMySQL){
		session_start();
		$respuesta=mysqli_query($conexionMySQL,"select salary,from_date,to_date
												from salaries
												where emp_no=".$_SESSION['id'].";");
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
		echo "</table><br><a href='../Mandar_Menu/Opciones_Empleado.php'>Volver..</a></center>";
	}	
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Mostramos las Categorias
	mostrarSalarios($conexionMySQL);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>