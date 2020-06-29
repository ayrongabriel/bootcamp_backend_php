<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
// include __DIR__ . "messageSession.php";

function validaNome(string $nome) : bool
{
    if (empty($nome)) {
        setMessageErro('O campo NOME não pode ser vazio.');
        return false;
    } elseif (strlen($nome) < 3) {
        setMessageErro('O campo NOME não pode ter menos de 3 caracteres.');
        return false;
    } elseif (strlen($nome) > 20) {
        setMessageErro('O campo NOME não pode ter mais de 20 caracteres.');
        return false;
    }
    return true;
}

function validaIdade(string $idade) : bool
{
    if (empty($idade)) {
        setMessageErro('O campo IDADE não pode ser vazio.');
        return false;
    } elseif (!is_numeric($idade)) {
        setMessageErro('O campo IDADE só aceita números.');
        return false;
    }

    return true;
}
