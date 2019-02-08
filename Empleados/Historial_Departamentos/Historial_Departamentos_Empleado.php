<?php
	include('../funciones.php');
	
	function mostrarDepartamentos($conexionMySQL){
		session_start();
		$respuesta=mysqli_query($conexionMySQL,"select departments.dept_name, dept_emp.from_date, dept_emp.to_date
												from dept_emp,departments
												where departments.dept_no=dept_emp.dept_no and dept_emp.emp_no=".$_SESSION['id'].";");
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
		echo "</table><br><a href='../Mandar_Menu/Opciones_Empleado.php'>Volver..</a></center>";
	}	
	
	//Iniciamos la Conexion
	$conexionMySQL=iniciarConexion();
	
	//Mostramos las Categorias
	mostrarDepartamentos($conexionMySQL);
	
	//Cerramos la Conexion
	cierreConexion($conexionMySQL);
?>