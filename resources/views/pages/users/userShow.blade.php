@extends('template.main')

@section('content')

<section class="container my-5 d-flex flex-column align-items-center">
    <h2 class="text-center mb-5">{{$user->firstname}}</h2>
    
    <div class="card my-5" style="width: 19rem">
        <img src="{{asset('img/'.$user->pp_url)}}" class="card-img-top" alt="">
        <div class="card-body">
            <h2>{{$user->firstname}} {{$user->name}}</h2>
            <h3 class="card-title">{{$user->age}} ans</h3>
            <p>{{$user->email}}</p>
            <p>{{$user->role->name}}</p>
            <div class="d-flex justify-content-around mt-5">
                <a class="btn btn-warning" href="{{route('users.edit', $user->id)}}">Modifier</a>
                <form action="{{route('users.destroy', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </div>

</section>

@endsection