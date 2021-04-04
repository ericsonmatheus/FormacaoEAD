@include('headerAdm')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Todos os Diplomas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Quadro de Todos os Cadastrados</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="card-button text-center">
                  <a href="{{route('admin.new')}}">
                    <button class="btn btn-outline-dark">Cadastrar novo</button>
                  </a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nº do Diploma</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Escolaridade</th>
                    <th>Data de Registro</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->desregister }}</td>
                        <td>{{ $student->desname }}</td>
                        <td>{{ $student->desdoc }}</td>
                        <td>{{ $student->desformation }}</td>
                        <td>{{ date('d/m/Y H:i', strtotime($student->created_at)) }}</td>
                        <td class="text-center">
                          <a href="/admin/editar/{{$student->id}}"><i class="fas fa-user-edit" id="edit"></i></a>
                        </td>
                        <td class="text-center">
                          <a href="/admin/destroy/{{$student->id}}" onclick="return confirm('Deseja realmente remover este registro?')"><i class="fas fa-trash-alt" id="delete"></i></a>  
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Nº do Diploma</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Escolaridade</th>
                    <th>Data Registro</th>
                    <th>Editar</th>
                    <th>Apagar</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('footerAdm')