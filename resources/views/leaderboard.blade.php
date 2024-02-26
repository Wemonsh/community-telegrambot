<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leaderboard</title>
</head>
<body>
    @foreach($leaders as $period => $users)
        <h1>{{ $period }}</h1>
        <table>
            <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->telegram_user->name }}</td>
                <td>{{ $user->total }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach

    <style>
        table, th, td {
            border: 1px solid;
        }
        table {
            border-collapse: collapse;
        }
    </style>
</body>
</html>
