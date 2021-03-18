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
                max-width: 480px;
            }
        }

    </style>

    <form action="{{ route('babyshowers.store') }}" method="post">
        @csrf
        <img class="w-16 md:w-20 lg:w-30" src="{{ asset('/logo.png') }}" alt="">
        <hr>
        <h1>¡Bienvenidos!</h1>
        <p>Desde este sistema podrás crear tu Babyshower y una lista de reagalos para ese día, con los mejores productos
            de <b>Babytuto.com</b></p>

        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <fieldset>
            <legend><span class="number">1</span> Información de los papas</legend>
            <label for="name_mama">Nombre de la mamá:</label>
            <input type="text" id="name_mama" name="name_mama" required>

            <label for="name_papa">Nombre del papá:</label>
            <input type="text" id="name_papa" name="name_papa" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>

        </fieldset>

        <fieldset>
            <legend><span class="number">2</span> Información del bebe</legend>
            <label for="name_bebe">Nombre del bebe:</label>
            <input type="text" id="name_bebe" name="name_bebe" required>

            <label for="birth_date">Fecha de nacimiento aprox.</label>
            <input type="date" id="birth_date" name="birth_date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                max="{{ Carbon\Carbon::now()->addMonths(4)->format('Y-m-d') }}" required>
            <small style="color: #AAA" id="emailHelp" class="form-text text-muted">Para hacer el babyshower, debes tener
                por lo menos 5 meses de embarazo</small>

            <label for="event_date">Fecha del babyshower</label>
            <input type="date" id="event_date" name="event_date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"
                max="{{ Carbon\Carbon::now()->addMonths(4)->format('Y-m-d') }}" required>

        </fieldset>



        <button type="submit">¡Crear mi Babyshower!</button>

    </form>

</body>

</html>
