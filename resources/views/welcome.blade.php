<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tanganica1</title>

        <style>  
            table, th, td {
                border: 1px solid black;
                margin-left: auto;
                margin-right: auto;
            }
            td{
                padding: 10px;
            }
            h1,div{
                text-align: center;
                margin-top: 100px;
            }
        </style>
    </head>
    <body>
        <h1>Seznam všech eshopu</h1>
        <div>
            <h3><a href="{{ route( 'shopsCreate' ) }}" role="button">Vytvořit shop</a></h3>
            <!-- If delete successful -->
            @if(Session::has('success'))
                <div id="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
        <div>
        <table>
            <tr>
                <th>Url</th>
                <th>Datum Vytvoření</th>
                <th>Poznámky</th>
                <th colspan="2">Možnosti</th>
            </tr>
            @foreach ($shops as $shop)
            <tr>
                <td>{{$shop['url']}}</td>
                <td>{{$shop['created_at']}}</td>
                <td>{{$shop['notes']}}</td>
                <td>
                <a href="{{ route( 'shopsEdit', [ 'slug' => $shop['slug'] ] ) }}" role="button">Editovat</a>
                </td>
                <td>
                <form method="POST" action="{{ route( 'shopsDestroy', [ 'slug' => $shop['slug'] ] ) }}">
                    @csrf
                    @method('delete')
                    <button type="submit">
                    Smazat
                    </button>
                </form>
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
