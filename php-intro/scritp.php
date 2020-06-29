<?php

error_reporting(E_ALL);

require("servicos/messageSession.php");
require("servicos/validacao.php");
require("servicos/categoriaCompetidor.php");

$nome = $_POST['nome'];
$idade = $_POST['idade'];

// var_dump($idade);

defineCatCompetidor($nome, $idade);
// defineCategoriaCompetidor($nome, $idade);

$test = 'Olá mundo.';

header("location: index.php");