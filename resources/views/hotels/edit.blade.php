<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modifica hotel</title>
    @include('bootstrap')
</head>
<body>
    <div class="container">

        <h1>Modifica hotel</h1>

        <form method="post" action="/hotels/edit/{{ $hotel->id }}">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nome hotel</label>
            <input type="text" class="form-control" id="name" placeholder="Inserisci il nome dell'hotel" value="{{ old('name', $hotel->name) }}" name="name">
        </div>
        <div class="mb-3">
            <label for="stars" class="form-label">Stelle</label>
            <select class="form-select @error('stars') is-invalid @enderror" name="stars" id="stars" placeholder="Seleziona dall'elenco">
                <option value="">Selezionare un'opzione</option>

                @for($i=1; $i<=5; $i++)
                    <option value="{{$i}}" @selected($i==old('stars', $hotel->stars))>
                        {{$i}}
                        @if($i==1)
                        stella
                        @else
                        stelle
                        @endif
                    </option>
                @endfor

            </select>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo dell'hotel" value="{{ old('address', $hotel->address) }}" name="address">
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="yes" id="all_year" name="all_year" @checked(old('all_year', $hotel->all_year)) >
            <label class="form-check-label" for="all_year">
              Aperto tutto l'anno
            </label>
        </div>

        <a href="/hotels" class="btn btn-secondary">Indietro</a>

        <button type="submit" class="btn btn-primary">Salva</button>

        </form>

        @if($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</body>
</html>
