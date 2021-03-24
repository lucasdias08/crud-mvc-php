<main>
    <section class="d-md-inline container w-100 align-items-center">
        <h1 class="align-items-center text-center mt-1">
            <p>Cadastro de Produto</p>
        </h1>
        <form class="w-50 mx-auto mt-5" method="POST" action="../../src/controller/ProdutoController.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome-usuario">Nome</label>
            <input type="text" class="form-control" name="nome-produto" id="nome-produto" placeholder="nome" required>
            <input style="color: #e9ecef;" type="password" class="form-control d-none" name="op" id="input-op" placeholder="senha" value="ins" readonly>
        </div>
        <div class="form-group">
            <label for="descricao-produto">Descrição</label>
            <textarea class="form-control" name="descricao-produto" id="descricao-produto" placeholder="descrição" required></textarea>
        </div>
        <div class="form-group">
            <label for="phone-usuario">Quantidade</label>
            <input type="number" class="form-control" name="quantidade-produto" id="input-email" placeholder="quantidade" required>
        </div>
        <div class="form-group">
            <label for="valor-produto">Valor</label>
            <input type="number" class="form-control" name="valor-produto" id="valor-produto" placeholder="valor" required>
        </div>
        <div class="form-group">
            <label for="file">Imagem</label>
            <input type="file" name="file-img" class="form-control-file" id="file" required>
        </div>
        <div class="form-group text-center d-md-flex">
            <input type="submit" class="form-control btn btn-danger w-50 m-2" id="input-submit" value="Cancelar">
            <input type="submit" class="form-control btn btn-success w-50 m-2" id="input-submit" value="Cadastrar">            
        </div>
        </form>
    </section>
</main>
