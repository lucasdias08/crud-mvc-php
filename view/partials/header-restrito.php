<?php
  if(!isset($_SESSION)){
    session_start();

    header("location: /");
    if(isset($_SESSION['email-usuario'])){
        include "C:\\xampp\\htdocs\\v\\template-home.php";
    }   else {
        
    }
  }
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/usuario"><u>OLSports</u></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active ml-5">
            <a class="nav-link" href="/usuario">Início</a>
          </li>
          <li id="nav-cad" class="nav-item ml-5">
            <a class="nav-link" href="/usuario/cadastro/produto">Anunciar produto</a>
          </li>
          <li id="nav-cad" class="nav-item ml-5">
            <a class="nav-link" href="/usuario/todos">Concorrentes anunciantes</a>
          </li>
        </ul>  
        <a class="nav-link text-white" href="/usuario/edit">
            <?php 
              echo $_SESSION['nome-usuario']; 
            ?>
        </a>
        <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#modal-login">Sair</button>
      </div>
  </nav>

  <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header bg-dark text-white">
          <h5 class="modal-title mx-auto">LOGOFF</h5>
        </div>
        <div class="modal-body">        
          <section class="d-md-inline container w-100 align-items-center">
            <h1 class="align-items-center text-center mt-1">
                <p>Tem certeza disso?</p>
            </h1>
            <div class="w-100 mx-auto mt-5">
              <div class="container d-flex">
                <a class ="col w-100" href="/usuario/logoff">  
                  <button type="button" class="btn btn-primary">
                    Sim  &#128075;  
                  </button>
                </a>
                <button type="button" class="btn btn-danger col" data-dismiss="modal">Cancelar &#10060;</button>
              </div>
            </div>
          </section>
        </div>
      </div>
  </div>
</header>