<?php
require("servicos/messageSession.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de inscrição de competidor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/all.min.js" integrity="sha256-HkXXtFRaflZ7gjmpjGQBENGnq8NIno4SDNq/3DbkMgo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container text-center">
        <i class="fas fa-skiing fa-5x mb-2 text-primary"></i>
        <h4 class="mb-2">Inscrição de competidor</h4>

        <form action="/scritp.php" method="post" class="form-competidor">
            <?php if (!empty(getMessageError()) || !empty(getMessageSuccess())) :
                $alert = getMessageError() ? 'danger' : 'success';
                $msg = getMessageError() ? getMessageError() : getMessageSuccess();
            ?>
                <div class="alert alert-<?php echo $alert ?> alert-dismissible fade show" role="alert">
                    <?php echo $msg ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; rmMessageSuccess(); rmMessageError() ?>

            <input class="form-control" type="text" name="nome" id="nome" placeholder="nome">
            <input class="form-control idade" type="text" name="idade" id="idade" placeholder="idade">
            <button type="submit" class="btn btn-primary btn-block mt-2">Enviar</button>
        </form>

        <div class="row">
            <div class="col-md-12 mt-4">
                <h2 class="display-4">Lista de Competidores</h2>
                <table class="table table-sm table-striped table-hover">
                    <thead>
                        <th>Nome</th>
                        <th class="text-center">idade</th>
                        <th>Categoria</th>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['competidores'] as $list) : ?>
                            <tr>
                                <td><?php echo $list['nome'] ?></td>
                                <td class="text-center"><?php echo $list['idade'] ?></td>
                                <td><?php echo $list['categoria'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <th colspan="3" class="text-right">
                            <?php foreach ($_SESSION['competidores'] as $list) : ?>
                                <?php $idade[] = $list['idade']; ?>
                            <?php endforeach; 
                                echo '<strong>Menor idade: </strong>' . min($idade) ."<br>";
                                echo '<strong>Maior idade: </strong>' . max($idade)."<br>";
                                echo '<strong>Média de idade: </strong>';
                                $pkCount = (is_array($idade) ? count($idade) : 0);
                                if($pkCount > 0){
                                    echo round(array_sum($idade)/count($idade));
                                }
                            ?>
                        </th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>