<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();

function setMessageErro(string $msg) : void
{
    $_SESSION['message-error'] = $msg;
}

function getMessageError() : ?string
{
    if(isset($_SESSION['message-error']))
        return $_SESSION['message-error'];

    return null;
}

// msg sucesso
function setMessageSuccess(string $msg) : void
{
    $_SESSION['message-sucesso'] = $msg;
}

function getMessageSuccess() : ?string
{
    if(isset($_SESSION['message-sucesso']))
        return $_SESSION['message-sucesso'];

    return null;
}

function setCompetidores(string $nome, string $idade, $categoria) : void
{
    $competidores = array([]);

    $_SESSION['competidores'][] = ['nome' => $nome, 'idade' => $idade, 'categoria' => $categoria];
}

function getCompetidores() : ?array
{
    if(isset($_SESSION['competidores']))
        return $_SESSION['competidores'];

    return null;
}


function rmMessageError() : void
{
    if(isset($_SESSION['message-error']))
        unset($_SESSION['message-error']);
}

function rmMessageSuccess() : void
{
    if(isset($_SESSION['message-sucesso']))
        unset($_SESSION['message-sucesso']);
}