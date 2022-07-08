<?php
    if ((isset($_SESSION)) && (isset($_SESSION['logado'])) && ($_SESSION['logado'] == "SIM")){
    ?>
        <div class="container-fluid container-home bg-light text-primary">
            <h1 class="text-center braketop40">Bem vindo(a) à plataforma</h1>
            <p class="brakeleft40 brakeright40 brakebottom40 braketop40">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint cupiditate necessitatibus, quibusdam vitae commodi, provident, sed nisi laudantium est magni eum. Magni, voluptates molestiae sapiente id praesentium non ratione accusantium!</p>
        </div>
    <?php
    } else {
        include __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/login.php');
    }
?>