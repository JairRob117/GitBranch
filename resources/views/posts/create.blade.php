@extends('layouts.app')

@section('content')
<h2>Crear entrada</h2>
<form action="/posts" method="POST">
    @csrf
    <p>
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control">
    </p>
    <p>
        <label for="body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
    </p>
    <p>
        <button type="submit" class="btn btn-success">Guardar</button>
    </p>
</form>
@endsection