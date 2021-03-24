<?php

    include_once "C:\\xampp\\htdocs\\src\\model\\ProdutoDAO.php";
    
    if(!isset($_SESSION)){
        session_start();
    }

    class ProdutoController{

        function indexProduto(){
            $pdo = (new SQLiteConnection())->connect();
            $produtoDAO = new ProdutoDAO($pdo);

            $produtos = $produtoDAO->index();

            return $produtos;
        }

        function indexProdutosUsuario($idUsuario){
            $pdo = (new SQLiteConnection())->connect();
            $produtoDAO = new ProdutoDAO($pdo);

            $produtos = $produtoDAO->indexProdutosUsuario($idUsuario);

            return $produtos;
        }

        function indexDadosUsuario($idUsuario){
            $pdo = (new SQLiteConnection())->connect();
            $produtoDAO = new ProdutoDAO($pdo);

            $usuario = $produtoDAO->indexDadosUsuario($idUsuario);

            return $usuario;
        }

        function insertProduto(Produto $produto){
            $pdo = (new SQLiteConnection())->connect();
            $produtoDAO = new ProdutoDAO($pdo);

            $produtoDAO->insert($produto);

            header("location: /usuario");
        }

        function updateProduto($produto){
            $pdo = (new SQLiteConnection())->connect();
            $produtoDAO = new ProdutoDAO($pdo);

            $produtoDAO->update($produto);
        }

        function deleteProduto($idProduto){
            $pdo = (new SQLiteConnection())->connect();
            $produtoDAO = new ProdutoDAO($pdo);
            
            $produtoDAO->delete($idProduto);
        }

    }

?>