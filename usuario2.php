<?php

    class Usuario{

        private $id;
        private $email;
        private $senha;
        private $nome;
        private $pdo;


        public function __construct($i){

            try{
                $this->pdo = new PDO("mysql:dbname=posts;host=localhost", "root", "root");
            }catch (PDOException $e){
                echo 'Falhou ' .$e->getMessage();
            }

            if(!empty($i)){
                $sql = "SELECT * FROM usuarios WHERE id = ?";
                $sql = $this->pdo->prepare($sql);
                $sql->execute(array($i));

                if($sql->rowCount() > 0){
                    $data = $sql->fetch();
                    $this->id = $data['id'];
                    $this->email = $data['email'];
                    $this->senha = $data['senha'];
                    $this->nome = $data['nome'];
                }
            }
        }

        public function getId(){
            return $this->id;
        }

        public function setEmail($e){
            $this->email = $e;
        }

        public function getEmai(){
            return $this->email;
        }

        public function setSenha($s){
            $this->senha = md5($s);
        }

        public function setNome($n){
            $this->nome = $n;
        }

        public function getNome(){
            return $this->nome;
        }


        public function salvar(){
            if(!empty($this->id)){
                //Atualizar
                $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ? ";
                $sql = $this->pdo->prepare($sql);
                $sql->execute(array(
                    $this->nome,
                    $this->email,
                    $this->senha,
                    $this->id
                ));

            }else {
                //Salvar
                $sql = "INSERT INTO usuarios SET nome = ?, email = ?, senha = ? ";
                $sql = $this->pdo->prepare($sql);
                $sql->execute(array(
                    $this->nome,
                    $this->email,
                    $this->senha,
                ));

            }
        }

        public function excluir(){
            $sql = "DELETE FROM usuarios WHERE id = ?";
            $sql = $this->pdo->prepare($sql);
            $sql->execute(array($this->getId()));
        }



    }

?>
