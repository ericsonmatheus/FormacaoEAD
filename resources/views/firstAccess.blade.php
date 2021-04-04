<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Formação EAD | Login</title>
  </head>
  <body id="background">
    <div class="card" id="telaLogin">
        <div class="card-body">
          <form action="{{ route('admin.first.do', [session('sessionAd')->idadm])}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="alert alert-danger" id="MessageAlert">
                    <ul>
                        <li>Este é o seu primeiro acesse, por favor, altere sua senha</li>
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label for="labelPassword" class="form-label">Digite a Senha</label>
                <input type="password" name="password" class="form-control" id="labelPassword" placeholder="Insira sua senha">
              </div>
            <div class="mb-3">
              <label for="labelPassword" class="form-label">Confirme a Senha</label>
              <input type="password" name="confirmPassword" class="form-control" id="labelPassword" placeholder="Confirme sua senha">
            </div>
            <div class="d-grid" id="btnLogin">
                <button type="submit" class="btn btn-dark">Guardar</button>
            </div>

            @if($errors->any())
              <div class="alert alert-danger" id="MessageAlert">
                <ul>
                  @foreach ($errors->all() as $message)
                    <li>{{$message}}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            @if(isset($erro))
              <div class="alert alert-danger text-center" id="MessageAlert">{{$erro}}</div>
            @endif
          </form>
        </div>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  </body>
</html>