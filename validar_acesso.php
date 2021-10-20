<?php

//RETORNOS DE QUERIES:
//insert true/false
//update true/false
//delete true/false
//select false/resource (com o resource pode se recuperar o resultado da consulta)

    //este comando deve ser incluido antes de qualquer entrada ou saída de dados, é uma boa prática então o colocar logo no começo do script
    session_start();

    require_once ('db.class.php');

    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    //Query verificando se usuário e senha estão cadastrados no BD
    $sql = "select id, usuario, email from usuarios where usuario = '$usuario' and senha = '$senha'";

    $objDb = new Db();
    $link = $objDb->conecta_mysql();

    //Se a consulta teve sucesso teremos na variavel os dados retornados
    $resultado_id = mysqli_query($link, $sql);
    //Se retornado qualquer dado e não false (caso haja erro na consulta, não importando se usuario e senha existem ou não) então no teste do if teremos o true
    if($resultado_id) {
        //Vamos usar a função abaixo passando como parametro a variavel acima para ter como retorno os dados em forma de array
        $dados_usuario = mysqli_fetch_array($resultado_id);
        //A função isset verifica se uma variável existe, no caso abaixo verifica se uma posição no array existe, se não existir retorna false, assim verifica se o dado existe no BD
        if(isset($dados_usuario['usuario'])) {
            //Usando a variável super global de seção para receber o usuáro
            //Tais variáveis existem no escopo completo da aplicação podendo ser usadas em outrás páginas de código
            //Para se usar então tem-se que iniciar a seção com session_start();
            //Para destruir variáveis de sessão ou o usuáro fecha o navegador ou cria se um código com este fim
            $_SESSION['id_usuario'] = $dados_usuario['id'];
            $_SESSION['usuario'] = $dados_usuario['usuario'];
            $_SESSION['email'] = $dados_usuario['email'];

            header('Location: home.php');
        }
        else
            //A função abaixo faz um redirecionamento para uma página especificada como parametro, além disso pode se usar "?mensagem_qualquer" como string passada via get para fornecer uma informação na url para a qual houve o redirecionamento
            //O que foi passado por meio de get funcina como variavel (erro) e valor da variável (1) podendo assim ser recuperado, e neste caso o é na página index
            header('Location: index.php?erro=1');
    }
    else
        echo 'Erro na execução da consulta, por favor entrar em contato com o admin do site';
    

    

?>