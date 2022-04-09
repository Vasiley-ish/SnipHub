@extends('./layouts/snipHubLayout')

@section('content')

<h1 class="title title--main">Заявки пользователей</h1>

<div class="messages-container">
@foreach ($messages as $message)

    <div class="card card--message mr-lr">
   <small>  Просмотрено?
@if ($message->read == 0)
    НЕТ
@else
    ДА
@endif
 </small>
        <p class="text">Заявка клиента {{$message->author}}</p>
        <p class="title subtitle index">{{$message->servise}}</p>
        <p class="text">{{$message->message}}</p>

        @switch($message->how_to_contact)
            @case('u-call')
                <p class="text text--fancy">Клиент позвонит нам. Указан номер {{$message->phone}}</p>   
                @break
            @case('u-come')
            <p class="text text--fancy">Клиент собирается прийти к Нам в офис.</p>  
                @break
            @default
                <p class="text text--fancy">Клиент ожидает звонка на номер {{$message->telephone}}</p>
                <small>{{$message->created_at}}</small>
        @endswitch

<div class="messages-container">
                        <form method="post" action="{{route('delete', $message->id)}}">
                            @csrf
                        <button action="submit" class="button button--danger message__button">Отменить заявку</button>
                        </form>

                          <form method="post" action="{{route('seen', $message->id)}}">
                            @csrf
                        <button action="submit" class="button  message__button">Просмотрено</button>
                        </form>
        </div>
    </div>
@endforeach
</div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;500;600;700&display=swap');

html{
    font-size: 8px;
    scroll-behavior: smooth;
}

@media(min-width:920px){
    html{
        font-size: 10px;
    }
}

:root {
    --main-bg-color: #FFF0F3;
    --color-dark-red:#450C16;
    --color-bright-red:#A33131;
    --color-gay-blue:#5BCFFA;
    --color-gay-pink:#F2A7B6;
  }

  
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* input color */
  ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
    color: var(--color-dark-red);
  }
  ::-moz-placeholder { /* Firefox 19+ */
    color: var(--color-dark-red);
  }
  :-ms-input-placeholder { /* IE 10+ */
    color: var(--color-dark-red);
  }
  :-moz-placeholder { /* Firefox 18- */
    color: var(--color-dark-red);
  }


.body{
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    font-family: 'Exo 2';
    font-size: 1.6rem;
    color: #333;
    background-color:var(--main-bg-color);
    object-fit: cover;
    overflow-x: hidden;
}

.servise{
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

img{
    object-fit: cover;
}

.header{
    position: sticky;
    top:0;
    padding-inline: 10vw;
    min-height: 6rem;

    background: linear-gradient(267.23deg, #F2A7B6 -111.68%, #811E30 6.83%, #F6ABBA 135.18%);
    display: flex;
    align-items: center;
    z-index: 3;
}

.header__navigation{
    margin-inline-end: auto;
    max-width: 920px;
}

.navigation{
    display: flex;
    align-items: center;
}

.navigation__link{
    margin-inline: 1vw;
    min-width: 6ch;
}

.link{
    height: fit-content;
    text-decoration: none;
    padding-block: 3px;
    font-weight: 400;
    font-size: 18px;
    line-height: 21px;
    /* identical to box height */
    
    display: flex;
    align-items: center;
    text-align: center;   
    justify-content: center;

    color: var(--main-bg-color);

    background-image: linear-gradient(90deg, rgba(0,0,0,0),currentColor,currentColor,  rgba(0,0,0,0));
    background-size: 0 2px;
    background-repeat: no-repeat;
    background-position: bottom;

    transition: .15s ease-out;
}

.link:hover{
    background-size: 100% 2px;
}

.user{
    display: flex;
    align-items: center;
}

.user > :first-child::after{
    content: '|';
    margin-inline: 1ch;
}

.user > *{
    margin-inline: 0;
}

.logo{
    margin-inline: auto;
}

.logo img{
    width: 10.9rem;
    height: 4.6rem;
}

.intro__logo{
    width: 80%;
}

.phone-icon{
    width: 30px;
    aspect-ratio: 1/1;
    margin-right: 15px;
}

.title{
    font-weight: 500;
    font-size: 32px;
    line-height: 38px;
    display: flex;
    align-items: center;
    text-align: center;
    letter-spacing: 0.03em;
    
    color: var(--color-dark-red);
    margin: 0;

    z-index: -1;
}

@media(max-width:560px){
    .title{
        font-size: 24px;
        line-height: 100%;

    }
}

.title--main{
    margin-block: 70px;
    width: 100%;
    position: relative;
    display: flex;
    flex: 5 0 20ch;
    gap: 2ch;
    z-index: -1;
}

.title--main::before{
    content: '';
    background-color: var(--color-gay-pink);

    width: 100%;
    height: 4px;
    display: block;
    
    flex: 1 5 10px;
}

.title--main::after{
    content: '';
    background-color: var(--color-gay-pink);

    width: 100%;
    height: 4px;
    display: block;

    flex: 1 5 10px;
}

.title--intro{
    margin-top: 0;
    margin-bottom: 0;
    z-index: 5;
}

.advantage__title{
    margin-block:30px ;
}

.subtitle{
    font-size: 2.4rem;
}

.main--subtitle{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 16px;
    line-height: 19px;
    opacity: 0.8;
    text-align: center;
    position: relative;
    top: -62px;
    margin-inline: auto;
}

.white{
    color: var(--main-bg-color);
}

.white-bg{
    background-color: #fff;
}

.grid-intro{
    max-width: 100vw;
    min-height: calc(100vh - 6rem);
    background-color: var(--color-dark-red);

    display: grid;
    gap: 1rem;
    grid-template-areas:
    'a b c d'
    'l snip snip e'
    'k snip snip f'
    'j i h g';

    grid-template-rows: repeat(4, 24.25%);
    grid-template-columns: 25vw auto auto 25vw;

    --stager-delay:110ms;
  
    
}

@media(max-width:820px){
    .grid-intro{
        grid-template-areas:
        'd k'
        'snip snip'
        'i g';
        grid-template-rows: 1fr 2fr 1fr;
        grid-template-columns: auto auto auto;

        --stager-delay:90ms;
    }
}

@keyframes cardEntrence{
    from{
        opacity: 0;
        transform: scale(0.3);
        filter: hue-rotate(200deg);
    }
    to{
        opacity: 1;
        transform: scale(1);
        filter: hue-rotate(0);
    }

}

.intro-card{
    background-color: #A33131;
    animation: cardEntrence 700ms ease-out;
    animation-fill-mode: backwards;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.tint{
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    width: 100%;
    height: 100%;
    background-color:rgba(163, 49, 49, .2);
    max-width: 920px;
    margin-inline: auto;
}

.intro-card:nth-child(1){
    grid-area: a;
    animation-delay: calc(1 * var(--stager-delay));
    background-image: url(../img/1.jpg);
}

.intro-card:nth-child(2){
    grid-area: b;
    animation-delay: calc(2 * var(--stager-delay));
    background-image: url(../img/2.jpg);
}

.intro-card:nth-child(3){
    grid-area: c;
    animation-delay: calc(3 * var(--stager-delay));
    background-image: url(../img/3.jpg);
}

.intro-card:nth-child(4){
    grid-area: d;
    animation-delay: calc(4 * var(--stager-delay));
    background-image: url(../img/4.jpg);
}

.intro-card:nth-child(5){
    grid-area: e;
    animation-delay: calc(5 * var(--stager-delay));
    background-image: url(../img/5.jpg);
}

.intro-card:nth-child(6){
    grid-area: f;
    animation-delay: calc(6 * var(--stager-delay));
    background-image: url(../img/6.jpg);
}

.intro-card:nth-child(7){
    grid-area: g;
    animation-delay: calc(7 * var(--stager-delay));
    background-image: url(../img/7.jpg);
}

.intro-card:nth-child(8){
    grid-area: h;
    animation-delay: calc(8 * var(--stager-delay));
    background-image: url(../img/8.jpg);
}

.intro-card:nth-child(9){
    grid-area: i;
    animation-delay: calc(9 * var(--stager-delay));
    background-image: url(../img/9.jpg);
}

.intro-card:nth-child(10){
    grid-area: j;
    animation-delay: calc(10 * var(--stager-delay));
    background-image: url(../img/10.jpg);
}

.intro-card:nth-child(11){
    grid-area: k;
    animation-delay: calc(11 * var(--stager-delay));
    background-image: url(../img/11.jpg);
}

.intro-card:nth-child(12){
    grid-area: l;
    animation-delay: calc(12 * var(--stager-delay));
    background-image: url(../img/12.jpg);
}

.intro-card:last-child{
    grid-area: snip;
    animation-delay: calc(13 * var(--stager-delay));
    background-image: url(../img/13.jpg);
}

@media(max-width:820px){
    .intro-card:nth-child(1),
    .intro-card:nth-child(2),
    .intro-card:nth-child(3),
    .intro-card:nth-child(5),
    .intro-card:nth-child(6),
    .intro-card:nth-child(8),
    .intro-card:nth-child(10),
    .intro-card:nth-child(12){
        display: none;
    }

}

.content{
    min-width: 80%;
    max-width: 1200px;
    margin-inline: auto;
    margin-bottom: 185px;
}

.advantages{
    padding-block:70px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    gap: 1vw;
}


@media(max-width:820px){
    .advantages{
       flex-wrap: wrap;
    }
}

.card{
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: #fff;

}

.card--message{
    padding-block: .5vw;
    padding-inline:2vw ;
    font-size: 18px;

    flex: 1 0 40%;
}

.card--advantage{
    padding: 60px 3%;
    flex-basis:1 1 350px;
    border-radius: 8px;
    border-bottom: var(--color-gay-blue) solid 4px;
}

.card--service{
    max-width: 15ch;
}

.text--fancy{
    color: #811E30;
    font-size: .82em;
    padding-inline:16px;
}

.servese--cards{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    padding-inline: 20px;
    gap: 20px;
}

.servese--card{
    flex-basis: 200px;
    flex-grow: 1;
    object-fit: cover;
}


.card__image{
    width: 100%;
    height: 200px;
  
}

.servises{
    display: flex;
    flex-wrap: wrap;
    gap: 1vw;
}

.servise{
    background-color: #fff;
    min-height: 340px;
    border-radius: 8px;
    border: solid var(--color-gay-blue);
    border-block-start:5px;
    border-left: 1px solid var(--color-gay-blue);
    border-right: 1px solid var(--color-gay-blue);
    flex-grow: 1;
    flex-shrink: 2;
    flex-basis: 480px;
}

.servise--long{
    flex-grow: 2;
    flex-shrink: 1;
    border-color: var(--color-gay-pink);
    flex-basis: 640px;
}

.title__servise{
    margin-inline-start: 15px;
    margin-block: 0 ;
    padding: 8px;
}

.call-to-action{
    width: 100%;
    min-height: 35vh;
    padding-block: 50px;
    background: linear-gradient(267.23deg, #F2A7B6 -111.68%, #811E30 6.83%, #F6ABBA 135.18%);

    margin-block: 150px;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
}

.text--block{
    max-width: 40ch;
}

.text--centered{
    text-align: center;
}

.rounded{
    border-radius: inherit;
    margin-inline: 0;
    padding-inline-start: 15px;
}

button{
    border: none;
    cursor: pointer;
}

.button{
    padding-inline: 4ch;
    padding-block:10px ;
    letter-spacing: 0.03em;
    background-color: var(--color-gay-blue);

    color: var(--color-dark-red);
    font-weight: 600;
    text-decoration: none;
    border-radius: 5px;
    transition: 0.2s ease-out;
}

.button--category{
    background-color: var(--color-dark-red);
    color: var(--main-bg-color);
}

.button--subcategory{
    background-color: var(--color-gay-pink);
}

.button:hover{
    box-shadow: 0px 2px 12px  var(--color-gay-blue);
}

.button:active{
    filter: brightness(1.15);
}

.button--dropdown-form{
    border-radius:2px;
    background-color: var(--main-bg-color);
    border-left: 4px solid var(--color-gay-blue);
    border-bottom: 4px solid var(--color-gay-blue);
}

.button--danger{
    background-color: #A33131;
    color: rgb(255, 219, 219);
}

.message__button{
    margin-block: 42px;
}

.button--danger:hover{
    box-shadow: 0px 2px 12px  var(--color-bright-red);
}

.dropdownForm__clicked{
    border-radius:2px 2px  0px  0px ;
    background-color: var(--color-gay-blue);
    z-index:99;
}

.form{
    background-color: #fff;
    padding-inline:15px ;
    padding-block: 30px;
}

.form-line{
    display: flex;
    gap: 8px;
    align-items: center;
    flex-wrap: wrap;
}

.form--category{
    border: var(--color-bright-red) solid 2px;
    border-radius: 6px;
}

.form--subcategory{
    border: var(--color-gay-pink) solid 2px;
    border-radius: 6px;
    margin-top: 20px;
}

.form--message{
    z-index: 1;
    max-width: 560px;
    border-left: 4px solid var(--color-gay-blue);
    border-bottom: 4px solid var(--color-gay-blue);
    visibility: hidden;

    transform: scale(1 , 0);

    transition:all .5s ease-out;

    position: relative;
    bottom: 140px;

    opacity: 0;
}

.form__clicked{
    
    visibility: visible;
    bottom: 0;

    transform: scale(1 , 1);

    opacity: 1;
    border-left: 4px solid var(--color-gay-blue);
    border-bottom: 4px solid var(--color-gay-blue);

    box-shadow: 0px 4px 30px 20px rgba(91, 207, 250, 0.6);
}

.form__item{
    display: flex;
    justify-content: space-evenly;

    margin-bottom: 12px;
}

#messageForm{
    height: fit-content;
    margin-bottom: -260px;
}
.label{
    width: 100%;
    max-width: 240px;
}

.input{
    padding-inline: .5em;
    padding-block: 3px;

    border-color: var(--color-gay-blue);

    border-radius: 4px;
}

::placeholder {
    color: #5BCFFA;;
    font-size: .9em;
  }

.input--message{
    width: 100%;
    max-width: 240px;
}

input[type=text] {
    border: solid 1px #5BCFFA;
}

input[type=text].input--category {
    border: solid 1px var(--color-bright-red);
}

input[type=text].input--category:focus {
  outline-color:  var(--color-bright-red);
}

input[type=text].input--subcategory {
    border: solid 1px var(--color-gay-pink);
}

input[type=text].input--subcategory:focus {
   outline-color: var(--color-gay-pink);
}

.input--category{
    border-color: var(--color-bright-red);
}

.input--subcategory{
    border-color: var(--color-gay-pink);
}

.footer{
    margin-top: auto;
    background: linear-gradient(267.79deg, #F2A7B6 -82.5%, #811E30 84.37%, #F6ABBA 136.94%);
    padding: 2vw 4vw;

}

.logo__footer{
    width: 234px;
}

.title--footer{
    font-weight: 500;
    font-size: 24px;
    line-height: 42px;
}

.list{
   list-style: none;
   font-size: 2.4rem;
}

.list__item{
    margin-top: 6px;
    width: fit-content;
}

.list--first > .list__item{
    margin-block: 16px;
}

.list--first > .list__item::before{
    content: ' ';
    background-color: var(--color-bright-red);
    display: block;
    width: 10px;
    height: 1em;
    position: absolute;
    transform: translateX(-16px);
    z-index: -1;
}

.list--second{
    font-size: 2rem;
}

.list--second > .list__item::before{
    content: ' ';
    background-color: var(--color-gay-pink);
    display: block;
    width: 12px;
    height: 0.8em;
    position: absolute;
    transform: translate(-20px, 0.2em);
    z-index: -1;
}

.link--list{
    color: var(--color-dark-red);
    font-size: 2.4rem;
}

.link--list__second{
    color: var(--color-bright-red);
    list-style: none;
    font-size: 2rem;
}

@media(max-width:950px){

    .grid-intro{
        max-width: 100vw;
        min-height:100vh;
    }

    .header{
        position: fixed;
        width: 100vw;
        height: 100vh;
        background: rgba(69, 12, 22, .9);
        flex-direction: column;
        padding-block: 10vw;
        padding-inline: 0;
    }

    .logo__header{
        order: 3;
        width: 100vw;
        margin-block-end: auto;
        margin-block-start: 2vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }    

    .logo img{
        width: 80vw;
        height: fit-content;
    }

    .navigation {
        margin-top: auto;
        flex-direction: column;
        display: flex;
        align-items: center;
    }

    .navigation .link{
        font-size: 4vh;
        line-height: 140%;
    }

    .header__navigation{
        margin-inline: auto;
    }

    .burger{
        background: none;
        z-index: 99;
        transition: .4s ease-out;
    }

    .burger::before{
        content: '';
        background-color: #A33131;
        position: fixed;
        top: 10px;
        right: 10px;
        width: 50px;
        height: 46px;
        z-index: -1;
        filter: blur(12px);
        opacity: .2;
    }
    .burger::after{
        content: '';
        background-color: var(--color-bright-red);
        position: fixed;
        top: 10px;
        right: 10px;
        width: 50px;
        height: 46px;
        z-index: -1;
        filter: blur(8px);
        opacity: .5;
    }

    .header__burger{
        position: fixed;
        top: 10px;
        right: 10px;
    }

    .burger-bar{
        width: 40px;
        height: 3px;
        margin-top: 8px;
        background-color: var(--main-bg-color);
        border-radius: 2px;
        transition: .4s ease-out;
    }

    .burgerbar_middle{
        opacity: 0;
    }

    .burgerbar_top{
        transform: rotate(45deg)
         translateX(16px );
    }

    .burgerbar_bottom{
        transform: rotate(-45deg)
         translateX(16px );
    }

    .burger_translate{
        transform: translateX(-8px);
    }

    .header{
        transition: .4s ease-out;
        opacity: 0;
        visibility: hidden;
    }

    .header_visible{
        opacity: 1;
        visibility: visible;
    }

    .user > :first-child::after{
        content: '';
        margin-inline: 0;
    }
}

.table{
    display: grid;
    gap: .2em;
    margin-top: 1.2em;
}

.priceSection{
    margin-bottom: 72px;
}

.threeCols{
    grid-template-columns: repeat(3, 1fr);
}

.fourCols{
    grid-template-columns: repeat(4, 1fr);
}

.fiveCols{
    grid-template-columns: repeat(5, 1fr);
}

.sixCols{
    grid-template-columns: repeat(6, 1fr);
}

.sevenCols{
    grid-template-columns: repeat(7, 1fr);
}

.eightCols{
    grid-template-columns: repeat(8, 1fr);
}

.nineCols{
    grid-template-columns: repeat(9, 1fr);
}

.tenCols{
    grid-template-columns: repeat(10, 1fr);
}

.tableItem{
    background-color: #fff;
    padding: .5em;
    font-size: calc(6px + 0.6vw);
    border-radius: 4px;

    display: grid;
    place-items: center;
    text-align: center;

    text-transform: capitalize;
}

.tableTopCorner{
    font-weight: 600;
    border: var(--color-bright-red) solid 2px;
}

.tableTop{
    font-weight: 600;
    border-block: var(--color-bright-red) solid 2px;
}

.tableSide{
    font-weight: 500;
    color: var(--color-dark-red);
    border-inline: var(--color-bright-red) solid 2px;
}

.tableOddRow{
    border-block: var(--color-gay-pink) solid 2px;
}

.tableEvenRow{
    border-block: var(--color-gay-blue) solid 2px;
}

.tapleItem{
    text-align: center;
}

.taplePrise{
    color: var(--color-dark-red);
    font-weight: 300;
}

.somthing{
  position: sticky;
  top: 0;
  width: 100vw;
}

.pad-lr{
    padding-inline: 1em;
}

.mr-lr{
    margin-inline: auto;
}

.index{
    z-index: 0;
}

.messages-container{
    display:flex;
    align-items:center;
    gap:2ch;
    flex-wrap:wrap;
}
</style>
@endsection