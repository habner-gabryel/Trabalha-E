@extends('layouts.main')
@section('content')
<style>
    .description_texts{
        margin-top: 140px;  
    }
    .description_texts p, h3{
        color: white !important;
    }
</style>
<body>
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">
    <div class="container">
        <div class="row d-flex justify-content-center welcome">
            <div class="col-12 col-md-8">
                <h1 class="title">BEM VINDO AO WORK BOOST</h1>
            </div>
        </div>

        <div class="row d-flex justify-content-center define_centro">
            <div class="col-12 col-md-8">
                <h2 class="title">
                    O QUE VOCÊ PROCURA?
                </h2>
            </div>  
        </div>

        <div class="row d-flex justify-content-center acessos">
            <div class="col-6 col-md-3 d-flex justify-content-end">
                <a href="{{ route('trabalhador.register')}}">
                    <button type="button" class="botoes botao_trab">
                        Quero Trabalhar!
                    </button>

                </a>
            </div>
            <div class="col-6 col-md-3 d-flex justify-content-center">
                <a href="{{ route('cliente.register')}}">
                    <button type="button" class="botoes botao_contr">
                        Quero Contratar!
                    </button>
                </a>
            </div>
            <div class="col-5 col-md-3 d-flex justify-content-start">
                <a href="{{ route('login')}}">
                    <button type="button" class="botoes botao_login">
                        Fazer Login
                    </button>
                </a>
            </div>
        </div>

        <div  class="row d-flex justify-content-center text-center description_texts">
            <div class="col-12 col-md-4 row description_divs">
                <h3>QUEM SOMOS?</h3>
                <p >Somos uma Instituição sem Fins lucrativos que busca informatizar para aproximar trabalhadores independentes e seus possíveis clientes.</p>
            </div>
            <div class="col-12 col-md-4 row description_divs">
                <h3>O QUE QUEREMOS?</h3>
                <p>Nosso objetivo é trazer mais facilidade em contratações em serviços 
                    necessários como: Jardinagem, Pintura, Construção Civil, Beleza e Estética, entre outros.</p>
            </div>
            <div class="col-12 col-md-4 row description_divs">
                <h3>COMO FAREMOS ISSO?</h3>
                <p>Nossa equipe usou de seus esforços para desenvolver este site que conta 
                    com uma usabilidade simples e rápida para clientes e trabalhadores.</p>
            </div>
        </div>
    </div>
</body>
@endsection