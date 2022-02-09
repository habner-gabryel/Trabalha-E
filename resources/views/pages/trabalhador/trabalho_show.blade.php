@extends('layouts.main')
<style>
    strong{
        color: black;
    }
    p{
        color:black;
    }
</style>
@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container card">
        <div class="row d-flex justi'fy-content-center card-header">
            <div class="col-12 col-md-8">
                <h3 style=" color: black !important">Visualizando trabalho de: {{$trabalho->portfolio->user->nome}}</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6">
                    <img src="{{asset('imagens/trabalhos/'.$trabalho->image_url.".".$trabalho->image_type)}}" class="img_trabalhos_show">
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-5">
                    <h3>{{$trabalho->nome}}:</h3>
                    <br>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-2">
                    <strong>Descrição do Trabalho:</strong>
                </div>
                <div class="col-12 col-md-6">
                    <p>{{$trabalho->descricao}}</p>
                </div>
            </div>

            @if($user->tipo_usuarios_id == 3)
                <hr>
                <div class="row d-flex justify-content-center">
                    <div class="col-10 col-md-8">
                        <strong>Faça uma proposta de Trabalho:</strong>
                        <br>
                        <br>
                    </div>
                </div>
                <form action="{{route('cliente_proposta')}}" method="post">
                    <div class="row d-flex justify-content-center">
                        @csrf
                        <div class="col-10 col-md-5">
                            <strong>Título da Proposta:</strong>
                            <input type="text" required name="titulo" minlength="10" placeholder="Escreva algo que indique sobre o que é a proposta" class="col-10 form-control">
                        </div>
                        <div class="col-10 col-md-5">
                            <input type="hidden" name="cliente_id" value="{{$user->id}}">
                            <input type="hidden" name="trabalhos_id" value="{{$trabalho->id}}">
                            <strong>Descrição da proposta:</strong><br>
                            <textarea name="proposta" minlength="35" required class="col-12" cols="60" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-end">
                        <div class="col-10 col-md-3">
                            <br>
                            <button type="submit" class="btn btn-primary">Enviar Proposta</button>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>    
@endsection