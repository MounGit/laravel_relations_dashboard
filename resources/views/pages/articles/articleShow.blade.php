@extends('template.main')

@section('content')

<section class="container my-5 d-flex flex-column align-items-center">
    <h2 class="text-center mb-5">{{$article->name}}</h2>
    
    <div class="card my-5" style="width: 50rem">
        <div class="card-body">
            <h4 class="card-subtitle my-3 text-muted">Titre : </h4>
            <h2>{{$article->name}}</h2>
            <h4 class="card-subtitle my-3 text-muted">Description : </h4>
            <h3 class="card-title">{{$article->description}}</h3>
            <h4 class="card-subtitle my-3 text-muted">Date de publication : </h4>
            <p>{{$article->date}}</p>
            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('articles.edit', $article->id)}}">Modifier</a>
                <form action="{{route('articles.destroy', $article->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection