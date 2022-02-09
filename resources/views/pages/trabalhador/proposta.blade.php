@extends('layouts.main')
@section('content')
    <div class="container card">
        <div class="card-body">
            
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <h3>Visualizando a Proposta: </h3>
                    <h5>{{$proposta->nome_proposta}}</h5>
                </div>
            </div>
            <br><br>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 row">
                    <div class="col-6 col-md-2 d-flex justify-content-end">
                        <strong>Cliente:</strong>
                    </div>
                    <div class="col-6 col-md-10 d-flex justify-content-start">
                        <p>{{$proposta->users->nome}}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 row">
                    <div class="col-6 col-md-4 d-flex justify-content-end">
                        <strong>Data de Envio:</strong>
                    </div>
                    <div class="col-6 col-md-8 d-flex justify-content-start">
                        <p>{{$created_at}}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 row">
                    <div class="col-6 col-md-2 d-flex justify-content-end">
                        <strong>E-mail:</strong>
                    </div>
                    <div class="col-6 col-md-10 d-flex justify-content-start">
                        <p>{{$proposta->users->email}}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 row">
                    <div class="col-6 col-md-4 d-flex justify-content-end">
                        <strong>Celular:</strong>
                    </div>
                    <div class="col-6 col-md-8 d-flex justify-content-start">
                        <p>{{$proposta->users->celular}}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 row">
                    <div class="col-4 col-md-2 d-flex justify-content-end">
                        <strong>Descrição:</strong>
                    </div>
                    <div class="col-8 col-md-10 d-flex justify-content-start">
                        <p>{{$proposta->descricao}}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 row">
                    <div class="col-6 col-md-4 d-flex justify-content-end">
                        <strong>Data de Alteração:</strong>
                    </div>
                    <div class="col-6 col-md-8 d-flex justify-content-start">
                        <p>{{$updated_at}}</p>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row d-flex justify-content-start">
                <div class="col-2 d-flex justify-content-end">
                    <strong>Status:</strong>
                </div>
                <div class="col-2 d-flex justify-content-start">
                    @if($proposta->status_propostas_id == 2)
                        <span style="font-size: 25px" class="badge bg-success">
                            {{$proposta->status->nome}}
                        </span>
                    @elseif($proposta->status_propostas_id == 3)
                        <span style="font-size: 25px" class="badge bg-danger">
                            {{$proposta->status->nome}}
                        </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h5>Informações de Contato do Trabalhador:</h5>
                </div>
                <br><br>

                @if($proposta->status_propostas_id == 2)
                    <div class="col-12 col-md-4 row">
                        <div class="col-6 col-md-4 d-flex justify-content-end">
                            <strong>Trabalhador:</strong>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-start">
                            <p>{{$proposta->trabalhos->portfolio->user->nome}}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 row">
                        <div class="col-6 col-md-4 d-flex justify-content-end">
                            <strong>E-mail:</strong>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-start">
                            <p>{{$proposta->trabalhos->portfolio->user->email}}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 row">
                        <div class="col-6 col-md-4 d-flex justify-content-end">
                            <strong>Celular:</strong>
                        </div>
                        <div class="col-6 col-md-8 d-flex justify-content-start">
                            <p>{{$proposta->trabalhos->portfolio->user->celular}}</p>
                        </div>
                    </div>
                @elseif($proposta->status_propostas_id == 3)
                    <div class="col-12 col-md-6">
                        <h3>O Trabalhador recusou a Proposta.</h3>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection