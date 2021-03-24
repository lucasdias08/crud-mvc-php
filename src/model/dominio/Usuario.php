<?php

    class Usuario{
        private $nome;
        private $email;
        private $id;
        private $senha;
        private $phone;
        private $cep;

        function setNome($nome) {
            $this->nome = $nome;
        }

        function getNome(){
            return $this->nome;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function getEmail(){
            return $this->email;
        }

        function setId($id) {
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setSenha($senha){
            $this->senha = $senha;
        }

        function getSenha(){
            return $this->senha;
        }

        function setPhone($phone){
            $this->phone = $phone;
        }

        function getPhone(){
            return $this->senha;
        }

        function setCep($cep){
            $this->cep = $cep;
        }

        function getCep(){
            return $this->cep;
        }

    }

?>