@extends('layout.app')

@section('title') Главная @endsection

@section('content') 

<div class="row">
    <form method="POST" action="{{ route('register_user') }}">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Логин</label>
            <input type="text" class="form-control" name="login">
        </div>
        <div class="mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" class="form-control" name="password">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection