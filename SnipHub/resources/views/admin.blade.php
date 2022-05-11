@extends('./layouts/snipHubLayout')

@section('content')

    <span class="title title--main js-page-title"></span>

    <div class="tabs-header">
        <a href="#tab1" class="tab js-tab-trigger" data-tab="1">Записи на консультацию</a>
        <a href="#tab2" class="tab js-tab-trigger" data-tab="2">Заказанные звонки</a>
        <a href="#tab3" class="tab js-tab-trigger" data-tab="3">Редактировать список услуг</a>
    </div>


    <div class="tabs-content">

        
        <div class="page page--active js-tab-content" data-tab="#tab1">
       
           
            <form method="post" action="{{route('deleteOutdatedAppointments')}}">
                    @csrf
                    <button class="button button--danger button__admin-page"> Удалить все неактуальные заявки  </button>
                </form>

<br><br>
           @foreach ($appointments as $appointment)

        @if ($appointment->day < date('Y-m-d'))
        <div class="card card--appointment outdated">
        @elseif($appointment->day == date('Y-m-d'))
        <div class="card card--appointment today">
        @else
        <div class="card card--appointment">
        @endif        

                <p class="card__datetime"> <strong>{{$days[(date('w', strtotime($appointment->day)))]}}</strong>, {{date("d", strtotime($appointment->day))}} {{$monthes[(date('n', strtotime($appointment->day)))] }} в <strong>{{$appointment->time}}</strong></p>
                <p>Клиент {{$appointment->user_name}}</p>
                <form class="appointment__delete" method="post" action="{{route('deleteAppointment', $appointment->id)}}">
                    @csrf
                    <button class="show_confirm ">
                        <img class="img__delete img--click" src="{{URL::asset('img/delete.png')}}" alt="X" title="Удалить">
                    </button>
                </form>
            </div>
            
           @endforeach
        </div>
        
        <div class="page page--active js-tab-content" data-tab="#tab2">
        @foreach ($calls as $call)

        <div class="card card--appointment">

         
            <p>Клиент {{$call->user}}</p> 

            <p>Телефон {{$call->phone}}</p>
            
        
        </div>
    
   @endforeach
        </div>

        <div class="page js-tab-content" data-tab="#tab3">

        <form class="form form-line form--category" action="admin/addCategory" method="post">
    @csrf
    
<label for="newCategory">Добавить новую категорию</label>
<input  class="input input--category" type="text" name="newCategory" id="newCategory" placeholder="Новая категория услуги">


<button class="button button--category">Создать категорию</button>
</form>

<form class="form form-line form--subcategory" action="addSubcategory" method="post">
    @csrf

<div>
    <label for="newCategory">Добавить новую подкатегорию</label>
    <input  class="input input--subcategory" type="text" name="newSubcategory" id="newSubcategory" placeholder="Новая категория услуги">
</div>


<div>
    <label for="category input--subcategory">Для категории</label>
    <select class="input input--category" name="category" id="category">
       @foreach ($cats as $item)
             <option value="{{$item->category_name}}">{{$item->category_name}}</option>
       @endforeach
    
    </select>
</div>

<button class="button button--subcategory">Создать подкатегорию</button>   
</form>

@include('partials/servisesList')
        </div>

        
    </div>


<script>

</script>


@endsection