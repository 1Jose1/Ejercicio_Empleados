<html>
	<head>	
		<style type="text/css">
			*{
				margin:0;
				padding:0;
			}
			
			#inicio{
				width:350px;
				margin:2% auto;
				height:120px;
				background-color:white;
				border:1px solid black;
				text-align:center;
			}
			#inicio h2{
				background-color:black;
				height:30px;
				color:white;
				font-style:italic;
			}
			#inicio div{
				width:100%;
				height:90px;
				display:flex;				
				flex-direction:column;
				flex-wrap:no-wrap;				
				justify-content:space-around;
				align-items:center;				
			}
			#inicio div a,#inicio div input{				
				width:60%;				
			}
			
		</style>		
	</head>
	<body>
		<div id="inicio">
			<form action="" method="post">
				<?php
					session_start();
					echo "<h2>Hola Empleado: ".$_SESSION['nombre']."</h2>";
				?>				
				<div>
					<a href="../Historial_Departamentos/Historial_Departamentos_Empleado.php">Historial de Tus departamentos</a>
					<a href="../Historial_Salarios/Historial_Salario_Empleado.php">Historial de Tus Salarios</a>
					<a href="../Historial_Categorias/Historial_Categorias_Empleado.php">Historial de Tus Categorias</a>
					<input type="submit" name="cerrar" value="Cerrar Sesion">
				</div>
			</form>
		</div>
	</body>
</html>

<?php
	include('../funciones.php');
	//Cerramos la Sesion
	if(isset($_REQUEST['cerrar'])){
		destruirSesion();	
		header('Location: ../index.html');
	}	
?>