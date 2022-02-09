@extends('layouts.main')
@section('content')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container card">
    <div class="row d-flex justify-content-center card-header">
        <div class="col-8">
            <h3>Página inicial</h3>
        </div>
    </div>
    <div class="card-body">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <h3>Pesquisar:</h3>
                </div>
                <div class="col-12 col-md-8">
                    <form action="{{route("home_search")}}" method="get">
                        <div class="d-flex justify-content-center row">
                            <div class="col-12 col-md-4">
                                <select name="categoria_search" class="form-control">
                                    <option value="" selected>Selecione uma Categoria</option>
                                    
                                    @foreach ($categorias as $categoria)
                                        <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                                    @endforeach        
                                </select>
                            </div>
                            <div class="col-10 col-md-4">
                                <input type="text" name="user_search" class="form-control col-8" placeholder="Pesquise por trabalhador">
                            </div>
                            <div class="col-2 col-md-2">
                                <button type="submit" class="btn btn-outline-primary material-icons">search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br><br><hr>
            <div class="row d-flex justify-content-center home_grid">
                @foreach ($trabalhos as $trabalho)
                    <a href="{{route ('trabalho_show',$trabalho->id)}}" class="col-3 trabalhos_show">
                        <div class="row encapsulamento_img">
                            <img src="{{asset('imagens/trabalhos/'.$trabalho->image_url.".".$trabalho->image_type)}}" class="img_trabalhos">
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <h5>{{$trabalho->nome}}</h5>
                            </div>
                            <div class="col-10 col-md-5">
                                <p>{{$trabalho->portfolio->user->nome}}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection