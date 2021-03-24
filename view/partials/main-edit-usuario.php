<?php
    if(!isset($_SESSION)){
        session_start();       
    }

?>
<main>
    <section class="d-md-inline container w-100 align-items-center">
        <h1 class="align-items-center text-center mt-1">
            <p>Editar dados do usuário</p>
        </h1>
        <form class="w-50 mx-auto mt-5" method="POST" action="/usuario/edit/e">
        <div class="form-group">
            <label for="nome-usuario">Nome</label>
            <?php
                echo "<input type='text' class='form-control' name='nome-usuario' id='input-nome' placeholder='nome' value='" . $_SESSION['nome-usuario'] . "' required>";
            ?>
            <input style="color: #e9ecef;" type="password" class="form-control d-none" name="op" id="input-op" placeholder="senha" value="up" readonly>
        </div>
        <div class="form-group">
            <label for="email-usuario">E-mail</label>
            <?php
                echo "<input type='email' class='form-control' name='email-usuario' id='input-email' placeholder='e-mail' value='" . $_SESSION['email-usuario'] . "' required>";
            ?>
        </div>
        <div class="form-group">
            <label for="phone-usuario">Phone</label>
            <?php
                echo "<input type='text' class='form-control' name='phone-usuario' id='input-email' placeholder='phone' value='" . $_SESSION['phone-usuario'] . "' required>";
            ?>
        </div>
        <div class="form-group">
            <label for="cep-usuario">Cep</label>
            <?php
                echo "<input type='text' class='form-control' name='cep-usuario' id='input-password' placeholder='cep' value='" . $_SESSION['cep-usuario'] . "' required>";
            ?>
        </div>
        <div class="form-group">
            <label for="senha-usuario">Senha</label>
            <?php
                echo "<input type='password' class='form-control' name='senha-usuario' id='input-password' placeholder='senha' value='" . $_SESSION['senha-usuario'] . "' required>"
            ?>
        </div>
        <div class="form-group text-center">
            <input type="submit" class="form-control btn btn-success w-75 m-2" id="input-submit" value="Editar">            
        </div>
        </form>
        <div class='container mx-auto w-100 text-center'>
            <button class="form-control btn btn-danger w-50 m-2" id="input-submit" data-toggle="modal" data-target="#modal-delete">Excluir conta</button>
        </div>
        
    </section>

    <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                <h5 class="modal-title mx-auto">EXCLUIR CONTA</h5>
            </div>
            <div class="modal-body">        
                <section class="d-md-inline container w-100 align-items-center">
                <h1 class="align-items-center text-center mt-1">
                    <p>Tem certeza disso?</p>
                </h1>
                <div class="w-100 mx-auto mt-5">
                    <div class="container d-flex">
                        <a href="del">
                            <button type="submit" class="btn btn-primary col">Sim  &#128075;</button>
                        </a>
                        <button type="button" class="btn btn-danger col" data-dismiss="modal">Cancelar &#10060;</button>
                    </div>
                </div>
                </section>
            </div>
        </div>
  </div>
</main>
