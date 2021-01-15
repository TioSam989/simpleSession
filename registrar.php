<?php include_once('./connection.php') ?>
<!doctype html>
<html>
	<head>
		<title>registrar</title>
		<link rel="shortcut icon" href="https://i.stack.imgur.com/ILTQq.png" type="image/x-icon">
	</head>
	
	<body>
    <a href="./index.php"><h1>voltar</h1></a>
	
	<style>

		:root{
			--cor-primaria:crimson ;
		}

		.inputForm{
			color: var(--cor-primaria);
			margin: 1rem;
		}
	</style>
	<script>
		function myFunction(){
			return true;
		}
	</script>

		<?php 
			function consolePraMim($mensagem){
				echo '<script>console.log("'.$mensagem.'")</script>';
			}
			function Mostramensagem($mensagem) {
				echo '<script type="text/javascript">alert("' . $mensagem . '")</script>';
			}

			if($mysqli){


				if(isset($_POST['submit'])){
					Mostramensagem("entrei na funcao dos dados la");

					$dado1 = $_POST['dado1'];
					$dado2 = $_POST['dado2'];
					$dado3 = $_POST['dado3'];
					$dado4 = $_POST['dado4'];
					
					
					$resultado = mysqli_query($mysqli, "select * from tabela1 where dado1='$dado1' or dado2='$dado2'");

					$row = mysqli_fetch_assoc($resultado);

					if(is_array($row) && !empty($row)){
						consolePraMim("dados ja estao em uso");
						Mostramensagem("vazio:true");
						die();
					}else{
						
						mysqli_query($mysqli, "INSERT INTO tabela1 (dado1, dado2, dado3, dado4) VALUES ('$dado1','$dado2','$dado3','$dado4')") or die("nao foi possivel executar o pedido");
						Mostramensagem("vazio:false");
						header('Location: ./index.php');

						die();
					}
					
				}else{
					?>

						<form action="" method="post">
							<input class="inputForm" type="text" name="dado1" required></br>
							<input class="inputForm" type="text" name="dado2" required></br>
							<input class="inputForm" type="text" name="dado3" required></br>
							<input class="inputForm" type="text" name="dado4" required></br>

							<h3>observação:</h3><h4>os dois primeiros inputs nao podem ser iguais a outro da tabela</h4>

							<button type="submit" name="submit">go</button>
						</form>

					<?php
				}

			}else{
				Mostramensagem("nao foi possivel conectar na base de dados");
				exit;
			}
		?>	
	</body>
</html>

<!-- <h1 style="color:blue"> bbbbbb</h1> -->
