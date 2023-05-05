<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elenco hotels</title>
    @include('bootstrap')
</head>
<body>
    <div class="container">


        <h1>{{ __('hotel_list') }}</h1>

        <a href="/hotels/create">Inserisci nuovo hotel</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Stelle</th>
                    <th>Indirizzo</th>
                    <th>Aperto tutto l'anno</th>
                    <th>Ultima modifica</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{$hotel->name}}</td>
                        <td>{{$hotel->stars}}</td>
                        <td>{{$hotel->address}}</td>
                        <td>
                            @if($hotel->all_year)
                                Si
                            @else
                                No
                            @endif
                        </td>
                        <td>
                            @if($hotel->updated_at)
                            {{$hotel->updated_at->format('d/m/Y H:i:s')}}
                            @endif
                        </td>
                        <td>
                            <a href="/hotels/edit/{{$hotel->id}}">Modifica</a>
                            <a href="/hotels/delete/{{$hotel->id}}">Elimina</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('footer')
</body>
</html>
