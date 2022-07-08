<?php
function active($pagina){
  if ((isset($_GET['a'])) && ($_GET['a'] == $pagina)):
    echo ' active';
  endif;
}
?>

<nav class="navbar sticky-top navbar-expand-md navbar-dark bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?= HTTP_PAGE; ?>">
      <img src="<?= HTTP_PAGE; ?>images/assets/logo.png" alt="Logo Empresa" height="30">
    </a>
    <?php
    if ((isset($_SESSION)) && (isset($_SESSION['logado'])) && ($_SESSION['logado'] == "SIM")){
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link<?php
          if ((!isset($_GET['a'])) || ($_GET['a'] == 'home')) {
            echo ' active';
          }
          ?>" href="<?= HTTP_PAGE; ?>">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php active('imoveis'); ?>" href="<?= HTTP_PAGE; ?>imoveis">Imoveis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php active('locadores'); ?>" href="<?= HTTP_PAGE; ?>locadores">Locadores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php active('locatarios'); ?>" href="<?= HTTP_PAGE; ?>locatarios">Locatários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?php active('usuarios'); ?>" href="<?= HTTP_PAGE; ?>usuarios">Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= HTTP_PAGE; ?>logout">Sair</a>
        </li>
      </ul>
    </div>
    <?php
    }
?>
  </div>
</nav>
