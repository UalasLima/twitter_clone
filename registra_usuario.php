<?php
    require_once('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    //Utilizando a função nativa md5 a string de senha será criptografada em uma string de 32 bits
    //Para que no login não haja erro é necessário que a entrada de senha lá também seja transformada pela função md5
    $senha = md5($_POST['senha']);

    
    
    //Criando objeto Db
    $objDb = new Db();
    //Realizando a conexão
    $link = $objDb->conecta_mysql();

    $usuario_existe = false;
    $email_existe = false;

    //Verificar se o usuário já existe
    $sql = "select * from usuarios where usuario = '$usuario'";
    if($resultado_id = mysqli_query($link, $sql)) {
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if(isset($dados_usuario['usuario'])) {
            $usuario_existe = true;
        }
    }
    else   
        echo "Erro ao tentar localizar registro de usuário";

    //Verificar se o email já existe
    $sql = "select * from usuarios where email = '$email'";
    if($resultado_id = mysqli_query($link, $sql)) {
        $dados_usuario = mysqli_fetch_array($resultado_id);
        if(isset($dados_usuario['usuario'])) {
            $email_existe = true;
        }
    }
    else   
        echo "Erro ao tentar localizar registro de usuário";

    if($usuario_existe || $email_existe) {
        $retorno_get;
        if($usuario_existe) //true = 1 / false = 0
            //Recebe concatenando
            $retorno_get .= 'erro_usuario=1&';
        if($email_existe)
            $retorno_get .= 'erro_email=1&'; 

        header('Location: inscrevase.php?'.$retorno_get);
        //Essa função nativa encerra o fluxo do script, a aplicação é finalizada quando a encontra
        die();
    }
   
    

    //Criando uma query de inserção de dados
    $sql = "insert into usuarios(usuario, email, senha) values ('$usuario', '$email', '$senha')";

    //Executando a query criada por meio do comando abaixo
    //O comando recebe como parametro a conexão com o BD e a query
    //A função retorna false caso algum erro ocorra na query e true caso tudo ocorra bem
    if(mysqli_query($link, $sql))
        echo 'Usuário registrado com sucesso!';
    else
        echo 'Erro ao registrar usuário!';

?>