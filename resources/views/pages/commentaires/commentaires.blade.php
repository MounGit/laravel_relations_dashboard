@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Commentaires</h2>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="d-flex justify-content-center my-5">
        <a class="btn btn-success" href="{{route('commentaires.create')}}">Ajouter un commentaire</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Article</th>
                <th scope="col">Commentaire</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($commentaire as $data)
                    <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->article->name}}</td>
                    <td>{{$data->content}}</td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{route('commentaires.show', $data->id)}}">Détails</a>
                        <a class="btn btn-warning mx-2" href="{{route('commentaires.edit', $data->id)}}">Modifier</a>
                        <form action="{{route('commentaires.destroy', $data->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
              </tr>
                @endforeach
    
            </tbody>
          </table>
</section>

@endsection
