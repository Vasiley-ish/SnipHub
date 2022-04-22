@extends('./layouts/snipHubLayout')

@section('content')

<h1 class="title title--main">Личный кабинет</h1>
<span class="title main--subtitle">{{Auth::user()->name}}</span>

<div class="tabs">
   
   <div class="tabs-header">
      <div class="tab tab--selected js-tab-trigger" data-tab="1">Мои заявки</div>
      <div class="tab js-tab-trigger" data-tab="2">Заказать звонок</div>
      <div class="tab js-tab-trigger" data-tab="3">Записаться на консультацию</div>
   </div>
   
   
   <div class="tabs-content">
      <div class="page page--active js-tab-content" data-tab="1">Текст 1</div>
      <div class="page js-tab-content" data-tab="2">Текст 2</div>
      <div class="page js-tab-content" data-tab="3">Текст 3</div>
   </div>
   
</div>


<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="{{URL::asset('js/sweetAlert.js')}}"></script>
<script src="{{URL::asset('js/alert.js')}}"> </script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
 var jsTriggers = document.querySelectorAll('.js-tab-trigger');

jsTriggers.forEach(function(item, i) {
   item.addEventListener('click', function() {
      var tabName = this.dataset.tab,
          tabContent = document.querySelector('.js-tab-content[data-tab="'+tabName+'"]');
      
      document.querySelectorAll('.js-tab-content.page--active').forEach(function(item, i){
         item.classList.remove('page--active');
      });
      
      document.querySelectorAll('.js-tab-trigger.tab--selected').forEach(function(item, i){
         item.classList.remove('tab--selected');
      });      
      
     tabContent.classList.add('page--active');
      this.classList.add('tab--selected');
   });
})
  </script>

@endsection