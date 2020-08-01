<?php
session_start();
$token = "fcabd8c0fb038f7f9d9a4a5565576e36";
$senhaAcesso = '#chulip@mito';

if($_REQUEST['token'] == $token)
    $tokenValido = true;

if($_REQUEST['senhaAcesso'] == $senhaAcesso && empty($_SESSION['usuarioValido']))
    $_SESSION['usuarioValido'] = true;

if($_REQUEST['sair'])
    unset($_SESSION['usuarioValido']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8"/>
<title>Usando GIT para atualizar arquivos no servidor de hospedagem</title>
</head>
<body>
<pre>
    <?php
        if($tokenValido) {
            $exec = shell_exec("git pull origin master 2>&1");
            echo $exec;

            $textoLog = PHP_EOL."Data: ".date("d/m/Y - H:i:s");
            $textoLog .= PHP_EOL.$exec;

            $arquivoLog = fopen('log.txt', 'a+');
            fwrite($arquivoLog, $textoLog);
            fclose($arquivoLog);
        } else if($_SESSION['usuarioValido']) {
        ?>
        <form action="index.php" method="post">
            <input type="hidden" name="token" value="fcabd8c0fb038f7f9d9a4a5565576e36">
            <input type="submit" value="Atualizar">
        </form>
        <?php
        if($_SESSION['usuarioValido'])
            echo '<p><a href="index.php?sair=true">Sair</a></p>';
            $texto = file('log.txt');
            foreach ($texto as $linha) {
                echo $linha;
            }
        } else {
        ?>
        <form action="index.php" method="post">
            <div>
                <input type="text" placeholder="Senha" name="senhaAcesso"> 
            </div>
            <input type="submit" value="Acessar Sistema">
        </form>
        <?php
        }
    ?>
</pre>
</body>
</html>
