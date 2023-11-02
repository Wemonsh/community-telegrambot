<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Таблица лидеров</title>
    @vite(['resources/scss/app.scss'])
    @livewireStyles
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
            <livewire:leader-board/>
            </div>
        </div>
    </div>
</div>
@livewireScripts
</body>
</html>

