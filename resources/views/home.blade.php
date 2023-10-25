<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home page</title>

    @livewireStyles
</head>
<body>

    <livewire:code/>

    <table>
        <tr>
            <th>Сотрудник</th>
            <th>Кол-во посещений</th>
        </tr>
        @foreach($visits as $visit)
            <tr>
                <td>{{$visit->telegram_user->name}}</td>
                <td>{{$visit->total}}</td>
            </tr>
        @endforeach
    </table>

    @livewireScripts
</body>
</html>
