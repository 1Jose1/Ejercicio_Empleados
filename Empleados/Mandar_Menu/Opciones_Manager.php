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
				height:180px;
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
				height:150px;
				display:flex;				
				flex-direction:column;
				flex-wrap:no-wrap;				
				justify-content:space-around;
				align-items:center;					
			}
			#inicio div p,#inicio div input{				
				width:40%;				
			}
			
		</style>		
	</head>
	<body>
		<div id="inicio">
			<form action="" method="post">
				<?php
					session_start();
					echo "<h2>Hola Manager: ".$_SESSION['nombre']."</h2>";
				?>				
				<div>
					<a href="../Cambiar_Departamento/Cambiar_Departamento_Manager1.php">Cambiar Departamento</a>
					<a href="../Cambiar_Salario/Cambiar_Salarios1.php">Cambiar Salario</a>
					<a href="../Cambiar_Categoria/Cambiar_Categoria1.php">Cambiar Categoria</a>
					<p>------------------</p>					
					<a href="../Historial_Departamentos/Historial_Departamentos_Manager1.php">Departamentos</a>
					<a href="../Historial_Salarios/Historial_Salario_Manager1.php">Salarios</a>
					<a href="../Historial_Categorias/Historial_Categorias_Manager1.php">Categorias</a>
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