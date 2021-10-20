<?php

//RETORNOS DE QUERIES:
//insert true/false
//update true/false
//delete true/false
//select false/resource (com o resource pode se recuperar o resultado da consulta)


    require_once ('db.class.php');


    $sql = "select * from usuarios";

    $objDb = new Db();
    $link = $objDb->conecta_mysql();

    //Se a consulta teve sucesso teremos na variavel os dados retornados
    $resultado_id = mysqli_query($link, $sql);
    if($resultado_id) {
        //A função mysqli_fetch_array retorna apena a primeira ocorrencia, de modo que se houve mais de uma linha da tabela a ser retornada esta função pegará apenas a primeira
        //A função retorna cada campo 2x, uma com índice númerico e outra com índice tendo por nome o atributo. Por meio do parametro MYSQLI_NUM será retornado apenas resultados com índices númericos, assim sem repetição
        //Para retornar o índice associativo invês do númerico usa-se o parametro MYSQLI_ASSOC

        //Para fazer com que todos os registros sejam pegos, usa-se laço, de modo que colocando a função dentro de um while, por exemplo, quando não houverem mais registros ela retornará falso encerrando assim o laço
        //Para garantir o armazenamento usa-se um array
        $dados_usuario = array();
        while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)) {
            $dados_usuario[] = $linha;
        }

        //Abaixo será usado o foreach, uma estrutura de repetição própria para arrays que o percorre de modo automático
        //Como parametro ele recebe o array e uma variável que armazenará os dados
        //Se o acesso for pelo indice então pode-se usar o echo para imprimir cada um inves do var_dump
        foreach($dados_usuario as $usuario) {
            echo $usuario['usuario']; echo ': ';
            echo $usuario['email'];
            echo '<br><br>';
        }
    }
    else
        echo 'Erro na execução da consulta, por favor entrar em contato com o admin do site';
    

?>