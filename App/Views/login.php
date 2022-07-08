<div class='container-fluid container-login'>
    <form id="login" class="form-control" method="POST" action="<?= HTTP_PAGE; ?>login">
    <div class="mb-3">
        <label for="email" class="form-label">Digite seu E-mail:</label>
        <input type="email"  class="form-control" id="email" name="email" placeholder="nome@exemplo.com" autocomplete="email" inputmode="email" required />
    </div>
    <div class="mb-3">
        <label for="senha" class="form-label">Digite sua senha:</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" autocomplete="current-password" inputmode="verbatim" required />
        <div class="invalid-feedback ">Sua senha precisa ter: No mínimo 8 caracteres, 1 letra maiúsculas, 1 número e 1 símbolo (!@#$%&*?)</div>
    </div>
    <div id="alerta"></div>
    <div class="text-center"><button type="submit" class="btn btn-primary">Log in</button></div>
    </form>
</div>