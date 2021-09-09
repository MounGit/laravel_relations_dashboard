@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Modifiez l'utilisateur</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="d-flex flex-column  w-75 mt-5" enctype="multipart/form-data" action="{{route('users.update', $user->id)}}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nom :</label>
        <input value="{{$user->name}}" type="text" name="name" id="name">
    
        <label for="firstname">Prénom : </label>
        <input value="{{$user->firstname}}" type="text" name="firstname" id="firstname">

        <label for="age">Age : </label>
        <input value="{{$user->age}}" type="number" min="12" max="100" name="age" id="age">
    
        <label for="birth_date">Date de naissance : </label>
        <input value="{{$user->birth_date}}" type="date" name="birth_date" id="birth_date">

        <label for="email">Email : </label>
        <input value="{{$user->email}}" type="text" name="email" id="email">

        <label for="password">Mot de passe : </label>
        <input value="{{$user->password}}" type="password" name="password" id="password">

        <label for="pp_url">Photo de profil : </label>
        <input value="{{$user->pp_url}}" type="file" name="pp_url" id="pp_url">


        <label for="Role">Rôle : </label>
        <select class="form-select" aria-label="Default select example" id="user" name="role_id">
            <option value="{{$user->role_id}}" selected>{{$user->role_id}}</option>
                @foreach ($role as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                @endforeach
        </select>
        
        <button class="btn btn-success mt-3 w-25" type="submit">Modifier</button>
    </form>
</section>

@endsection