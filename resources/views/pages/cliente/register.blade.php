@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-header row d-flex justify-content-center">
                <div class="col-12 col-md-6">
                    <h3>Registrar-se como Cliente</h3>
                </div>
            </div>
            <br><br>
            <div class="card-body">
                <form action="{{ route('cliente.store')}}" method="post" class="form">
                    @csrf
                    <div class="row d-flex">
                        <div class="col-12 col-md-4">
                            <strong>Nome Completo:<span style="color: red">*</span></strong>
                            <input type="text" name="nome_completo" required class="form-control col-md-10 @error('nome_completo') is-invalid @enderror">
                            @error('nome_completo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <strong>Senha:<span style="color: red">*</span></strong>
                            <input type="password" name="senha" required class="form-control col-12 col-md-10 @error('senha') is-invalid @enderror">
                            @error('senha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">                        
                            <strong>E-mail:<span style="color: red">*</span></strong>
                            <input type="email" name="email" required placeholder="exemplo@ex.com" class="form-control col-12 col-md--10 @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">                        
                            <strong>Telefone:<span style="color: red">*</span></strong>
                            <input type="text" name="telefone" required placeholder="(00) 0 0000-0000" class="form-control col-12 col-md-10 @error('telefone') is-invalid @enderror">
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <div class="col-10">
                            <h5>Endereço:</h5>
                        </div>
                    </div>
                    <br><br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-4">
                            <strong>Cidade:<span style="color: red">*</span></strong>
                            <select name="cidade" title="Selecione a cidade" required class="form-select col-12 col-md-10 @error('cidade') is-invalid @enderror">
                                <option value="1">Medianeira-PR</option>
                                <option value="2">Matelândia-PR</option>
                                <option value="3">São Miguel do Iguaçu-PR</option>
                                <option value="4">Missal-PR</option>
                                <option value="5">Serranópolis-PR</option>
                            </select>
                            @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <strong>CEP:<span style="color: red">*</span></strong>
                            <input type="text" name="cep" required class="form-control col-12 col-md-10">
                            @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <strong>Bairro:<span style="color: red">*</span></strong>
                            <input type="text" name="bairro" required class="form-control col-12 col-md-10 @error('bairro') is-invalid @enderror">
                            @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row d-flex justify-content-center">
                        <div class="col-12 col-md-4">
                            <strong>Rua:<span style="color: red">*</span></strong>
                            <input type="text" name="rua" required class="form-control col-12 col-md-10 @error('rua') is-invalid @enderror">
                            @error('rua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <strong>Nº da casa:<span style="color: red">*</span></strong>
                            <input type="number" name="num_casa" required class="form-control col-12 col-md-10 @error('num_casa') is-invalid @enderror">
                            @error('num_casa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <strong>Complemento:</strong>
                            <textarea name="complemento" class="for-control col-12" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row d-flex justify-content-end">
                        <div class="col-8 col-md-2">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                        <div class="col-3">
                            <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-secondary">Cancelar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 