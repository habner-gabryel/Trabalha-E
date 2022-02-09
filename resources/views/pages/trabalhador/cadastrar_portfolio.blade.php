@extends('layouts.main')
@section('content')
    <div class="container card">
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-8 col-md-6">
                    <h3>Cadastrar novo Portfólio:</h3>
                </div>
            </div>
            <br><br><br>
            <form action="{{route("salvar_portfolio")}}" method="post">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-6">
                        <strong>Categoria deste Portfolio:</strong>
                        <select name="categoria" required class="form-control col-10">
                            <option value="" selected>Selecione uma Categoria</option>
                            
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
                            @endforeach        
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <strong>Breve Descrição:</strong>
                        <input type="text" name="descricao" required minlength="10" class="form-control col-10">
                    </div>
                </div>
                <hr>
                <div class="row d-flex justify-content-end">
                    <div class="col-6 col-md-1">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    <div class="col-1">
                        <button type="button" onclick="window.history.go(-1); return false;"  class="btn btn-secondary">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection