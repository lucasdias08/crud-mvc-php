<?php
  
  $usuarioController = new UsuarioController();
  $usuarios = $usuarioController->indexUsuario();

?>
<main>
    <div class="container mt-5 mb-5 pb-5">
        <table class="table table-hover w-50 mx-auto">
        <thead class="thead-dark text-center">
            <tr class='ml-4'>
                <th scope="col">ordem</th>
                <th scope="col">Todos usuários</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i = 1;
                foreach($usuarios as $usuario){
                    echo "<tr class='text-center'>";
                        echo "<th scope='row'>" . $i . "</th>";
                            echo "<td>" . $usuario['nome_usuario'] . "</td>";
                    echo "</tr>";

                    $i++;
                }
            ?>
            
        </table>
    </div>
    
</main>