<?php
session_start();
if(!isset($_SESSION["logado"]) || $_SESSION["logado"] !== true){
    header("location: inicio.php");
    exit;
}
?>
<?php
if (isset($_GET['laboratorio'])
    and isset($_GET['data'])
    and isset($_GET['tarefa'])) {
    $_GET['laboratorio'];
    $_GET['data'];
    $_GET['tarefa'];
    
   $filename = "cadastro-chamados.txt";
   if(!file_exists("cadastro-chamados.txt")){
       $handle = fopen("cadastro-chamados.txt", "w");
   } else {
       $handle = fopen("cadastro-chamados.txt", "a");
   }
   fwrite($handle, $_GET['laboratorio']."|".$_GET['data']."|".$_GET['tarefa']."\n");
   fflush($handle);
   fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Cadsatro de títulos</title>
    <style>
         body{font: 16px sans-serif;}
         .campo{font-size: 14px; font-weight: bold;}
         .resposta{height: 24px; width: 240px;}
         .cta{font-size: 16px;}
    </style>
</head>
<body>
    <div class="">
        <h3>Boas vindas, <?php echo ($_SESSION["usuario"]) ?></h3>
        <h1>Abertura de chamados</h1>
        <p>Insira os dados nos campos abaixo. Cadastre um chamado de cada vez. </p><br>
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="get">
        <div>
            <label class="campo">Laboratório:</label><br>
            <input class="resposta" type="text" name="laboratorio" value="">
        </div><br>
        <div>
            <label class="campo">Data:</label><br>
            <input class="resposta" type="text" name="data" value="">
        </div><br>
        <div>
            <label class="campo">Tarefa:</label><br>
            <input class="resposta" type="text" name="tarefa" value="">
        </div><br>
        <div class="cta">
                <input type="submit" value="Abrir chamado">
        </div><br><br><br>
        <div class="cta">
                <a href="logout.php" button>Sair</button>
        </div>       