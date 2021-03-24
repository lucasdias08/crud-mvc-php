<header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/"><u>OLSports</u></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active ml-5">
              <a class="nav-link" href="/">Principal</a>
            </li>
            <li id="nav-cad" class="nav-item ml-5">
              <a class="nav-link" href="/cadastro/usuario">Cadastrar-se</a>
            </li>
          </ul>  
          <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#modal-login">Login</button>
        </div>
    </nav>

    <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-dark text-white">
            <h5 class="modal-title mx-auto">LOGIN</h5>
          </div>
          <div class="modal-body">
            
            <section class="d-md-inline container w-100 align-items-center">
              <form class="w-50 mx-auto mt-5" method="POST" action="/usuario/log">
              <div class="form-group">
                  <label for="input-email">E-mail</label>
                  <input type="email" class="form-control" name="email-usuario" id="email-usuario" placeholder="e-mail" required>
                  <input style="color: #e9ecef;" type="password" class="form-control d-none" name="op" id="usuario-email" placeholder="senha" value="log" readonly>
              </div>
              <div class="form-group">
                  <label for="input-password">Senha</label>
                  <input type="password" class="form-control" name="senha-usuario" id="senha-usuario" placeholder="senha" required>
              </div>
              <div class="form-group text-center d-md-flex">
                  <input type="submit" class="form-control btn btn-success w-100" id="input-submit" value="ENTRAR">
              </div>
              </form>
          </section>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar &#10060;</button>
          </div>
        </div>
    </div>
</header>