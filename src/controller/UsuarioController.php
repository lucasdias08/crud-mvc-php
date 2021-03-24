<?php

    include_once "C:\\xampp\\htdocs\\src\\model\\UsuarioDAO.php";

    if(!isset($_SESSION)){
        session_start();
    }

    class UsuarioController{

        function indexUsuario(){
            $pdo = (new SQLiteConnection())->connect();
            $usuarioDAO = new UsuarioDAO($pdo);

            $usuarios = $usuarioDAO->index();
            return $usuarios;
        }

        function insertUsuario(Usuario $usuario){

            $pdo = (new SQLiteConnection())->connect();
            $usuarioDAO = new UsuarioDAO($pdo);

            $result = $usuarioDAO->insert($usuario);

            var_dump($result);
            return $result;
        }

        function updateUsuario($usuario){
            $pdo = (new SQLiteConnection())->connect();
            $usuarioDAO = new UsuarioDAO($pdo);

            $result = $usuarioDAO->update($usuario);

            return $result;
        }

        function deleteUsuario($idUsuario){
            $pdo = (new SQLiteConnection())->connect();
            $usuarioDAO = new UsuarioDAO($pdo);
            
            $usuarioDAO->delete($idUsuario);
        }

        function loginUsuario(Usuario $usuario){
            $pdo = (new SQLiteConnection())->connect();
            $usuarioDAO = new UsuarioDAO($pdo);

            $email = $usuario->getEmail();

            $_usuario = $usuarioDAO->indexOne($email);

            if($_usuario == "Usuário não encontrado"){
                return $_usuario;
            } else {
                $usuario->setNome($_usuario['nome_usuario']);
                $usuario->setPhone($_usuario['phone_usuario']);
                $usuario->setCep($_usuario['cep_usuario']);

                $usuarioDAO->login($usuario);

            }

            return true;
    
        }

        function logoffUsuario(){
            $pdo = (new SQLiteConnection())->connect();
            $usuarioDAO = new UsuarioDAO($pdo);

            $usuarioDAO->logoff();
        }
    }

?>