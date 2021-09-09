@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Modifiez l'article</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" action="{{route('articles.update', $article->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Titre :</label>
        <input value="{{$article->name}}" type="text" name="name" id="name">
    
        <label for="description">Description : </label>
        <textarea name="description" id="description" cols="30" rows="10">{{$article->description}}</textarea>

        <label for="date">Date de publication : </label>
        <input value="{{$article->date}}" type="date" name="date" id="date">
    
        <label for="user">Utilisateur : </label>
        <select class="form-select" aria-label="Default select example" id="user" name="user_id">
            <option value="{{$article->user_id}}" selected>{{$article->user->firstname}} {{$article->user->name}}</option>
                @foreach ($user as $data)
                    <option value="{{$data->id}}">{{$data->firstname}} {{$data->name}}</option>
                @endforeach
        </select>
        
        <button class="btn btn-success mt-3 w-25" type="submit">Modifier</button>
    </form>
</section>

@endsection