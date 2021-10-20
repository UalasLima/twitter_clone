<?php
    //Aqui para a conexão com o mysql vamos utilizar o msqli

    class Db {
        //Para criar uma conexão com um bd mysql precisa-se fornecer quatro informaçẽos (abaixo);
        
        //host, localhost pois o mysql está instalado no mesmo local que o apache
        private $host = 'localhost';

        //usuáriom, root é o usuário adm padrão no mysql lampp
        private $usuario = 'root';

        //Senha, por padrão mysql lampp a senha do root é vazia
        private $senha = '';

        //Banco de dados, o nome do banco q vai-se utilizar
        private $dataBase = 'twitter_clone';
        
        //Função para criar a conexão
        public function conecta_mysql() {
            //função nativa para fazer a conexão atribuida a uma variável
            $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->dataBase);

            //Ajustando o charset de comunicação entre a aplicação e o banco de dados
            //Parametros são a conexão e a codificação
            mysqli_set_charset($con, 'utf-8');

            //Verificando se houve erro de conexão
            //a função abaixo retorna um código de erros q se diferente de 0 indica que houve erro durante a tentativa de conexão com o BD
            if(mysqli_connect_errno())
                //Função abaixo retorna a descriçaõ do erro
                echo 'Erro ao tentar se concectar com o BD MySQL: '.mysqli_connect_error();

            return $con;
        }

    }


?>