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

@endsection