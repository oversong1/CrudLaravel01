<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="/s">Lavarel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Produtos</a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>

    @if($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <strong> {{ $message }}</strong>  
      </div>
    @endif

    <div class="container">
        <h1>Criar Produto</h1>
        <div class="contaier">
          <div class="row justify-content-center">
            <div class="col-sm-8">
              <div class="card mt-3 p-3">
                <h3>Produto Edição #{{$product->id}}</h3>
                {{--precisa do / no começo para nao dar erro de rota   --}}
                {{--Exemplo /products/store--}}
                <form method="POST" action="/products/{{$product->id}}/update" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-2">
                    <label for="">Name</label>
                    <input 
                      type="text" 
                      name="name" 
                      class="form-control"
                      value="{{ old('name', $product->name)}}"
                    >
                    @if($errors->has('name'))
                      <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                  </div>
                  <div class="form-group mb-2">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" rows="4">{{ old('description',  $product->description)}}</textarea>
                    @if($errors->has('description'))
                    <span class="text-danger">{{$errors->first('description')}}</span>
                  @endif
                  </div>
                  <div class="form-group mb-2">
                    <label for="">Imagem</label>
                    <input type="file" class="form-control" name="image" >
                    @if($errors->has('image'))
                    <span class="text-danger">{{$errors->first('image')}}</span>
                  @endif
                  </div>

                  <button type="submit" class="btn btn-dark mt-2">Enviar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

