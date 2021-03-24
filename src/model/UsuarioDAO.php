<?php

    require "C:\\xampp\\htdocs\\src\\model\\dominio/Usuario.php";
    require "C:\\xampp\\htdocs\\src\\database\\SQLiteConnection.php";

    if(!isset($_SESSION)){
        session_start();
    }
    
    class UsuarioDAO{

        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function index(){
            try{
                $stmt = $this->pdo->query('SELECT * FROM usuario;');

                $usuarios = [];

                while ($usuario = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    $usuarios[] = $usuario;
                }
            
                return $usuarios;

            } catch(Exception $e){
                echo "erro em usuarioDAO->index()" . $e;
            }
            
        }

        function indexOne($email){
            try{
                $usuarios = $this->index();
                
                $usuario = new Usuario();

                foreach($usuarios as $u){
                    if($u["email_usuario"] == $email){
                        echo "usuário existe";
                        $usuario = $u;
                        $ok = true;

                        return $usuario;
                    }
                }

                return "Usuário não encontrado";
            } catch(Exception $e){
                echo "erro em usuarioDAO->indexOne()" . $e;
            }
            
        }

        function login(Usuario $usuario){
        
            $usuarios = $this->index();

            $ok = false;

            foreach($usuarios as $u){
                if($u["email_usuario"] == $usuario->getEmail() and $u["senha_usuario"] == $usuario->getSenha()){
                    echo "usuário existe";
                    $ok = true;

                    $_SESSION['email-usuario'] = $u["email_usuario"];
                    $_SESSION['id-usuario'] = $u['id_usuario'];
                    $_SESSION['senha-usuario'] = $u['senha_usuario'];
                    $_SESSION['nome-usuario'] = $u['nome_usuario'];
                    $_SESSION['cep-usuario'] = $u['cep_usuario'];
                    $_SESSION['phone-usuario'] = $u['phone_usuario'];
                }
            }

            if(!$ok){
                echo "usuario não existe";

                return "Usuário não encontrado";
            }

        }

        function logoff(){
        
            session_start();

            unset($_SESSION['email-usuario']);
            unset($_SESSION['senha-usuario']);
            unset($_SESSION['nome-usuario']);
            unset($_SESSION['cep-usuario']);
            unset($_SESSION['phone-usuario']);
    
        }

        function insert(Usuario $usuario){
            
            $usuarios = $this->index();

            $ok = true;

            foreach($usuarios as $u){
                if($u["email_usuario"] == $usuario->getEmail()){
                    echo "encontrou email";
                    $ok = false;
                    return "E-mail ja existente. Tente novamente.";
                }
            }
            
            if($ok){

                try{
                    $query = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, cep_usuario, phone_usuario) VALUES (:nome_usuario, :email_usuario, :senha_usuario, :cep_usuario, :phone_usuario);";
    
                    $stmt = $this->pdo->prepare($query);
                    $stmt->bindParam(':nome_usuario', $usuario->getNome());
                    $stmt->bindParam(':email_usuario', $usuario->getEmail());
                    $stmt->bindParam(':senha_usuario', $usuario->getSenha());
                    $stmt->bindParam(':cep_usuario', $usuario->getCep());
                    $stmt->bindParam(':phone_usuario', $usuario->getPhone());
                    
     
                    $stmt->execute();

                    return "Usuário cadastrado com sucesso";
    
                } catch (Exception $e){
                    echo "erro em usuarioDAO->insert()" . $e;
                }

            } 
            
        }

        function update(Usuario $usuario){
            $query = "UPDATE usuario SET nome_usuario = :nome_usuario, email_usuario = :email_usuario,  
                        senha_usuario = :senha_usuario, cep_usuario = :cep_usuario, phone_usuario = :phone_usuario 
                            WHERE usuario.id_usuario = " . $usuario->getId() . ";";               
                            
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nome_usuario', $usuario->getNome());
            $stmt->bindParam(':email_usuario', $usuario->getEmail());
            $stmt->bindParam(':senha_usuario', $usuario->getSenha());
            $stmt->bindParam(':cep_usuario', $usuario->getCep());
            $stmt->bindParam(':phone_usuario', $usuario->getPhone());
    

            $_SESSION['email-usuario'] = $usuario->getEmail();
            $_SESSION['id-usuario'] = $usuario->getId();
            $_SESSION['senha-usuario'] = $usuario->getSenha();
            $_SESSION['nome-usuario'] = $usuario->getNome();
            $_SESSION['cep-usuario'] = $usuario->getCep();
            $_SESSION['phone-usuario'] = $usuario->getPhone();

            $stmt->execute();

            return "Usuário atualizado com sucesso";
            
        }

        function delete($idUsuario){
            
            $this->logoff();

            $query = "DELETE FROM usuario WHERE usuario.id_usuario = " . $idUsuario . ";";   
            $stmt = $this->pdo->prepare($query);
    

            $stmt->execute();

            $this->deleteProdutoUsuario($idUsuario);
        
        }

        function deleteProdutoUsuario($idUsuario){
            $query = "DELETE FROM produto WHERE produto.id_usuario_fk = " . $idUsuario . ";";   
            $stmt = $this->pdo->prepare($query);
    
            $stmt->execute();

            unset($_SESSION);

            echo "ok";
        }

    }

?>