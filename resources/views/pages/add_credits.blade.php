
@extends("layout")

@section("content")

    <form class="container mt-5 mb-5 col-12 col-md-4" action="{{ route("credits.add") }}" method="POST">

        {{ csrf_field() }}

        <div class="mb-3">
            <label>Izaberite karticu</label>
            <select name="credit_card" class="form-select">
                @foreach(auth()->user()->cards as $card)
                    <option value="{{ $card->id }}">{{ $card->card_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="mb-2" for="credits">Iznos kredita</label>
            <select id="credits" class="form-select" name="credits">
                @for($i = 1; $i <= 10; $i++)
                    @php $creditsAmount = $i*env('CREDITS_QUANTIFIER') @endphp
                    <option value="{{ $creditsAmount }}">{{ $creditsAmount }} kredita (cena: {{ $creditsAmount*env("CREDITS_VALUE_RSD") }}rsd)</option>
                @endfor
            </select>
        </div>

        <button class="btn btn-primary">Dodaj kredite</button>

    </form>

@endsection
