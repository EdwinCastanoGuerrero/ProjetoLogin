<?php 
    session_start(); //inicia a sessão
    session_unset(); //limpa as variáveis de sessão
    session_destroy();//destroi a sessão
    header('location: index.php'); //redireciona para a página de login

?>