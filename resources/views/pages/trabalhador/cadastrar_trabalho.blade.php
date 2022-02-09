@extends('layouts.main')
@section('content')
    <div class="container card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-md-6 text-center">
                    <h3>Cadastrar novo Trabalho:</h3>
                </div>
            </div>
            <br><br><br>
            <form action="{{route("salvar_trabalho")}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <strong>Nome do Trabalho:</strong>
                        <input type="text" name="nome" required minlength="10" class="form-control col-10">
                    </div>
                    <div class="col-12 col-md-6">
                        <strong>Breve Descrição:</strong>
                        <textarea name="descricao" class="form-control col-12" cols="30" required rows="3"></textarea>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <strong>Adicione uma imagem: (Apenas arquivos .png ou .jpg)</strong>
                        <input type="file" name="imagem" id="" class="form-control col-10">
                    </div>

                    <div class="col-12 col-md-6">
                        <strong>Portfolio:</strong>
                        <select name="portfolio" title="Selecione o Portfolio" required class="form-control col-10">
                                <option value="" selected>Selecione o Portfolio</option>
                            @foreach($portfolios as $port)
                                <option value="{{$port->id}}">{{$port->descricao}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row d-flex justify-content-end">
                    <div class="col-6 col-md-1">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <div class="col-1">
                        <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-secondary">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection