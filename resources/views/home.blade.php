{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Home page</title>--}}

{{--    @livewireStyles--}}
{{--</head>--}}
{{--<body>--}}
{{--        @--}}
{{--    {{  }}--}}

{{--    --}}

{{--    <table>--}}
{{--        <tr>--}}
{{--            <th>Сотрудник</th>--}}
{{--            <th>Кол-во посещений</th>--}}
{{--        </tr>--}}
{{--        @foreach($visits as $visit)--}}
{{--            <tr>--}}
{{--                <td>{{$visit->telegram_user->name}}</td>--}}
{{--                <td>{{$visit->total}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    </table>--}}

{{--    @livewireScripts--}}
{{--</body>--}}
{{--</html>--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Таблица лидеров</title>
    @vite(['resources/scss/app.scss'])
</head>
<body>
<div class="leaderboard">
    <div class="leaderboard__wrapper">
        <div class="leaderboard__logo-wrapper">
            <img class="leaderboard__logo" alt="" src="{{ asset('build/assets/images/images/logo.svg') }}">
        </div>
        <div class="leaderboard__banner-block banner">
            <img alt="" class="banner__rect_2" src="{{ asset('build/assets/images/images/banner/banner-rect-2.png') }}">
            <img alt="" class="banner__blob_1_rect" src="{{ asset('build/assets/images/images/banner/banner-blob-1-rectangle.png') }}">
            <img alt="" class="banner__blob_2" src="{{ asset('build/assets/images/images/banner/banner-blob-2.png') }}">
            <img alt="" class="banner__blob_1" src="{{ asset('build/assets/images/images/banner/banner-blob-1.png') }}">
            <img alt="" class="banner__image" src="{{ asset('build/assets/images/images/banner/banner-man.png') }}">
            <img alt="" class="banner__text" src="{{ asset('build/assets/images/images/banner/banner-text.png') }}">
        </div>
        <div class="leaderboard__qr-block qr">
            <div class="qr__header">
                <img alt="" src="{{ asset('build/assets/images/images/blob.png') }}">
            </div>
            <div class="qr__content">
                <div class="qr__image-wrapper">
                    <img alt="" class="qr__image" src="{{ asset('build/assets/images/images/qr-code.svg') }}">
                </div>
                <livewire:code/>

                <div class="qr__code-subtitle">код для бота</div>
            </div>
            <div class="qr__footer">
        <span>
          Сканируй QR и пиши<br> код боту каждый раз,<br> когда приходишь в<br> офис. Получай баллы<br> и выигрывай нашивки
        </span>
            </div>
        </div>
        <div class="leaderboard__table-block table">
            <div class="table__header">
                <div class="table__title-wrapper">
                    <div class="table__icon-wrapper">
                        <img alt="" class="table__icon" src="{{ asset('build/assets/images/images/crown.svg') }}">
                    </div>
                    <div class="table__title">Таблица лидеров</div>
                </div>
                <div class="table__subtitle">разработчиков-звезд</div>
            </div>
            <div class="table__wrapper">
                <table>
                    <tbody>
                    @foreach($visits as $visit)
                        <tr class="table__row table-row">
                            <td>
                                <div class="table-row__icon-wrapper">
                                    <svg class="table-row__icon" width="28" height="28" viewBox="0 0 28 28" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3309 3.20243C12.8453 1.57055 15.1547 1.57054 15.669 3.20242L17.6916 9.619L24.4191 9.55971C26.13 9.54463 26.8437 11.7409 25.4506 12.7344L19.9731 16.6408L22.1084 23.0207C22.6515 24.6433 20.7832 26.0007 19.4078 24.9828L14 20.9805L8.59217 24.9828C7.21684 26.0007 5.34853 24.6433 5.89159 23.0207L8.0269 16.6408L2.54937 12.7344C1.15632 11.741 1.86993 9.54463 3.5809 9.55971L10.3084 9.619L12.3309 3.20243ZM14 4.89276L12.2334 10.4974C12.0021 11.2313 11.3184 11.728 10.5489 11.7212L4.67274 11.6694L9.45712 15.0815C10.0836 15.5283 10.3448 16.3319 10.1005 17.0617L8.23544 22.6343L12.9589 19.1384C13.5775 18.6806 14.4225 18.6806 15.0411 19.1384L19.7646 22.6343L17.8995 17.0617C17.6552 16.3319 17.9163 15.5283 18.5429 15.0815L23.3272 11.6694L17.4511 11.7212C16.6816 11.728 15.9979 11.2313 15.7666 10.4974L14 4.89276Z" fill="currentColor" fill-opacity="0.76"/>
                                    </svg>
                                </div>
                                <span class="table-row__text">{{$visit->telegram_user->name ?? ''}}</span>
                            </td>
                            <td>
                                <span class="table-row__tag">@...</span>
                            </td>
                            <td>
                                <div class="table-row__rate">{{$visit->total}}</div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

