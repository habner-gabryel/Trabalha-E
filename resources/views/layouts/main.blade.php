<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Work Boost</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: repeating-linear-gradient(283deg,#020126 30%, #020140 50%, #020132 50%, #042159 70%);
            color: #F28A2E;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .welcome {
            color: #F23827;
            margin-top: 40px;
            margin-bottom: 40px;
            height: 160px;
        }

        
        h3, h4, h5 {
            color: #002700;
        }

        p, strong{
            color: black;
            font-size: 18px;
        }

        hr {
            background-color: #7E8082;
            margin-bottom: 25px;
            margin-top: 45px;
        }

        h1.title {
            text-align: center;
            padding-top: 50px;
            font-size: 42px;
            letter-spacing: 3px; 
        }

        h2.title {
            text-align: center;
            font-size: 40px;
            margin-bottom: 60px;
            letter-spacing: 3px; 
        }

        select {
            background-color: #ffffff;
            min-height: 37px;
            border-radius: 5px;
            border: 1px solid #002700;
        }

        textarea {
            background-color: #ffffff;
            min-height: 37px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        input:invalid {
            border: 2px solid #5a1f1a;
            background-color: RGBA(139,0,0,0.13);
        }

        input:invalid:focus {
            border: 2px solid #5a1f1a;
        }

        textarea:invalid {
            border: 2px solid #5a1f1a;
            background-color: RGBA(139,0,0,0.13);
        }

        .define_centro {
            margin-left: 10%;
            margin-right: 10%;
        }

        .links > a {
            color: #F2E422;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 1px; 
            text-decoration: none;
            text-transform: uppercase;
        }
        
        .botoes_table{
            margin: 3px;
            transform: scale(0.8);
        }

        .form {
            padding-left: 80px;
            padding-right: 80px;
        }

        .acessos {
            width: 100%;
            height: 80px;
        }

        .botoes {
            border: 1px solid #4B525D;
            border-radius: 5px;
            height: 60px;
            padding: 10px;
            color: #ffe;
            text-align: center;
            font-size: 25px;
            transition: 0.5s;
        }
        .botoes:hover {
            transform: scale(1.1); 
        }

        .botao_trab {
            background-color: #D5732E;
        }

        .botao_login {
            background-color: #dd1a00;
        }

        .botao_contr {
            background-color: #F6CA22;
        }

        .home_grid{
            padding: 50px;
            align-content: initial;
        }

        .trabalhos_show {
            height: 420px;
            width: 280px;
            font-size: 12;
            transition-duration: 0.2s;
            margin-bottom: 60px;
            border-right-style: solid;
            border-left-style: solid;
            border-color: #ffff;
        }

        .trabalhos_show:hover {
            border-right-style: solid;
            border-left-style: solid;
            border-color: rgb(237, 231, 231);
        }

        .encapsulamento_img{
            height: 250px;
            padding: 5px;
            width: 250px;
        }

        .img_trabalhos{
            max-height: 420px;
            max-width: 340px;
        }

        .img_trabalhos_show {
            max-height: 480px;
            max-width: 480px;
            margin: 5%;
            transition-duration: 0.5s;
        }

        .img_trabalhos_show:hover {
            transform: scale(1.1);
        }
        .scrolling_450px {
            width: 100%;
            height: 450px;
            overflow-x: scroll;
        }
        .scrolling_850px {
            width: 100%;
            height: 850px;
            overflow-x: scroll;
        }

        header {
            top: 0px;
            width: 100%;
            height: 35px;
            background-color: RGBA(204,92,4,0.9);
            position: fixed;
            z-index: 5;
        }

        header a {
            color: white;
            text-decoration: none;
            padding-top: 10px;
        }

        @media(max-width: 500px) {
            .home_grid{
                padding: 0px;
            }

            h1.title {
                font-size: 22px;
            }

            h2.title {
                font-size: 20px;
            }

            h3 {
                font-size: 16px;
            }
            
            .botoes {
                font-size: 15px;
                width: 140px;
            }

            .trabalhos_show {
                height: 420px;
                width: 250px;
                margin-left: 0px;
            }

            .img_trabalhos {
                max-height: 240px;
                max-width: 240px;           
            }

            .img_trabalhos_show {
                max-height: 300px;
                max-width: 300px;
            }

            select {
                margin-bottom: 15px;
            }

            .botao_login {
                margin-top:35px;
            }

            p, strong {
                font-size: 14px;
            }

            .tabela_propostas {
                font-size: 10px;
                transform: scale(1.1);
            }

            .description_texts {
                margin-top: 200px;
            }

            .description_divs {
                margin-bottom: 50px;
            }
        }
        @media(max-width: 1280px){
            .trabalhos_show {
                margin-left: 50px;
            }
        }
    </style>
    @yield('css')
<body>
    @isset($user)
        <header>
            <div class="row d-flex justify-content-end">
                <div class="col text-left">
                    <a onclick="window.history.go(-1); return false;">
                        <button class="btn btn-sm btn-outline-light material-icons">arrow_back</button>
                    </a>
                </div>
                <div class="col-5 col-md-2">
                    <strong>
                        @if($user->tipo_usuarios_id === 1)
                            <a href="{{route("admin")}}">Painel Administrativo</a>
                        @endif
                        @if($user->tipo_usuarios_id === 2)
                            <a href="{{route('trabalhador_perfil_privado')}}">Acessar o meu Perfil</a>
                        @elseif($user->tipo_usuarios_id === 3)
                            <a href="{{route('cliente_perfil_privado')}}">Acessar o meu Perfil</a>
                        @endif
                    </strong>
                </div>
                <div class="col-2 col-md-1">
                    <strong>
                        <a href="{{route("logout")}}">Sair</a>
                    </strong>
                </div>
            </div>
        </header>
    @endisset
    <div class="container">
        <br><br><br>
        @if(Session::has('sucesso'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('sucesso') }}</p>
        @endif

        @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
        @endif

        @yield('content')
    </div>
</body>
</html>
<script>
    $('.carousel').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });
</script>