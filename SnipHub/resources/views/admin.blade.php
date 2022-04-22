@extends('./layouts/snipHubLayout')

@section('content')

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



@endsection