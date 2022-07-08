<?php
    if ((isset($_SESSION)) && (isset($_SESSION['logado'])) && ($_SESSION['logado'] == "SIM")){
    ?>
        <div class="container-fluid container-home bg-light text-primary">
            <h1 class="text-center braketop40 brakebottom40">Página de gestão de locadores</h1>
            <p class="brakeleft80 brakeright80 text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint cupiditate necessitatibus, quibusdam vitae commodi, provident, sed nisi laudantium est magni eum. Magni, voluptates molestiae sapiente id praesentium non ratione accusantium!</p>
            <?php
                if (count($dataModel) > 0):
            ?>
            <h2 class="text-center braketop20 brakebottom20">Locadores</h2>
            <table id="table" class="tablesorter ui-table-reflow text-center brakeleft20 brakeright20">
                <thead>
                    <tr>
                        <th data-name="Nome" data-placeholder="Nome">Nome</th>
                        <th data-name="E-mail" data-placeholder="E-mail">E-mail</th>
                        <th data-name="Telefone" data-placeholder="Telefone">Telefone</th>
                        <th  class="tirafiltro" data-sorter="false" data-filter="false">Ações</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            
                foreach ($dataModel as $dadosModelo):
                    extract($dadosModelo);
                    echo "                <tr id=\"$IdLocadores\">
                    <td data-label=\"Nome\" data-title=\"Nome\" class=\"align-middle\"><a href=\"".HTTP_PAGE."locadores/$IdLocadores\" title=\"Visualizar dados de $NomeLocadores\" alt=\"Visualizar dados de $NomeLocadores\">$NomeLocadores</a></td>
                    <td data-label=\"Email\" data-title=\"Email\" class=\"align-middle\">
                        <a href=\"mailto:$EmailLocadores\" target=\"_blank\" title=\"Enviar e-mail para $EmailLocadores\" alt=\"Enviar e-mail para $EmailLocadores\">$EmailLocadores</a>
                    </td>
                    <td data-label=\"Telefone\" data-title=\"Telefone\" class=\"align-middle\">
                        <a href=\"tel:+55$TelefoneLocadores\" target=\"_blank\" title=\"Telefonar para $NomeLocadores\" alt=\"Telefonar para $NomeLocadores\">".telefone($TelefoneLocadores)."</a>
                        &nbsp;|&nbsp;
                        <a href=\"https://wa.me/55$TelefoneLocadores\" target=\"_blank\" title=\"Chamar $NomeLocadores no WhatsApp\" alt=\"Chamar $NomeLocadores no WhatsApp\"><i class=\"fab fa-whatsapp\"></i></a>
                    </td>
                    <td data-label=\"Editar\" class=\"align-middle\">
                        <div class=\"btn-group\">
                            <button type=\"button\" class=\"btn btn-default bg-primary text-light\" onClick=\"editar($IdLocadores)\"><i class=\"fas fa-user-edit\"></i></button>
                            <button type=\"button\" class=\"btn btn-default bg-primary text-light\" onClick=\"deletar($IdLocadores)\"><i class=\"fas fa-trash\"></i></button>
                    </div>
                    </td>
                </tr>
";

                endforeach;

            ?>
                </tbody>
            </table>
            <div class="text-center braketop20 brakebottom40">
                <div id="pager" class="pager text-small">
                    <form>
                        <i class="fas fa-fast-backward first"></i>
                        <i class="fas fa-step-backward prev"></i>
                        <span class="pagedisplay" data-pager-output-filtered="{startRow:input} &ndash; {endRow} / {filteredRows} of {totalRows} total rows"></span>
                        <i class="fas fa-step-forward next"></i>
                        <i class="fas fa-fast-forward last"></i>
                        <br>
                        <span>Registros por página: </span>
                        <select class="pagesize">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="all">Tudo</option>
                        </select>
                    </form>
                </div>
            </div>
            <?php
            else:
            ?>
            <div>Não há locadores cadastrados</div>
            <?php
            endif;
            ?>

            <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="labelEdit" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelEdit">Editar usuário</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formEditUser" class="form-control" method="POST" action="<?php echo HTTP_PAGE; ?>locadores/updateUserData">
                            <div class="modal-body">
                                <div class="row g-2 brakebottom10">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="editEmail" name="editEmail" inputmode="email" placeholder="nome@exemplo.com" value="" required />
                                        <label for="editEmail">E-mail:</label>
                                    </div>
                                </div>
                                <div class="row g-2 brakebottom10">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="editNome" name="editNome" inputmode="text" placeholder="Nome Completo" value="" required />
                                        <label for="editNome">Nome:</label>
                                    </div>
                                </div>
                                <div class="row g-2 brakebottom10">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="editTelefone" name="editTelefone" inputmode="tel" placeholder="DDD+Número" value="" minlength="10" maxlength="11" required />
                                        <label for="editTelefone">Telefone:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="btn-cancelar-perfil" data-bs-dismiss="modal" onClick="fechaModal('modalEdit', 'formEditUser');">Cancelar</button>
                                <input type="submit" class="btn btn-primary" value="Editar" />
                                <input type="hidden" id="IdLocadores" name="IdLocadores" value="" />
                                <div class="row g-2 braketop20 brakebottom10">
                                    <div class="text-center" id="alertaEdit"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="labelAdd" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="labelAdd">Adicionar locador</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="formAddUser" class="form-control" method="POST" action="<?php echo HTTP_PAGE; ?>locadores/addUserData">
                            <div class="modal-body">
                                <div class="row g-2 brakebottom10">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="addEmail" name="addEmail" inputmode="email" placeholder="nome@exemplo.com" value="" required />
                                        <label for="addEmail">E-mail:</label>
                                    </div>
                                </div>
                                <div class="row g-2 brakebottom10">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="addNome" name="addNome" inputmode="text" placeholder="Nome Completo" value="" required />
                                        <label for="addNome">Nome:</label>
                                    </div>
                                </div>
                                <div class="row g-2 brakebottom10">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="addTelefone" name="addTelefone" inputmode="tel" placeholder="DDD+Número" value="" minlength="10" maxlength="11" required />
                                        <label for="addTelefone">Telefone:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" id="btn-cancelar-perfil2" data-bs-dismiss="modal" onClick="fechaModal('modalAdd', 'formAddUser');">Cancelar</button>
                                <input type="submit" class="btn btn-primary" value="Cadastrar" />
                            </div>
                            <div class="row g-2 braketop20 brakebottom10">
                                <div class="text-center" id="alertaAdd"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="text-center brakebottom40"><button class="btn btn-primary" onclick="openModal('modalAdd')"><i class="fas fa-user-plus"></i> Adicionar Locador</button></div>
        </div>

        
    <?php
    } else {
        include __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/login.php');
    }
?>