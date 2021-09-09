@extends('template.main')

@section('content')

<section class="container my-5 d-flex flex-column align-items-center">
    
    <div class="card my-5" style="width: 50rem">
        <div class="card-body">
            <h4 class="card-subtitle my-3 text-muted">Article : </h4>
            <h2>{{$commentaire->article->name}}</h2>
            <h4 class="card-subtitle my-3 text-muted">Commentaire : </h4>
            <h3 class="card-title">{{$commentaire->content}}</h3>
            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('commentaires.edit', $commentaire->id)}}">Modifier</a>
                <form action="{{route('commentaires.destroy', $commentaire->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection