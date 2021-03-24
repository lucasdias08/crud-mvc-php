<main>
    <section class="d-md-inline container w-100 align-items-center">
        <h1 class="align-items-center text-center mt-1">
            <p>Cadastro de usuário</p>
        </h1>
        <form class="w-50 mx-auto mt-5" method="POST" action="/cadastro/usuario/e">
        <div class="form-group">
            <label for="nome-usuario">Nome</label>
            <input type="text" class="form-control" name="nome-usuario" id="input-nome" placeholder="nome" required>
        </div>
        <div class="form-group">
            <label for="email-usuario">E-mail</label>
            <input type="email" class="form-control" name="email-usuario" id="input-email" placeholder="e-mail" required>
        </div>
        <div class="form-group">
            <label for="phone-usuario">Phone</label>
            <input type="text" class="form-control" name="phone-usuario" id="input-email" placeholder="phone" required>
        </div>
        <div class="form-group">
            <label for="cep-usuario">Cep</label>
            <input type="text" class="form-control" name="cep-usuario" id="input-password" placeholder="cep" required>
        </div>
        <div class="form-group">
            <label for="senha-usuario">Senha</label>
            <input type="password" class="form-control" name="senha-usuario" id="input-password" placeholder="senha" required>
        </div>
        <div class="form-group text-center d-md-flex">
            <button class="form-control btn btn-danger w-50 m-2" id="input-submit">Cancelar</button>
            <input type="submit" class="form-control btn btn-success w-50 m-2" id="input-submit" value="Cadastrar">            
        </div>
        </form>
    </section>
</main>
