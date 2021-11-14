<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tanganica1</title>

        <style>      
            div{
                text-align: center;
                margin-top: 100px;
            }  
            button{
                margin-top: 10px;
            }
            form{
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div>
            <h1>Vytváření eshopu</h1>
            <!-- If successful create/update -->
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
            @endif

            <h3><a href="{{ route( 'shopsHome' ) }}" role="button">Seznam Shopů</a></h3>
            <form action="{{ route( 'shopsCreate' ) }}" method = "POST">
                @csrf
                <label for="url">URL eshopu:</label><br>
                <input type="text" id="url" name="url" value=""><br>
                <label for="notes">Poznámky:</label><br>
                <textarea id="notes" name="notes" rows="4" cols="50" value=""></textarea><br>
                <button type="submit">Uložit</button>
            </form>

            
            <!-- If Errors create/update -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                @endforeach
            @endif
        </div>
    </body>
</html>
