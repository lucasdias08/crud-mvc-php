<?php

  $bdname = 'C:\\xampp\\htdocs\\src\\database\\olsports.db';
  if(!file_exists($bdname)){
    require "C:\\xampp\\htdocs\\src\\database\\SQLiteConnection.php";
    require "C:\\xampp\\htdocs\\src\\database\\SQLiteCreateTable.php";

    $sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());
    //create new tables if not exists
    $sqlite->createTables();
  }

  if(isset($_GET['url'])){
    $url = $_GET['url'];
    $url = explode("/", $url);

  
    if($_GET['url'] == "cadastro/usuario"){
      require "C:\\xampp\\htdocs\\view\\cadastro-usuario.php";
    }

    if($_GET['url'] == "cadastro/usuario/e"){
      require "C:\\xampp\\htdocs\\src\\controller\\UsuarioController.php";
      

      $usuarioController = new UsuarioController();

      $usuario = new Usuario();
      $usuario->setNome($_POST["nome-usuario"]);
      $usuario->setEmail($_POST["email-usuario"]);
      $usuario->setSenha($_POST["senha-usuario"]);
      $usuario->setCep($_POST["cep-usuario"]);
      $usuario->setPhone($_POST["phone-usuario"]);

      $result = $usuarioController->insertUsuario($usuario);


      header("location: /?resp=" . $result);
    }

    if($_GET['url'] == "usuario/log"){
      try{
        require "C:\\xampp\\htdocs\\src\\controller\\UsuarioController.php";

        $usuarioController = new UsuarioController();

        $usuario = new Usuario();
        $usuario->setEmail($_POST["email-usuario"]);
        $usuario->setSenha($_POST["senha-usuario"]);

        $result = $usuarioController->loginUsuario($usuario);

        var_dump($result);
        if($result){
          header("location: /usuario");
          
        } else {
          header("location: /?resp=" . $result);
        }
        
      } catch (Exception $e){
        echo "Erro em >> rotas logar";
      }

      
    }

    if($_GET['url'] == "usuario"){
      
      session_start();

      if(isset($_SESSION['email-usuario'])){
        require "C:\\xampp\\htdocs\\view\\home.php";
      } else {
        header("location: /");
        
      }

    }

    if($_GET['url'] == "usuario/edit"){
      
      session_start();

      if(isset($_SESSION['email-usuario'])){
        $_GET['url'] = "/";
      
        require "C:\\xampp\\htdocs\\view\\editar-usuario.php";
      } else {
        header("location: /");
      }

    }

    if($_GET['url'] == "usuario/edit/e"){
      
      session_start();

      if(isset($_SESSION['email-usuario'])){
        require "C:\\xampp\\htdocs\\src\\controller\\UsuarioController.php";
        
        
        $usuarioController = new UsuarioController();

        $usuario = new Usuario();
        $usuario->setId($_SESSION["id-usuario"]);
        $usuario->setNome($_POST["nome-usuario"]);
        $usuario->setEmail($_POST["email-usuario"]);
        $usuario->setSenha($_POST["senha-usuario"]);
        $usuario->setCep($_POST["cep-usuario"]);
        $usuario->setPhone($_POST["phone-usuario"]);

        $result = $usuarioController->updateUsuario($usuario);

        header("location: /usuario?resp=" . $result);

      } else {
        header("location: /");
      }

    }

    if($_GET['url'] == "usuario/cadastro/produto"){
      
      session_start();

      if(isset($_SESSION['email-usuario'])){
        $_GET['url'] = "/";
        
        require "C:\\xampp\\htdocs\\view\\cadastro-produto.php";
      } 

    }

    if($_GET['url'] == "produto/del/e"){
      require "C:\\xampp\\htdocs\\src\\controller\\ProdutoController.php";

      if(isset($_POST['id-produto'])){
        $_GET['url'] = "/";

        $produtoController = new ProdutoController();

        $idProduto = $_POST['id-produto'];

        $produtoController->deleteProduto($idProduto);

        header("location: /usuario");

      } 
    }

    if($_GET['url'] == "usuario/logoff"){
      require "C:\\xampp\\htdocs\\src\\controller\\UsuarioController.php";
      session_start();
      
      $usuarioController = new UsuarioController();

      $usuarioController->logoffUsuario();
      
      $_GET['url'] = "/";

      header("location: /usuario");

    }

    if($_GET['url'] == "usuario/del"){
      require "C:\\xampp\\htdocs\\src\\controller\\UsuarioController.php";
     
      if(isset($_SESSION['id-usuario'])){
        $_GET['url'] = "/";

        $usuarioController = new UsuarioController();

        $idUsuario = $_SESSION['id-usuario'];

        $usuarioController->deleteUsuario($idUsuario);

        header("location: /");

      } 
    }

    if($_GET['url'] == "produto/edit"){
      
      session_start();

      if(isset($_SESSION['email-usuario'])){
        require "C:\\xampp\\htdocs\\src\\controller\\ProdutoController.php";
        
        var_dump($_POST["id-produto"]);

        $produtoController = new ProdutoController();

        $produto = new Produto();
        $produto->setId($_POST["id-produto"]);
        $produto->setNome($_POST["nome-produto"]);
        $produto->setDescricao($_POST["descricao-produto"]);
        $produto->setValor($_POST["valor-produto"]);
        $produto->setQuantidade($_POST["quantidade-produto"]);

        $result = $produtoController->updateProduto($produto);

        header("location: /usuario");

      } else {
        header("location: /");
      }

    }

    if($_GET['url'] == "usuario/todos"){
      require "C:\\xampp\\htdocs\\src\\controller\\UsuarioController.php";

      if(isset($_SESSION['email-usuario'])){
        require "C:\\xampp\\htdocs\\view\\list-usuario.php";
      } else {
        header("location: /");
        
      }
    }

    

  } else {
    require "C:\\xampp\\htdocs\\view\\template-index.php";
  }

?>

