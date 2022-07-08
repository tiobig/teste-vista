<?php
    if ((isset($_SESSION)) && (isset($_SESSION['logado'])) && ($_SESSION['logado'] == "SIM")){
        extract($dataModel);
        extract($dadosLocador);
        $dataModel = $listaImoveis;
    ?>
        <div class="container-fluid container-home bg-light text-primary">
            <h1 class="text-center braketop40 brakebottom20">Imóveis de <?= $NomeLocadores; ?></h1>
            <p class="brakeleft80 brakeright80 text-dark text-center">Nome: <?= $NomeLocadores; ?></p>
            <p class="brakeleft80 brakeright80 text-dark text-center">E-mail: <?= $EmailLocadores; ?></p>
            <p class="brakeleft80 brakeright80 text-dark text-center">Telefone: <?= telefone($TelefoneLocadores); ?></p>
            <h2 class="text-center braketop20 brakebottom20">Imóveis</h2>
            <table id="table" class="tablesorter ui-table-reflow text-center brakeleft20 brakeright20">
                <thead>
                    <tr>
                        <th data-name="Endereço" data-placeholder="Endereço">Endereço</th>
                        <th data-name="Cidade" data-placeholder="Cidade">Cidade</th>
                        <th data-name="UF" data-placeholder="UF">UF</th>
                        <th data-name="CEP" data-placeholder="CEP">CEP</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            
                foreach ($dataModel as $dadosModelo):
                    extract($dadosModelo);
                    echo "                <tr id=\"$IdImoveis\">
                    <td data-label=\"Endereço\" data-title=\"Endereço\" class=\"align-middle\"><a href=\"".HTTP_PAGE."imoveis/$IdImoveis\" title=\"Visualizar dados do imóvel\" alt=\"Visualizar dados do imóvel\">$Rua, $Numero - $complemento</a></td>
                    <td data-label=\"Cidade\" data-title=\"Cidade\" class=\"align-middle\">$cidade</td>
                    <td data-label=\"UF\" data-title=\"UF\" class=\"align-middle\">$uf</td>
                    <td data-label=\"CEP\" data-title=\"CEP\" class=\"align-middle\">".substr($cep, 0, 5)."-".substr($cep, -3)."</td>
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

        </div>

        
    <?php
    } else {
        include __DIR__.str_replace('/',DIRECTORY_SEPARATOR,'/login.php');
    }
?>