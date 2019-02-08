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
				flex-direction:row;
				flex-wrap:wrap;				
				justify-content:center;
				align-items:center;						
			}
			#inicio div p,#inicio div input,#inicio div a{				
				width:40%;				
			}
			
		</style>		
	</head>
	<body>
		<div id="inicio">
			<form action="Historial_Categorias_Manager2.php" method="post">
				<?php
					session_start();
					echo "<h2>Hola Manager: ".$_SESSION['nombre']."</h2>";
				?>				
				<div>
					<p>Empleado: </p>
					<input type="number" name="id">					
					<input type="submit" name="enviar" value="Consultar">
				</div><br>				
					<a href="../Mandar_Menu/Opciones_Manager.php">Volver</a>
			</form>
		</div>
	</body>
</html>