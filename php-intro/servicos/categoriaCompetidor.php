<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

function defineCatCompetidor(string $nome, string $idade)
{
    $categorias = array('infatil', 'adolescente', 'adulto', 'idoso');

    if(validaNome($nome) && validaIdade($idade)){
        rmMessageError();

        if ($idade >= 6 && $idade <= 12) {
            m($categorias, $nome, $categorias[0], $idade);
        } elseif ($idade >= 13 && $idade <= 18) {
            m($categorias, $nome, $categorias[1], $idade);
        } elseif ($idade >= 19 && $idade <= 48) {
            m($categorias, $nome, $categorias[2], $idade);
        } elseif ($idade > 48) {
            m($categorias, $nome, $categorias[3], $idade);
        }
    }else{
        rmMessageSuccess();
        return getMessageError();
    }
}

function m(array $cat, string $nome, string $tipo,  $idade)
{
    for ($i = 0; $i < count($cat); $i++) {
        if ($cat[$i] == $tipo) {
            // seta competidores na sessão competidores
            setCompetidores($nome, $idade, $cat[$i]);
            
            setMessageSuccess('O nadador <strong>' . $nome . '</strong>     compete na categoria <strong>' . $cat[$i] . "</strong>");
            return null;
        }
    }
}