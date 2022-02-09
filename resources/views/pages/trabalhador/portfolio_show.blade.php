@extends('layouts.main')
@section('content')
    <div class="container card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-10">
                    <h3>
                        Visualizando o Portfólio:
                    </h3>
                    <h4>{{$portf->descricao}}</h4>
                </div>
            </div>
            <br><br>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-5">
                    <strong>Categoria:</strong>
                    <p>{{$portf->categoria->nome}}</p>
                </div>
                <div class="col-12 col-md-5">
                    <strong>Status:</strong>
                    <p>{{($portf->status)? "Ativo" : "Inativo"}}</p>
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-end">
                <div class="col-12 col-md-8">
                    <h4>Trabalhos:</h4>
                </div>
                <div class="col-6 col-md-2">
                    <a href="{{route("cadastrar_trabalho")}}">
                        <button type="button" class="btn btn-primary">Adicionar Trabalho</button>
                    </a>
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <div class="scrolling_450px col-12 col-md-10">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col" class="col-4 text-center">Nome</th>
                                <th scope="col" class="col-5 text-center">Descrição</th>
                                <th scope="col" class="col-2 text-center">Status</th>
                                <th scope="col" class="col-1 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trabalhos as $trab)
                                <tr class="{{($trab->status)? "table-success" : "table-danger"}}">
                                    <td class="col-4 text-center">{{$trab->nome}}</td>
                                    <td class="col-5 text-center">{{$trab->descricao}}</td>
                                    <td class="col-2 text-center">{{($trab->status)? "Ativo" : "Inativo"}}</td>
                                    <td class="col-1 text-center">
                                        <a href="{{route("trabalho_show",$trab->id)}}">
                                            <button class="btn btn-outline-primary botoes_table material-icons">visibility</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection