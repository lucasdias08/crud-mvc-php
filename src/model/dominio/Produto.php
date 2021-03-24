<?php


    class Produto{

        private $id;
        private $nome;
        private $valor;
        private $quantidade;
        private $descricao;
        private $srcImg;
        
        private $idUsuario;

        function setId($id) {
            $this->id = $id;
        }

        function getId(){
            return $this->id;
        }

        function setNome($nome) {
            $this->nome = $nome;
        }

        function getNome(){
            return $this->nome;
        }

        function setValor($valor) {
            $this->valor = $valor;
        }

        function getValor(){
            return $this->valor;
        }

        function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }

        function getQuantidade(){
            return $this->quantidade;
        }

        function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        function getDescricao(){
            return $this->descricao;
        }

        function setSrcImg($srcImg){
            $this->srcImg = $srcImg;
        }

        function getSrcImg(){
            return $this->srcImg;
        }

        function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        function getIdUsuario(){
            return $this->idUsuario;
        }

    }

?>