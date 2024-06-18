@extends('user.app')

@section('title') Мой аккаунт @endsection

@section('content') 
@foreach($claims as $claim)
    {{ $claim->getStatus($claim->user_id)}}
    {{ $claim->description}}
    <br>
@endforeach

<form method="POST" action="{{ route('add_claim') }}">
    @csrf
    <div class="mb-3">
        <label  class="form-label">Описание</label>
        <input type="text" class="form-control" name="description" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
@endsection
