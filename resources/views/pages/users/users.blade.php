@extends('template.main')

@section('content')

<section class="container my-5">
    <h2 class="text-center">Utilisateurs</h2>

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    <div class="d-flex justify-content-center my-5">
        <a class="btn btn-success" href="{{route('users.create')}}">Ajouter un utilisateur</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Rôle</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                    <tr>
                    <th scope="row">{{$data->id}}</th>
                    <td>{{$data->name}}</td>
                    <td>{{$data->firstname}}</td>
                    <td>{{$data->role->name}}</td>
                    <td>
                      <img style="width: 40px; height:30px" src="{{asset('img/'.$data->pp_url)}}" alt="">
                    </td>
                    <td class="d-flex justify-content-around">
                        <a class="btn btn-primary" href="{{route('users.show', $data->id)}}">Détails</a>
                        <a class="btn btn-warning mx-2" href="{{route('users.edit', $data->id)}}">Modifier</a>
                        <form action="{{route('users.destroy', $data->id)}}" method="post">
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
