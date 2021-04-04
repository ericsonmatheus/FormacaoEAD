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
              <li class="breadcrumb-item"><a href="{{route('search.cpf')}}">Diplomas</a></li>
              <li class="breadcrumb-item active">CPF</li>
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
            <h3 class="card-title">Buscar pelo CPF</h3>
            <div class="card-tools">
              <form action="{{route('find.cpf')}}">  
                @csrf
                <div class="input-group input-group-sm" style="width: 250px;">
                  <input type="text" name="search" id="campoCPF" class="form-control float-right" placeholder="Digite o Nº do CPF">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </form>
              </div>
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
  @include('site.footer')