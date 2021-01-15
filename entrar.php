<?php session_start(); ?>
<html>
<head>
	<title>LOGIN</title>
    <link rel="shortcut icon" href="https://i.stack.imgur.com/ILTQq.png" type="image/x-icon">
</head>

<body>
	
    <a href="./index.php"><h1>voltar</h1></a>

<?php
include("./connection.php");

function Mostramensagem($mensagem) {
 echo '<script type="text/javascript">alert("' . $mensagem . '")</script>';
}
if ($mysqli){
if(isset($_POST['submit'])) {
	$dado1 = mysqli_real_escape_string($mysqli, $_POST['dado1']);
	$dado2 = mysqli_real_escape_string($mysqli, $_POST['dado2']);
	if($dado1 == "" || $dado2 == "") {
		/*echo "Ou o Username ou Palavra Pass estão vazios.";
		echo "<br/>";
		echo "<a href='login.php'>Voltar</a>";*/
		Mostramensagem("Todos os campos são de introdução obrigatória.");
		header('Refresh: 1; URL=login.php');
		die();
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM tabela1 WHERE BINARY dado1='$dado1' AND dado2='$dado2'")or die("Não foi possível neste momento executar o seu pedido.");
		

		$row = mysqli_fetch_assoc($result);

		if(is_array($row) && !empty($row)) {

				
				$validuser = $row['ID_tabela1'];
				$_SESSION['validado'] = $validuser;
				$_SESSION['dado1'] = $row['dado1'];
				$_SESSION['dado2'] = $row['dado2'];
                
	
		} else {

		Mostramensagem("dados 1 ou dados 2 errados.");
		header('Refresh: 1; URL=index.php');
		die();
		}

		if(isset($_SESSION['validado'])) {
			header('Location: ./dados.php');
		die();			
		}
	}
} else {
?>
	<form action="" method="POST">
        <input type="text" name="dado1" >
        <input type="text" name="dado2" >

        <button type="submit" name="submit">go</button>
    </form>
<?php
}
}
else{
/*echo "Impossivel Ligar à Base de Dados. <br>" ;
echo "Número do erro: " . mysqli_connect_errno()."<br>";
echo "Informação do erro: " . mysqli_connect_error();*/
Mostramensagem("Impossivel Ligar à Base de Dados.");
exit;
}
?>

</body>
</html>
