@extends('./layouts/snipHubLayout')

@section('content')

<div id="messageForm" >
    <button @click="toggleForm(formVisible)" :class="{dropdownForm__clicked:formVisible}" class="button button--dropdown-form">+ Новая заявка</button>

    <form  :class="{form__clicked:formVisible}" class="form form--message" method="post" action="dashboard/submit" class="form-message">
        @csrf
        <div class="form__item">
            <label class="label" for="phone">Ваш телефон</label>
            <input type="text" class="input input--message" name="phone" id="phone" placeholder="89090123456" maxlength="11"/>

        </div>

        <div class="form__item">
            <label class="label" for="category">Название услуги</label>
            {{-- Не получается передать 3 массива, поэтому этот код использовать невозможно --}}
            {{-- <select class="input input--message" name="category" id="category">
                @foreach ($cats as $item)
                    <option value="{{$item->category_code}}">{{$item->category_name}}</option>
                        @foreach ($subcats as $subitem)
                            @if ($subitem->subcategory_parent == $item->category_code)   
                                  <option value="{{$subitem->subcategory_code}}">{{$subitem->subcategory_name}}</option>
                            @endif
                        @endforeach
                @endforeach
            </select> --}}


            {{-- Пока ошибка выше не будет решена будет использоваться это временное решение --}}
            <select class="input input--message" name="category" id="category">
                        @foreach ($subcats as $subitem) 
                                  <option value="{{$subitem->subcategory_name}}">{{$subitem->subcategory_name}}</option> 
                        @endforeach
            </select>
            {{-- --------------------------------------------------------------------------- --}}

        </div>
        <div class="form__item">
            <label class="label" for="contact">Как нам с вами связаться?</label>
            <select class="input input--message" name="contact" id="contact">
                <option value="u-call">Я Вам позвоню</option>
                <option value="u-come">Я приду к Вам в офис</option>
                <option value="we-call">Я буду ждать вашего звонка</option>
            </select>
        </div>
        <div class="form__item">
            <label class="label" for="comment">Дополнительные пожелания
                или комментарий</label>
            <textarea class="input input--message" name="comment" id="comment" cols="40" rows="5" placeholder="Дополнительный комментарий"></textarea>
        </div>
        <button class="button">Отправить</button>
    </form>
</div>

<h1 class="title title--main">Ваши заявки</h1>

<div class="messages-container">
@foreach ($messages as $message)
    <div class="card card--message mr-lr">
        <p class="title subtitle index">{{$message->servise}}</p>
        <p class="text">{{$message->message}}</p>

        @switch($message->how_to_contact)
            @case('u-call')
                <p class="text text--fancy">Мы ожидаем вашего звонка! Звоните в рабочие дни с 10:00 до 18:00 по номеру 8 (444)-12-23-45.</p>   
                @break
            @case('u-come')
            <p class="text text--fancy">Мы ожидаем Вашего визита в рабочие дни с 10:00 до 18:00 по адресу ул. Красивое, 69. Вход возле Пяторочки. </p>  
                @break
            @default
                <p class="text text--fancy">Ваша заявка получена! В скором времени ожидайте Нашего звонка!</p>
        @endswitch


                        <form method="post" action="{{route('delete', $message->id)}}">
                            @csrf
                        <button action="submit" class="button button--danger message__button show_confirm">Отменить заявку</button>
                        </form>
        
    </div>
@endforeach
</div>


<script defer src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script defer type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Уверены, что хотите удалить заявку?`,
              text: "Заявка будет безвозвратно удалена",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
@endsection