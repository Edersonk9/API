<!-- PAINEL MODAL -->
<!--PAINEL MODAL Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Deseja realmente sair?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Clique em "Confirmar" para sair.</div>
      <div class="modal-footer">

          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" name="button">Confirma</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!--PAINEL MODAL Logout Modal-->
<!-- PAINEL MODAL NAMEMODAL -->
<div class="modal fade" id="newarqModal" tabindex="-1" role="dialog" aria-labelledby="newarqModallLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newarqModalLabel"><i class="fa fa-file"></i> Criar novo arquivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="" action="" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <input type="hidden" name="ref_pai" value="">

          <label for="pasta">Nome do arquivo </label>
          <input class="form-control" id="pasta" type="text" name="pasta" value="" required autofocus>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Criar a pasta</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- PAINEL MODAL NAMEMODAL -->
<!-- PAINEL MODAL -->
