@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Ajoutez un rôle</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" action="{{route('roles.store')}}" method="post">
        @csrf
    
        <label for="role">Rôle : </label>
        <select class="form-select" aria-label="Default select example" id="role" name="name">
            <option selected>Sélectionnez un rôle</option>
                    <option value="Admin">Admin</option>
                    <option value="Editeur">Editeur</option>
                    <option value="Visiteur">Visiteur</option>
        </select>
        
        <button class="btn btn-success mt-3 w-25" type="submit">Ajouter</button>
    </form>
</section>

@endsection