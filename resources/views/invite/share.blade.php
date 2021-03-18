<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Babyshower</title>
</head>

<body>
    <style>
        *,
        *:before,
        *:after {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: #384047;
            background-color: #DDD;
        }

        form {
            max-width: 300px;
            margin: 10px auto;
            padding: 10px 20px;
            background: #f4f7f8;
            border-radius: 8px;
        }

        h1 {
            margin: 0 0 30px 0;
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        input[type="datetime"],
        input[type="email"],
        input[type="number"],
        input[type="search"],
        input[type="tel"],
        input[type="time"],
        input[type="url"],
        textarea,
        select {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            font-size: 16px;
            height: auto;
            margin: 0;
            outline: 0;
            padding: 15px;
            width: 100%;
            background-color: #e8eeef;
            color: #8a97a0;
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
            margin-bottom: 30px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin: 0 4px 8px 0;
        }

        select {
            padding: 6px;
            height: 32px;
            border-radius: 2px;
        }

        button {
            padding: 19px 39px 18px 39px;
            color: #FFF;
            background-color: #4bc970;
            font-size: 18px;
            text-align: center;
            font-style: normal;
            border-radius: 5px;
            width: 100%;
            border: 1px solid #3ac162;
            border-width: 1px 1px 3px;
            box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
            margin-bottom: 10px;
        }

        fieldset {
            margin-bottom: 30px;
            border: none;
        }

        legend {
            font-size: 1.4em;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        label.light {
            font-weight: 300;
            display: inline;
        }

        .number {
            background-color: #5fcf80;
            color: #fff;
            height: 30px;
            width: 30px;
            display: inline-block;
            font-size: 0.8em;
            margin-right: 4px;
            line-height: 30px;
            text-align: center;
            text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
            border-radius: 100%;
        }

        @media screen and (min-width: 480px) {
            form {
                max-width: 800px;
            }
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

    </style>

    <form action="{{ route('babyshowers.store') }}" method="post">
        @csrf
        <img class="w-16 md:w-20 lg:w-30" src="{{ asset('/logo.png') }}" alt="">
        <hr>
        <h1>¡Te espero en mi Babyshower!<br>{{ $baby->name_bebe }}</h1>
        <p>Mis papás, <b>{{ $baby->name_mama }}</b> y <b>{{ $baby->name_papa }}</b>, tienen una lista de regalos con
            los
            mejores productos de
            <b>Babytuto.com</b>. ¡Pasa a verlos!
        </p>
        <hr>


        <table id="customers">
            <tr>
                <th>Producto</th>
                <th>Valor</th>
                <th>Comprar</th>
            </tr>
            @foreach ($baby->products as $key => $product)
                <tr>
                    <td width="60%"><a href="https://www.babytuto.com/productos/{{$product->uri}}" target="_blank">{{$product->name}}</a></td>
                    <td width="20%">${{number_format($product->price,0,',','.')}}</td>
                    <td width="20%">
                        @if($product->sold==0)
                            <button @click.stop="comprar($event, {{$product->id}})">¡Comprar!</button>
                        @else
                            Producto vendido :(
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>


    </form>

</body>

</html>
