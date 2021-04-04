@include('site.header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Diplomas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('search.register')}}">Diplomas</a></li>
              <li class="breadcrumb-item active">Nº Registro</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Buscar por Nº do Registro</h3>
            <div class="card-tools">
              <form action="{{ route('find.register') }}" >
                @csrf
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="search" id="campoRegistro" class="form-control float-right" placeholder="Digite o Nº do Registro">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.form-group-->
          <!-- /.card-header -->
          
          @if(isset($student))
            @include('site.find')
          @else
            @include('site.searchEmpty')
          @endif

          @if($errors->all())
            @foreach ($errors->all() as $error)
            <div class="col-md-12 d-flex justify-content-center">
              <div class="alert alert-danger text-center"  id="MessageAlert" role="alert">
                {{$error}}
              </div>
            </div>
            @endforeach
          @endif
          
          <div class="card-footer">
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('site.footer')