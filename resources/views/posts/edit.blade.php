@extends('layouts.app')

@section('content')
<h2>editar entrada</h2>
<form action="/posts/{{ $entrada->id }}" method="POST">
    @csrf
    <p>
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $entrada->title }}">
    </p>
    <p>
        <label for="body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $entrada->body }}</textarea>
    </p>
    <p>
        <button type="submit" class="btn btn-success">Guardar</button>
    </p>
</form>
@endsection