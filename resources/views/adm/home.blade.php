@extends('layouts.app_multi')

@section('content')
      <!-- BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB -->
          <ol class="breadcrumb bg-dark">
            <a class="text-white" href="#">
              <i class="fa fa-sort-amount-asc fa-lg text-white"></i>&nbsp; FLUXOS
            </a>
            <div class="col-md-1 text-right">
              <a class="text-white" href="" title="Voltar">
                <i class="fa fa-arrow-circle-left fa-lg" aria-hidden="true"></i>
              </a>
            </div>
          </ol>
      <!-- BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB BREADCRUMB -->

      <div class="row">
        <div class="col-12">
          <h1>Blank ADM</h1>
          <p>This is an example of a blank page that you can use as a starting point for creating new ones.</p>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    

@endsection
