<div class="modal fade " id="alerta" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Desativação de empresa</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-controls">
          <input type="hidden" name="IDEmpresa" value="">
          <input type="hidden" name="statusEmpresa" value="">
                <div class="col-sm-12 desativaQuiz">
                    <label for="nomeFantasia">Qual a data e hora que eu ganhei meu primeiro computador?</label>
                    <input type="datetime-local" name="desativaQuiz" class="form-control">
                    <div class="error-input text-danger">
                      Preenchimento incorreto!
                    </div>
                </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="botao btn btn-primary bt_enviar_quiz_status">Salvar</button>
        <button type="button" class="botao btn btn-primary bt_enviar_quiz_excluir">Salvar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
