@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Ajoutez un article</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" action="{{route('articles.store')}}" method="post">
        @csrf

        <label for="name">Titre :</label>
        <input value="{{old('name')}}" type="text" name="name" id="name">
    
        <label for="description">Description : </label>
        <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>

        <label for="date">Date de publication : </label>
        <input value="{{old('date')}}" type="date" name="date" id="date">
    
        <label for="user">Utilisateur : </label>
        <select class="form-select" aria-label="Default select example" id="user" name="user_id">
            <option selected>Nom de l'utilisateur</option>
                @foreach ($user as $data)
                    <option value="{{$data->id}}">{{$data->firstname}} {{$data->name}}</option>
                @endforeach
        </select>
        
        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection