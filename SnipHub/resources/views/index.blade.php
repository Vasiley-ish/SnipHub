@extends('./layouts/snipHubLayout')

@section('intro')   
@include('partials/intro')
@endsection

@section('content')
<div class="advantages" id="about">
    <div class="card card--advantage index">
        <img src="{{URL::asset('img/best-icon.png')}}" alt="w">
        <p class="title subtitle advantage__title">Преимущество 1</p>
        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi consequuntur
            optio atque ameandae!</p>
    </div>
    <div class="card card--advantage index">
        <img src="{{URL::asset('img/best-icon.png')}}" alt="w">
        <p class="title subtitle advantage__title">Преимущество 2</p>
        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi consequuntur
            optio atque ameandae!</p>
    </div>
    <div class="card card--advantage">
        <img src="{{URL::asset('img/best-icon.png')}}" alt="w">
        <p class="title subtitle index advantage__title">Преимущество 2</p>
        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci eligendi consequuntur
            optio atque ameandae!</p>
    </div>
</div>

<h1 class="title title--main" id="servises">Наши услуги</h1>

<div class="servises">
    <div class="servise servise--long">
        <p class="title title__servise subtitle white-bg  rounded">Пошив одежды</p>
        <div class="servese--cards">
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/12.jpg')}}" alt="ds">
                <p class="text--centered">Индивидуальный пошив одежды</p>
            </div>
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/13.jpg')}}" alt="ds">
                <p class="text--centered">Пошив сценической одежды</p>
            </div>
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/11.jpg')}}" alt="ds">
                <p class="text--centered">Индивидуальный пошив одежды</p>
            </div>
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/11.jpg')}}" alt="ds">
                <p class="text--centered">Индивидуальный пошив одежды</p>
            </div>
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/11.jpg')}}" alt="ds">
                <p class="text--centered">Индивидуальный пошив одежды</p>
            </div>
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/9.jpg')}}" alt="ds">
                <p class="text--centered">Индивидуальный пошив одежды</p>
            </div>
        </div>
    </div>

    <div class="servise" style="background-image: url({{URL::asset('img/rackroika.jpg')}});">
        <p class="title title__servise subtitle white-bg  rounded">Раскройка ткани</p>
    </div>

    <div class="servise" style="background-image: url({{URL::asset('img/1-tekstilnaya-produktsiya.jpg')}});">
        <p class="title title__servise subtitle white-bg  rounded" >Пошив текстильного интерьера</p>
    </div>

    <div class="servise servise--long">
        <p class="title title__servise subtitle white-bg  rounded">Ремонт одежды</p>
        <div class="servese--cards">
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/12.jpg')}}" alt="ds">
                <p class="text--centered">Индивидуальный пошив одежды</p>
            </div>
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/13.jpg')}}" alt="ds">
                <p class="text--centered">Пошив сценической одежды</p>
            </div>
            <div class="card servese--card">
                <img class="card__image" src="{{URL::asset('img/11.jpg')}}" alt="ds">
                <p class="text--centered">Индивидуальный пошив одежды</p>
            </div>
        </div>
    </div>
</div>

<div class="call-to-action">
    <p class="title white pad-lr index">Оформите заказ и мы с вами свяжемся!</p>
    <p class="text white text--block pad-lr">Snip HUB готов проконсультировать своих клиентов и выполнить заказ любой
        сложность от пошива и ремонта одежды до изготовления чехлов и постельного белья!</p>
    <a class="button" href="{{route('dashboard')}}">Оформить заказ</a>
</div>

<h1 class="title title--main">Каталог</h1>
<span class="title main--subtitle">Нажмите на ссылку и просматривайте наши цены</span>

@include('partials/servisesList')

@endsection