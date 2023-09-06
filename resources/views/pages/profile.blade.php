@extends("layout")

@section("content")

    <form class="container mt-5 mb-5" method="POST" action="{{ route("profile.save") }}">

        {{ csrf_field() }}

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif


        <h1>Moj nalog</h1>
        <div>
            <label for="email" class="form-label">Email</label>
            <input class="form-control" name="email" type="text" id="email" value="{{ auth()->user()->email }}">
        </div>

        <div class="mt-3">
            <label for="name" class="form-label">Ime</label>
            <input class="form-control" name="name" type="text" id="name" value="{{ auth()->user()->name }}">
        </div>

        <div class="mt-3">
            <label for="password" class="form-label">Password</label>
            <input class="form-control" name="password" type="password" placeholder="Unesite vasu novu lozinku" id="password">
        </div>

        <button class="btn btn-outline-primary mt-3">Snimi</button>
    </form>

@endsection
