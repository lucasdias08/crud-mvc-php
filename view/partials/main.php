<?php
  
  include "C:\\xampp\\htdocs\\src\\controller\\ProdutoController.php";
  
  $produtoController = new ProdutoController();
  $produtos = $produtoController->indexProduto();

?>
<main>  
        <div style="background-image: url('public/img//main.jpg');" class="position-relative overflow-hidden p-3 p-md-5 text-center w-100">
          <?php
            if(isset($_GET['resp'])){
              if($_GET['resp'] == "Usuário cadastrado com sucesso"){
                echo "<h2 class='text-center text-success'>Usuário cadastrado com sucesso. &#9989</h2>";
              } else {
                echo "<h2 class='text-center text-danger'>E-mail ja existente. Tente novamente. &#10060</h2>";
              }
              
            }
            unset($_GET['resp']);
          ?>
          <div style="background-color: rgba(248, 249, 250, 0.2);" id="anuncio" class="col-md-5 mb-3 mx-auto my-5 bg-light">
            <h1 id="titulo-anuncio" class="display-4 font-weight-normal">Anuncie seu produto esportivo</h1>
            <p id="texto-titulo" class="lead font-weight-normal">Encontre rapidamente um interessado mais próximo. E melhor: de sua confiança 	&#128513;</p>
            <a class="btn btn-outline-secondary" href="/cadastro/usuario">Quero anunciar</a>
          </div>
        </div>
  
          <?php
            $j = 0;
            $i = 0;
            if($produtos != null){
              foreach($produtos as $produto){
                $i++;
                echo "<div class='windows container w-100 text-center align-items-center d-inline mt-5'>";
                    echo "<div class='bg-dark pt-3 px-3 text-white overflow-hidden w-75 mx-auto'>";
                      echo "<div class='my-3 p-3'>";
                        echo "<h2 class='display-5'>". $produto['nome_produto'] . "</h2>";
                        echo "<p class='lead'>". $produto['descricao_produto'] ."</p>";
                      echo "</div>";
                      echo "<div class='bg-light shadow-sm mx-auto h-50' style='width: 80%; height: 50px; border-radius: 21px 21px 0 0'>";
                        echo "<div class='w-100 mb-2'>";
                          echo "<img src='" . substr($produto['src_img_produto'],16) . "' style='max-width: 100%; border-top-left-radius: 15px; border-top-right-radius: 15px;'>";
                            echo "<div class='d-flex w-100'>";
                              echo "<div class='w-50'>";
                                echo "<p class='text-dark mt-4 border ml-1 rounded text-center' style='font-size: 20px;'>R$ ". $produto['valor_produto'] ."</p>";
                              echo "</div>";
                              echo "<button class='btn btn-dark w-50 m-2 mt-2 rounded' data-toggle='modal' data-target='#modal-info-". $i . "'>";
                                echo "Me interessou! &#128565;";
                              echo "</button>";
                            echo "<div>";
                          echo "</div>";
                        echo "</div>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
  
                $usuario = $produtoController->indexDadosUsuario($produto["id_usuario_fk"]);
  
                echo "<div class='modal fade' id='modal-info-". $i . "' tabindex='-1' aria-labelledby='modal-poduto'>";
                  echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                    echo "<div class='modal-content'>";
                      echo "<div class='modal-header bg-dark text-white'>";
                          echo "<h5 class='modal-title mx-auto'>". $produto['nome_produto'] ."</h5>";
                      echo "</div>";
                         
                      echo "<div class='modal-body text-dark'>";
                        echo "<p><b>Valor do produto</b>: R$ ". $produto['valor_produto'] ."</p>";
                        echo "<p><b>Vendedor</b>: ". $usuario["nome_usuario"] ."</p>";
                        echo "<p><b>Phone</b>: ". $usuario["phone_usuario"] ."</p>";
                        echo "<p><b>Cep</b>: ". $usuario["cep_usuario"] ."</p>";
                      echo "</div>";
                         
                      echo "<div class='modal-footer'>";
                        echo "<button type='button' class='btn btn-dark' data-dismiss='modal'>Show! &#129322;</button>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";    
              }
            } else {
                echo "<div style='background-color: rgba(248, 249, 250, 0.2);' class='jumbotron jumbotron-fluid mx-auto'>";
                  echo "<div class='container'>";
                    echo "<h1 class='display-4'>Nenhum produto disponível</h1>";
                    echo "<p class='lead'>Se ninguém anuncia, você pode ser o primeiro. É só se cadastrar e anunciar &#129322</p>";
                  echo "</div>";
                echo "</div>";
            }
          ?>
</main>
