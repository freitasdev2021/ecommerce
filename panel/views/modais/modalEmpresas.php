<div class="modal fade " id="cadastroEmpresa" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastrar Empresa</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCadastroEmpresa" class="form-controls">
          <input type="hidden" id="IDEmpresa" value="">
          <input type="hidden" id="statusEmpresa" value="1">
            <div class="row">
                <div class="col-sm-4 nomeFantasia">
                    <label for="nomeFantasia">Nome Fantasia</label>
                    <input type="name" id="nomeFantasia" class="form-control" maxlength="50">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
                <div class="col-sm-4 razaoSocial">
                    <label for="razaoSocial">Razão Social</label>
                    <input type="name" id="razaoSocial" class="form-control" maxlength="50">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
                <div class="col-sm-4 cnpjEmpresa">
                    <label for="cnpjEmpresa">CNPJ</label>
                    <input type="text" id="cnpjEmpresa" class="form-control">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary bt_salvar_empresa">Salvar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
