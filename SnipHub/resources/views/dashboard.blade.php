@extends('./layouts/snipHubLayout')

@section('content')



<h1 class="title title--main">Личный кабинет</h1>
<span class="title main--subtitle">{{Auth::user()->name}}</span>

<div class="tabs">

    <div class="tabs-header">
        <a href="#tab1" class="tab js-tab-trigger" data-tab="1">Мои заявки</a>
        <a href="#tab2" class="tab js-tab-trigger" data-tab="2">Заказать звонок</a>
        <a href="#tab3" class="tab js-tab-trigger" data-tab="3">Записаться на консультацию</a>
        <a href="#tab4" class="tab js-tab-trigger" data-tab="4">Написать отзыв</a>
    </div>


    <div class="tabs-content">

        <div class="page js-tab-content" data-tab="#tab1">
            <p class="title transparent no-requisition_page no-requisition">У вас нет активных заявок</p>

            @foreach($user_appointment as $appointment)
            <div class="card card--appointment">
                
                <p class="card__datetime"> <strong>{{$days[(date('w', strtotime($appointment->day)))]}}</strong>, {{date("d", strtotime($appointment->day))}} {{$monthes[(date('n', strtotime($appointment->day)))] }} в <strong>{{$appointment->time}}</strong></p>
                <p>Ждем Вас, {{Auth::user()->name}}</p>
                <form class="appointment__delete" method="post" action="{{route('deleteAppointment', $appointment->id)}}">
                    @csrf
                    <button class="show_confirm ">
                        <img class="img__delete img--click" src="{{URL::asset('img/delete.png')}}" alt="X" title="Удалить">
                    </button>
                </form>
            </div>
            @endforeach

        </div>

        <div class="page js-tab-content" data-tab="#tab2">
            <form class="form" action="{{route('orderCall')}}" method="post" autocomplete="off">
                @csrf

                <p class="text text--oneliner">Оставте свой номер телефона и вскоре мы вам позвоним!</p>
                <div class="fancy-input">
                    <input  type="text" name="phone" id="phone" placeholder="+7 (999) 000 11 22" oninput="phoneNumberFormatter()"/>
                    <label for="phone">Ваш номер телефона:</label>
                </div>
                <button class="button button__form" id="submitPhoneButton" disabled>Заказать звонок</button>
            </form>
        </div>

        <div class="page js-tab-content " data-tab="#tab3" id="appointmentApp">
            <p class="text text--oneliner">Назначте консультацию на удобное Вам время и мы будем Вас ждать!</p>

            <div class="grid">

         <?php
         //выводит пустые div в таблицу для выравнивания календаря
         $date=date('Y.d.m');
         $a = 1;
         while ($days[(date('w', strtotime($date)))] != 'Пн') {
            $days[(date('w', strtotime($date)))];
            $date=date('d.m.Y', strtotime("-$a day"));
            echo  '<div background-color="white"></div>';

            $a++;
         }
        
                for ($i=0; $i < 28; $i++)  { 
                    $date=date('d.m.Y', strtotime("+$i day")); //переменая с текущим днем, потом будет выводится текущий день + $i
                    $msqlDate=date('Y-m-d', strtotime("+$i day")); //переменая с текущим днем, в формате для MSQL
                    

                    if ($days[(date('w', strtotime($date)))]==$days[6]) { // Пропускает Воскресенье
                       $i++;
                    }
                    
                    $weekDay = $days[(date('w', strtotime($date)))];
                    $day = date('d', strtotime($date));
                    $month = $monthes[(date('n', strtotime($date)))];
                    $year = date('Yг.', strtotime($date));

                    
                  echo  '<div class="grid-day js-day-selector" id="',$msqlDate,'" data-weekday="',$weekDay,'" onClick="selectDay(this.id, this.dataset.weekday)">
                    <strong> ',$weekDay,'  </strong>
                    <span>
                        ',$day,' 
                        ',$month,'
                    </span>
                    <small> ',$year,' </small>
                   </div>';
                }
            ?>
            
        </div>
        <div class="grid grid--time js-time-selection">
            <!-- Время записи будет выводится динамически -->
        </div>

        <form class="form__appointment" action="{{route('makeAppointment')}}" method="post" >
            @csrf
            <div class="fancy-input" style="display:none">
               <input class="input--appointment" type="text" name="apointmentDay" id="apointmentDay" placeholder="a"  v-model="dayOfAppointment">
               <label class="label__appointment" for="apointmentDay">День консультации:</label>
            </div>
            <div class="fancy-input" style="display:none">
               <input class="input--appointment" type="text" name="apointmentTime" id="apointmentTime" placeholder="a"  v-model="timeOfAppointment">
               <label class="label__appointment" for="apointmentTime">Время консультации:</label>
            </div>
            <input type="text" value="{{Auth::user()->email}}" id="email" name="email" style="display:none">
            <button class="button appointment__button" disabled >Записаться на консультацию</button>
        </form> 
    </div>

    <div class="page js-tab-content" data-tab="#tab4">
          
        <p class="text text--oneliner">Воспользовались нашими услугами? Оцените нашу работу и оставте отзыв!</p>

        <form class="form__comment" action="{{route('makeComment')}}" method="post"  enctype="multipart/form-data" >
            @csrf
            <div class="file-previw">
                <input type="file" name="photo" id="photo" required>
                <img class="image-preview" src="" alt="Превью Изображения">
            </div>
            <div class="otxiv-form-container">
                <textarea class="input" name="comment" id="comment" cols="30" rows="6" placeholder="Напишите свой отзыв" required minlength="8" maxlength="150">{{ old('comment') }}</textarea>
                <button class="button" type="submit">Опубликовать</button>
            </div>

        </form> 

    </div>

</div>

</div>


<!-- Форматирование номера телефона -->
<script src="{{URL::asset('js/formatPhone.js')}}"></script>

<!-- календарь консультаций -->
<script>
    let bookedAppointments = <?php echo json_encode($appointments); ?>; // масив занятых номерков
</script>
<script src="{{URL::asset('js/appointmentCalendar.js')}}"></script>

<!-- Предпросмотр изображения -->
<script defer src="{{URL::asset('js/previewImage.js')}}"></script>

@endsection