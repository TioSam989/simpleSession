<?php include_once('./connection.php') ?>
<?PHP session_start() ?>
<?php $bruh1 = $_SESSION['dado1'] ?>
<?php $bruh2 = $_SESSION['dado2'] ?>

<?php $result = mysqli_query($mysqli, "SELECT * FROM tabela1 WHERE dado1='$bruh1' AND dado2='$bruh2'  "); ?>
<!doctype html>
<html>
    <head>
        <title>meus dados</title>
        <link rel="shortcut icon" href="https://i.stack.imgur.com/ILTQq.png" type="image/x-icon">
    </head>
    <body>
    <a href="./index.php"><h1>voltar</h1></a>

    <h1>dados</h1>
    <?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
            echo "<td> <h4>dado1</h4>".$res['dado1']."</td>";
			echo "<td> <h4>dado2</h4>".$res['dado2']."</td>";
			echo "<td> <h4>dado3</h4>".$res['dado3']."</td>";
            echo "<td> <h4>dado4</h4>".$res['dado4']."</td>";
            echo "</tr>";
            
			// echo "<td>".$res['dado2']."</td>";
			// echo "<td>".$res['dado3']."</td>";
			// echo "<td>".$res['dado4']."</td>";
			
		}
		?>
        
    </body>
</html>