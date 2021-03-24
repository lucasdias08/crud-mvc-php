<?php
  
  require "C:\\xampp\\htdocs\\src\\controller\\ProdutoController.php";
  
  $produtoController = new ProdutoController();

  $idUsuario = $_SESSION['id-usuario'];
  $produtos = $produtoController->indexProdutosUsuario($idUsuario);

?>
<main>
<div class='d-md-inline container w-100 my-md-3 pl-md-3 text-center'>
          <?php
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
                      echo "<div class='bg-light shadow-sm mx-auto h-25' style='width: 80%; height: 100px; border-radius: 21px 21px 0 0'>";
                        echo "<div class='w-100 mb-2'>";
                          echo "<img src='" . substr($produto['src_img_produto'],16) . "' style='max-width: 100%; border-top-left-radius: 15px; border-top-right-radius: 15px;'>";
                            
                          echo "<div class='d-flex w-100'>";
                              
                              echo "<div class='col w-25 mt-3'>";
                                echo "<p class='text-dark mt-4 border ml-1 rounded text-center w-100' style='font-size: 20px;'>R$ ". $produto['valor_produto'] ."</p>";
                              echo "</div>";
                              
                              echo "<div class='col d-inline w-75'>";
                                echo "<button class='btn btn-danger m-2 mt-2 w-100 rounded' data-toggle='modal' data-target='#modal-del-". $i . "'>";
                                    echo "Excluir produto &#10006;";
                                echo "</button>";

                                echo "<button class='btn btn-primary m-2 mt-2 w-100 rounded' data-toggle='modal' data-target='#modal-info-". $i . "'>";
                                  echo "Editar &#128565;";
                                echo "</button>";
                              echo "</div>";

                            echo "</div>";

                        echo "</div>";
                      echo "</div>";
                    echo "</div>";



                echo "</div>";
              echo "</div>";

          
  
                    $usuario = $produtoController->indexDadosUsuario($produto["id_usuario_fk"]);
  
                    echo "<div class='modal fade' id='modal-info-". $i . "' tabindex='-1' aria-labelledby='modal-poduto'>";
                    echo "<div class='modal-dialog modal-dialog' role='document'>";
                      echo "<div class='modal-content'>";
                        echo "<div class='modal-header bg-dark text-white'>";
                          echo "<h2 class='modal-title mx-auto'>Editar produto</h5>";
                        echo "</div>";

                      echo "<div class='modal-body text-dark'>";
                        echo "<form class='w-50 mx-auto mt-2' method='POST' action='produto/edit' enctype='multipart/form-data'>";
                          echo "<div class='form-group'>";
                            echo "<label for='nome-produto'>Nome</label>";
                            echo "<input type='text' class='form-control' name='nome-produto' id='nome-produto' placeholder='nome' value='". $produto['nome_produto'] . "' required>";
                            echo "<input style='color: #e9ecef;' type='password' class='form-control d-none' name='id-produto' id='input-op' placeholder='senha' value='" . $produto['id_produto'] . "' readonly>";
                          echo "</div>";
                          echo "<div class='form-group'>";
                            echo "<label for='descricao-produto-" . $i . "'>Descrição</label>";
                            echo "<textarea class='form-control' name='descricao-produto' id='descricao-produto-" . $i . "' placeholder='descrição' required>" . $produto['descricao_produto'] . "</textarea>";
                          echo "</div>";
                          echo "<div class='form-group'>";
                            echo "<label for='quantidade-produto'>Quantidade</label>";
                            echo "<input type='number' class='form-control' name='quantidade-produto' id='quantidade-produto' placeholder='quantidade' value='" . $produto['quantidade_produto'] . "' required>";
                          echo "</div>";
                          echo "<div class='form-group'>";
                            echo "<label for='valor-produto'>Valor</label>";
                            echo "<input type='number' class='form-control' name='valor-produto' id='valor-produto' placeholder='valor' value='" . $produto['valor_produto'] . "' required>";
                          echo "</div>";
                          echo "<div class='form-check'>";
                            echo "<input onClick='checkbox(".$i.")' class='form-check-input' type='checkbox' id='troca-foto-".$i."'>";
                            echo "<label class='form-check-label' for='troca-foto'>";
                              echo "Trocar foto";
                            echo "</label>";
                          echo "</div>";
                          echo "<div class='form-group d-none' id='troca-image-" . $i . "'>";
                            echo "<input type='file' name='file-img-" . $i . "' class='form-control-file' id='file'>";
                          echo "</div>";
                          echo "<div class='form-group text-center d-md-flex'>";
                            echo "<button class='form-control btn btn-danger w-50 m-2' id='btt-cancelar-" . $i . "' data-dismiss='modal'>Cancelar</button>";
                            echo "<input type='submit' class='form-control btn btn-success w-50 m-2' id='input-submit' value='Editar'>";
                          echo "</div>";
                        echo "</form>";

                    echo "</div>";
                  echo "</div>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
              echo "</div>";

              echo "<div class='modal fade' id='modal-del-". $i . "' tabindex='-1' aria-labelledby='exampleModalLabel'>";
                echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                  echo "<div class='modal-content'>";
                    echo "<div class='modal-header bg-dark text-white'>";
                      echo "<h5 class='modal-title mx-auto'>Excluir ". $produto['nome_produto'] ."</h5>";
                    echo "</div>";
                    echo "<div class='modal-body text-dark'>";
                      echo "<p><b>Valor do produto</b>: R$ ". $produto['valor_produto'] ."</p>";
                      echo "<p><b>Quantidade</b>: ". $produto["quantidade_produto"] ."</p>";
                      echo "<p><b>Descrição</b>: ". $produto["descricao_produto"] ."</p>";
                    echo "</div>";
            
                    echo "<h1 class='align-items-center text-center mt-1'>";
                      echo "<p class='text-danger'>Tem certeza disso?</p>";
                    echo "</h1>";

                      echo "<div class='w-100 mx-auto mt-5'>";
                        echo "<div class='container mb-2'>";
                          echo "<form class='w-100 d-flex' action='produto/del/e' method='POST'>";
                            echo "<button type='submit' class='btn btn-primary w-100 col' name='id-produto'>";
                              echo "Sim  &#128075;";
                            echo "</button>";
                            echo "<button type='button' class='btn btn-danger col' data-dismiss='modal'>Cancelar &#10060;</button>";
                            echo "<input type='password' class='form-control d-none' name='id-produto' id='id-produto' value='" . $produto["id_produto"] . "' required>";
                          echo "</form>";
                        echo "</div>";
                      echo "</div>";
                    echo "</section>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
              }
            } else {
                echo "<div style='background-color: rgba(248, 249, 250, 0.2);' class='jumbotron jumbotron-fluid mx-auto'>";
                  echo "<div class='container m-5'>";
                    echo "<h1 class='display-4'>Nenhum produto disponível</h1>";
                    echo "<p class='lead'>Se ninguém anuncia, você pode ser o primeiro. É só se cadastrar e anunciar &#129322</p>";
                  echo "</div>";
                echo "</div>";
            }
            
          ?>
        </div>    
</main>