@extends('layouts.main')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <div class="container card">
        <div class="card-body">
            <h3>Informações Pessoais:</h3>
            <br><br>

            <div class="row d-flex justify-content-center">

                <div class="col-12 col-md-4 row">
                    <div class="col-6 d-flex justify-content-end">
                        <strong>Nome Completo:</strong>
                    </div>
                    <div class="col-6 d-flex justify-content-start">
                        <p>{{$user->nome}}</p>
                    </div>
                </div>

                <div class="col-12 col-md-4 row">
                    <div class="col-6 d-flex justify-content-end">
                        <strong>E-mail:</strong>
                    </div>
                    <div class="col-6 d-flex justify-content-start">
                        <p>{{$user->email}}</p>
                    </div>
                </div>

                <div class="col-12 col-md-4 row">
                    <div class="col-6 d-flex justify-content-end">
                        <strong>Celular:</strong>
                    </div>
                    <div class="col-6 d-flex justify-content-start">
                        <p>{{$user->celular}}</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <h5>Endereço:</h5>
                </div>
            </div>
            <br>
            @isset($endereco)
                <div class="row d-flex justify-content-center">

                    <div class="col-12 col-md-4 row">
                        <div class="col-6 d-flex justify-content-end">
                            <strong>Cidade:</strong>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <p>{{$cidade}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 row">
                        <div class="col-6 d-flex justify-content-end">
                            <strong>CEP:</strong>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <p>{{$endereco->cep}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 row">
                        <div class="col-6 d-flex justify-content-end">
                            <strong>Bairro:</strong>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <p>{{$endereco->bairro}}</p>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">

                    <div class="col-12 col-md-4 row">
                        <div class="col-6 d-flex justify-content-end">
                            <strong>Rua:</strong>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <p>{{$endereco->rua}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 row">
                        <div class="col-6 d-flex justify-content-end">
                            <strong>Nº:</strong>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            <p>{{$endereco->numero}}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 row">
                        <div class="col-6 d-flex justify-content-end">
                            <strong>Complemento:</strong>
                        </div>
                        <div class="col-6 d-flex justify-content-start">
                            @isset($endereco->complemento)
                                <p>{{$endereco->complemento}}</p>
                            @endisset
                            @empty($endereco->complemento)
                                <p>Não há complemento neste endereço.</p>
                            @endempty
                        </div>
                    </div>
                @endisset
                @empty($endereco)
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 text-center">
                            <p>Você não possui nenhum endereço cadastrado.</p>
                        </div>
                    </div>
                @endempty

                <br><hr>
                <div class="row d-flex justify-content-around">
                    <div class="col-12 col-md-8">
                        <h4>Propostas Recebidas:</h4>
                    </div>
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                    <div class="scrolling_450px col-12 col-md-10">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="col-3 text-center">Título</th>
                                    <th scope="col" class="col-5 text-center">Descrição</th>
                                    <th scope="col" class="col-2 text-center">Cliente</th>
                                    <th scope="col" class="col-2 text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($propostas)
                                    @foreach($propostas as $proposta)
                                        @if($proposta->status_propostas_id === 1)
                                            <tr class="table-info">
                                        @elseif($proposta->status_propostas_id === 2)
                                            <tr class="table-success">
                                        @elseif($proposta->status_propostas_id === 3)
                                            <tr class="table-danger">
                                        @endif
                                            <td class="col-3 text-center">{{$proposta->nome_proposta}}</td>
                                            <td class="col-5 text-center">{{$proposta->descricao}}</td>
                                            <td class="col-2 text-center">{{$proposta->users->nome}}</td>
                                            <td class="col-2 text-end">
                                                @if($proposta->status_propostas_id === 1)
                                                    <a href="{{route("aceitar_proposta",$proposta->id)}}">
                                                        <button type="button" class="btn btn-outline-success botoes_table btn-sm material-icons">check</button>
                                                    </a>
                                                    <a href="{{route("recusar_proposta",$proposta->id)}}">
                                                        <button type="button" class="btn btn-outline-danger botoes_table btn-sm material-icons">close</button>
                                                    </a>
                                                @else
                                                    <a href="{{route("ver_proposta",$proposta->id)}}">
                                                        <button class="btn btn-outline-primary botoes_table btn-sm material-icons">visibility</button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset

                                @empty($propostas)
                                    <tr>
                                        <td class="col text-center"></td>
                                        <td class="col text-center">Não há nenhuma proposta enviada.</td>
                                        <td class="col text-center"></td>
                                        <td class="col text-center"></td>
                                    </tr>
                                @endempty
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="row d-flex justify-content-end" style="margin-top: 65px; margin-bottom: 15px;">
                    <div class="col-12 col-md-8">
                        <h4>Portfolios:</h4>
                    </div>
                    <div class="col-6 col-md-2">
                        <a href="{{route("cadastrar_portfolio")}}">
                            <button type="button" class="btn btn-primary">Adicionar Portfólio</button>
                        </a>
                    </div>
                </div>
                <br>
                <div class="row d-flex justify-content-center">
                    <div class="scrolling_450px col-12 col-md-10">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="col-5 text-center">Descrição</th>
                                    <th scope="col" class="col-4 text-center">Categoria</th>
                                    <th scope="col" class="col-2 text-center">Status</th>
                                    <th scope="col" class="col-1 text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($portfolios)
                                    @foreach($portfolios as $portf)
                                        <tr class="{{($portf->status)? "table-success" : "table-danger"}}">
                                            <td class="col-5 text-center">{{$portf->descricao}}</td>
                                            <td class="col-4 text-center">{{$portf->categoria->nome}}</td>
                                            <td class="col-2 text-center">{{($portf->status)? "Ativo" : "Inativo"}}</td>
                                            <td class="col-1 text-center">
                                                <a href="{{route("show_portfolio",$portf->id)}}">
                                                    <button class="btn btn-outline-primary botoes_table material-icons">visibility</button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endisset

                                @if(count($portfolios) === 0)
                                    <tr>
                                        <td class="col text-center"></td>
                                        <td class="col text-center">Não há nenhum portfólio cadastrado.</td>
                                        <td class="col text-center"></td>
                                        <td class="col text-center"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection