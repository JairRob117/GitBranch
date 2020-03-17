@extends('layouts.app')

@section('content')
<h2>Entradas</h2>
<a href="/posts/create" class="btn btn-success">Crear registro</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Acciones</th>
            <th></th>
        </tr>

    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td> {{ $post->id }}</td>
                <td> {{ $post->title }}</td>
                <td> {{ $post->body }}</td>
                <td> <a href="/posts/{{ $post->id }}">Editar</a>
            
               </td>
                <td> <form action="{{action('PostController@destroy', $post->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
               </td>
            </tr>
        @endforeach
    </tbody>
    

</table>
@endsection