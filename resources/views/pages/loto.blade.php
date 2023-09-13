@extends("layout")

@section("content")

    <form method="POST" action="{{ route("loto.buy") }}" class="container mb-5 mt-5">

        {{ csrf_field() }}

        <div class="d-flex text-center">
            @for($i = 0; $i < 7; $i++)
                <input style="width: 50px;" class="rand_number" type="number" name="numbers[]" value="{{ rand(0, 100) }}">
            @endfor
        </div>

        <button class="btn btn-outline-primary mt-2">Kupi loto tiket</button>

    </form>

@endsection
