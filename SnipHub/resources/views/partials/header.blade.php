<div id="header" class="somthing" style="z-index: 99">
     
    <header class="header" :class="{header_visible:visible}">
        <a href="/" class="logo logo__header">
            <img class="logo__header" src="{{URL::asset('img/logo.png')}}" alt="Snip HUB">
        </a>
        <nav class="navigation header__navigation">
            <a href="/" class="navigation__link link">Главная</a>
            <a href="{{route('price')}}" class="navigation__link link">Цены</a>
            <a href="/#servises" class="navigation__link link">Наши Услуги</a>
            <a href="/#otz" class="navigation__link link">Отзывы</a>
        </nav>
        <nav class="navigation user">
            @if(!Auth::user())
                <a href="/login" class="navigation__link link">Войти</a>
                <a href="/register" class="navigation__link link">Зарегистрироваться</a>
            @endif
            @if(Auth::user())

            @switch(Auth::user()->name)
            @case('Админ')
            <a href="{{route('admin')}}" class="navigation__link link">Админ</a>
            @break
            
            @default
            <a href="{{route('dashboard')}}" class="navigation__link link">Личный кабинет</a>
        @endswitch

                <form class="nom" method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <x-dropdown-link  class="navigation__link link" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Выход') }}
                    </x-dropdown-link>
                </form>
             @endif
          
        </nav>
    </header>

    <button @click="toggleHeader(visible)" :class="{burger_translate: visible}" class="burger header__burger" id="showHeader">
        <!-- v-bind:class это то же, что и :class -->
        <div :class="{burgerbar_top: visible}" class="burger-bar" id="burger-top"></div>
        <div :class="{burgerbar_middle: visible}" class="burger-bar" id="burger-middle"></div>
        <div :class="{burgerbar_bottom: visible}" class="burger-bar" id="burger-bottom"></div>
    </button>
</div>

<div class="upp-button">^</div>

<script defer>
    $(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 400) {
    $('.upp-button').addClass('upp-button-visible');
  } else {
    $('.upp-button').removeClass('upp-button-visible');
  }
});

$(".upp-button").click(function () {
  $("html, body").animate({
    scrollTop: 0
  }, 500)
})
</script>