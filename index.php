<?php include_once('./connection.php') ?>
<?php session_start(); ?>

<html>
    <head>
        <title>!WARNING!</title>
        <link rel="shortcut icon" href="https://i.stack.imgur.com/ILTQq.png" type="image/x-icon">
    </head>
    <body>  
        <?php 
            if(isset($_SESSION['validado'])){
                $resultado = mysqli_query($mysqli, "select * from tabela1");
            
        ?>

            <h1>eae <?php $_SESSION['dado1'] ?></h1>
            <h1><a href="./dados.php"> dados</a></h1>
            <h1><a href="./logout.php">sair</a></h1>
        <?php 
            }else{
                echo "voce nao tem sessao iniciada";
                
            
            
        ?>
                <h1 style="color:red">aaa</h1>
                <a href="./registrar.php">registrar</a>
                <a href="./dados.php">dados</a>
                <a href="./entrar.php">login</a>

        <?php 
            }
        ?>
      
    </body>
</html>


