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
          <a class="navbar-brand" href="/">Lavarel</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Produtos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="products/create">Novo Produto</a>
              </li>
             
            </ul>
          </div>
        </div>
    </nav>
    
      <div class="container">
        <div class="float-end">
          <a href="products/create" class="btn btn-dark mt-2">Novo Produto</a>
        </div>

        <div class="mt-3">
          <h2>Tabela</h2>
          <p>Usúarios</p>            
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['name']}}</td>
                <td>{{$product['description']}}</td>
                <td>
                  <img src="products/{{ $product->image }}" class="rounded-circle" alt="" width="30" height="30" />
                </td>
                {{-- <td class="d-flex justify-content-around"> --}}
                <td class="d-flex gap-3">
                  <a href="products/{{ $product->id}}/edit" class="btn btn-success">Editar</a>
                  
                  {{-- Forma 01 funcional --}}
                  {{-- <a href="products/{{ $product->id}}/delete" class="btn btn-danger">Excluir</a> --}}

                  <form action="products/{{ $product->id}}/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                      Deletar
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

