<?php

    include_once "C:\\xampp\\htdocs\\src\\model\\dominio\\Produto.php";
    require "C:\\xampp\\htdocs\\src\\database\\SQLiteConnection.php";

    class ProdutoDAO{

        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        function index(){
            try{
                $stmt = $this->pdo->query('SELECT * FROM produto;');

                $produtos = [];

                while ($produto = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    $produtos[] = $produto;
                }
            
                //var_dump($produtos);

                return $produtos;

            } catch(Exception $e){
                echo "erro em usuarioDAO->index()" . $e;
            }
            
        }

        function indexProdutosUsuario($idUsuario){
            try{
                $stmt = $this->pdo->query("SELECT * FROM produto WHERE produto.id_usuario_fk = ". $idUsuario . ";");

                $produtos = [];

                while ($produto = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    $produtos[] = $produto;
                }
            
                //var_dump($produtos);

                return $produtos;

            } catch(Exception $e){
                echo "erro em usuarioDAO->index()" . $e;
            }
        }

        function insert(Produto $produto){
            $i = $produto->getId();

            try{
                if(isset($_FILES["file-img"])){
                    
                    date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

                    $nome_arquivo = $_FILES["file-img"]['name']; //Definindo um novo nome para o arquivo
                    $dir = 'C:\\xampp\\htdocs\\public\\img\\'; //Diretório para uploads

                    move_uploaded_file($_FILES["file-img"]['tmp_name'], $dir.$nome_arquivo); //Fazer upload do arquivo

                    $query = "INSERT INTO produto (nome_produto, src_img_produto, descricao_produto, valor_produto, quantidade_produto, id_usuario_fk) VALUES (:nome_produto, :src_img_produto, :descricao_produto, :valor_produto, :quantidade_produto, :id_usuario_fk)";

                    $stmt = $this->pdo->prepare($query);

                    $produto->setSrcImg($dir.$nome_arquivo);

                    var_dump($produto);

                    $stmt->bindParam(':nome_produto', $produto->getNome());
                    $stmt->bindParam(':src_img_produto', $produto->getSrcImg());
                    $stmt->bindParam(':descricao_produto', $produto->getDescricao());
                    $stmt->bindParam(':valor_produto', $produto->getValor());
                    $stmt->bindParam(':quantidade_produto', $produto->getQuantidade());
                    $stmt->bindParam(':id_usuario_fk', $produto->getIdUsuario());

                    $stmt->execute();
                }

                
            } catch(Exception $e){
                echo "erro em produtoDAO->insert()" . $e;
            }
            
        }

        function update(Produto $produto){
            $i = $produto->getId();
            var_dump($_FILES["file-img-" . $i . ""]);

            if(isset($_FILES["file-img-" . $i . ""]) and $_FILES["file-img-" . $i . ""]['name'] != ""){

                echo "entrou no if";

                date_default_timezone_set("Brazil/East"); //Definindo timezone padrão

                $nome_arquivo = $_FILES["file-img-" . $i . ""]['name']; //Definindo um novo nome para o arquivo
                $dir = 'C:\\xampp\\htdocs\\public\\img\\'; //Diretório para uploads

                move_uploaded_file($_FILES["file-img-" . $i . ""]['tmp_name'], $dir.$nome_arquivo); //Fazer upload do arquivo

                $produto->setSrcImg($dir.$nome_arquivo);

                $query = "UPDATE produto SET nome_produto = :nome_produto, descricao_produto = :descricao_produto,
                        valor_produto = :valor_produto, quantidade_produto = :quantidade_produto,
                        src_img_produto = :src_img_produto WHERE produto.id_produto = " . $produto->getId() . ";";  

                $stmt = $this->pdo->prepare($query);

                $stmt->bindParam(':nome_produto', $produto->getNome());
                $stmt->bindParam(':descricao_produto', $produto->getDescricao());
                $stmt->bindParam(':quantidade_produto', $produto->getQuantidade());
                $stmt->bindParam(':valor_produto', $produto->getValor());
                $stmt->bindParam(':src_img_produto', $produto->getSrcImg());

                
                
                $stmt->execute();

            } else {
                echo "entrou no else";
                
                $query = "UPDATE produto SET nome_produto = :nome_produto, descricao_produto = :descricao_produto,
                        valor_produto = :valor_produto, quantidade_produto = :quantidade_produto 
                            WHERE produto.id_produto = " . $produto->getId() . ";";  

                $stmt = $this->pdo->prepare($query);

                $stmt->bindParam(':nome_produto', $produto->getNome());
                $stmt->bindParam(':descricao_produto', $produto->getDescricao());
                $stmt->bindParam(':quantidade_produto', $produto->getQuantidade());
                $stmt->bindParam(':valor_produto', $produto->getValor());

                $stmt->execute();
                
            }
            
        }

        public function delete($idProduto){

            $query = "DELETE FROM produto WHERE produto.id_produto = " . $idProduto . ";";   
            $stmt = $this->pdo->prepare($query);
    

            $stmt->execute();
        }

        public function indexDadosUsuario($idUsuario){
            try{
                $stmt = $this->pdo->query("SELECT * FROM usuario WHERE usuario.id_usuario = " . $idUsuario . ";");

                $usuario = null;

                while ($u = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                    $usuario = $u;
                    
                }

                return $usuario;

            } catch(Exception $e){
                echo "erro em usuarioDAO->index()" . $e;
            }
        }

    }

?>