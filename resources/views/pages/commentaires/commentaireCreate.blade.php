@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Ajoutez un commentaire</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" action="{{route('commentaires.store')}}" method="post">
        @csrf
    
        <label for="article">Article : </label>
        <select class="form-select" aria-label="Default select example" id="article" name="article_id">
            <option selected>Sélectionnez un article</option>
                @foreach ($article as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
        </select>
        
        <label for="content">Commentaire :</label>
        <textarea name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>

        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection