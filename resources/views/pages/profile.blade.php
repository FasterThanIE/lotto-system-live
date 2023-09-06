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

    <form class="container mt-5 mb-5" method="POST" action="{{ route("cards.save") }}">

        {{ csrf_field() }}

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <h1>Moje kartice</h1>

        @foreach(\Illuminate\Support\Facades\Auth::user()->cards as $creditCard)
            <div class="d-flex">
                <p>{{ $creditCard->card_number }} - {{ $creditCard->cvv }} - {{ $creditCard->expiry }}</p>
                <a class="btn btn-danger" href="{{ route("cards.delete", ['card' => $creditCard->id]) }}">DELETE</a>
            </div>
        @endforeach

        <div>
            <label for="card_number" class="form-label">Card number</label>
            <input class="form-control" name="card_number" type="number" id="card_number" value="{{ old("card_number") }}">
        </div>

        <div class="mt-3">
            <label for="cvv" class="form-label">CVV</label>
            <input class="form-control" name="cvv" type="text" id="cvv" value="{{ old("cvv") }}">
        </div>

        <div class="mt-3">

            <label>Mesec isteka</label>
            <select class="form-select" name="expiry_month">
                @for($i = 1; $i <= 12; $i++)
                    <option>{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div class="mt-3">
            <label>Godina isteka</label>
            <select class="form-select" name="expiry_year">
                @for($i = 0; $i <= 5; $i++)
                    <option>{{ date('Y')+$i }}</option>
                @endfor
            </select>
        </div>

        <button class="btn btn-outline-primary mt-3">Snimi</button>
    </form>

@endsection
