<input type="hidden" name="paginaAtual" value="empresas">
<script src="js/leads.js"></script>
<div class="w-100">
    <div class="scroller scroller-left float-start mt-2"><i class="bi bi-caret-left-fill"></i></div>
    <div class="scroller scroller-right float-end mt-2"><i class="bi bi-caret-right-fill"></i></div>
    <div class="wrapper-nav navLeads">
        <nav class="nav nav-tabs list mt-2" id="myTab" role="tablist">
            <a class="nav-item nav-link pointer active text-black" data-page="Site" data-bs-toggle="tab" data-bs-target="#tab1" role="tab" aria-controls="public" aria-selected="true">Site</a>
            <a class="nav-item nav-link pointer text-black" data-page="PIQ" data-bs-target="#tab3" role="tab" data-bs-toggle="tab">PIQ</a>
            <a class="nav-item nav-link pointer text-black" data-page="WhatsApp" data-bs-target="#tab6" role="tab" data-bs-toggle="tab">WhatsApp</a>
        </nav>
    </div>
    <div class="tab-content p-3" id="myTabContent">
        <!-----SITE---->
        <div role="tabpanel" class="tab-pane fade active show mt-2" id="tab1" aria-labelledby="public-tab" >
            <!--CACEBALHO-->
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <select class="form-control" name="actions">
                        <option>Ações</option>
                        <option value="Exportar">Exportar</option>
                        <option value="Limpar">Limpar</option>
                    </select>
                </div>
            </div>
            <!--FIMCABECALHO-->
            <hr>
            <table class="table table-mobile-responsive">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody id="Site">
                    
                </tbody>
            </table>
        </div>
        <!-----PIQ---->
        <div class="tab-pane fade mt-2" id="tab3" role="tabpanel" aria-labelledby="group-dropdown2-tab" >
            <!--CACEBALHO-->
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <select class="form-control" name="actions">
                        <option>Ações</option>
                        <option value="Exportar">Exportar</option>
                        <option value="Limpar">Limpar</option>
                    </select>
                </div>
            </div>
            <!--FIMCABECALHO-->
            <hr>
            <table class="table table-mobile-responsive">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody id="PIQ">
    
                </tbody>
            </table>
        </div>
        <!-----ZAP---->
        <div class="tab-pane fade mt-2" id="tab6" role="tabpanel" aria-labelledby="group-dropdown2-tab" >
            <!--CACEBALHO-->
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <select class="form-control" name="actions">
                        <option>Ações</option>
                        <option value="Exportar">Exportar</option>
                        <option value="Limpar">Limpar</option>
                    </select>
                </div>
            </div>
            <!--FIMCABECALHO-->
            <hr>
            <table class="table table-mobile-responsive">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody id="WhatsApp">
                    
                </tbody>
            </table>
        </div>
        <!-----FIM---->
    </div>
</div>
</div>