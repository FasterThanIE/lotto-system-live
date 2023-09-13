@extends("layout")

@section("content")

    <button onclick="getRandomNumbers()">Generisi nasumicnu kombinaciju</button>

    <form id="rndNumbers" method="POST" action="{{ route("loto.buy") }}" class="container mb-5 mt-5">

        {{ csrf_field() }}

        <div class="d-flex text-center">
            @for($i = 0; $i < 7; $i++)
                <input style="width: 50px;" class="rand_number" type="number" name="numbers[]" value="{{ rand(0, 100) }}">
            @endfor
        </div>

        <button class="btn btn-outline-primary mt-2">Kupi loto tiket</button>

    </form>

    <script>
        function getRandomNumbers(){
            const AMOUNT=8;
            const BOTTOMRANGE=1;
            const TOPRANGE=100;

            let numbers=[];

            for(let i=0;i<AMOUNT;i++){
                let rndNumber=Math.floor(Math.random()*TOPRANGE)+BOTTOMRANGE;
                numbers.push(rndNumber);
            }
            let div = document.getElementById("rndNumbers");
            let inputs = div.querySelectorAll("input");

            for (let i = 0; i < AMOUNT; i++) {
                inputs[i].value = numbers[i];
            }
        }
    </script>

@endsection
