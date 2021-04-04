@include('headerAdm')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Diploma</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
              <li class="breadcrumb-item active">Editar</li>
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
            <h3 class="card-title">Editar Diploma</h3>
          </div>
          <!-- /.form-group-->
          <form action="/admin/put/{{$student->id}}" method="post">
              @csrf
              @method('PUT')
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Número do Registro</label>
                    <input type="text" name="registro" id="campoRegistro" class="form-control" style="width: 100%;" value="{{$student->desregister}}" autofocus>
                  </div>
                </div>
                <div class="col-md-7">
                  <!-- /.form-group -->
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control"  name="nome" style="width: 100%;" value="{{$student->desname}}">
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="campoCPF" value="{{$student->desdoc}}" class="form-control" style="width: 100%;">
                  </div>
                  <!-- /.form-group -->
                </div>
                <div class="col-md-7">
                  <div class="form-group">
                    <label>Nível de Escolaridade</label>
                    <select class="form-control select2"  name="formacao" style="width: 100%;">
                      @if($student->desformation = 'Fundamental')
                        <option selected>Fundamental</option>
                        <option >Médio</option>
                        <option >Superior</option>
                        <option >Técnico</option>
                      @elseif ($student->desformation = 'Médio')
                        <option >Fundamental</option>
                        <option selected>Médio</option>
                        <option >Superior</option>
                        <option >Técnico</option>
                      @elseif($student->desformation = 'Superior')
                        <option >Fundamental</option>
                        <option >Médio</option>
                        <option selected>Superior</option>
                        <option >Técnico</option>
                      @else
                        <option >Fundamental</option>
                        <option >Médio</option>
                        <option >Superior</option>
                        <option selected>Técnico</option>
                      @endif
                    </select>
                  </div>
                  <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <!-- button-submit-->
                <div class="col-md-6 text-center">
                  <div class="form-group">              
                    <button type="submit" class="btn btn-dark">Salvar</button>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <div class="form-group">              
                    <a href="{{route('admin.index')}}">
                      <button type="button" class="btn btn-danger">Cancelar</button>
                    </a>
                  </div>
                </div>
                @if($errors->all())
                  @foreach ($errors->all() as $error)
                  <div class="col-md-12 d-flex justify-content-center">
                    <div class="alert alert-danger text-center"  id="MessageAlert" role="alert">
                      {{$error}}
                    </div>
                  </div>
                  @endforeach
                @endif
              </div>
              </div>
            <div class="card-footer">
            </div>
          </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('footerAdm')