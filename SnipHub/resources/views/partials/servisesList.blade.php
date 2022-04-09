<ul class="list list--first">

    @foreach ($cats as $category)
  
            <li class="list__item "><a class="link--list link" href="{{route('price')}}#{{$category->category_code}}">{{$category->category_name}}</a></li>
                <ul class="list list--second">
                    @foreach ($subcats as $subcategory)
                        @if ($subcategory->subcategory_parent == $category->category_code)   
                            <li class="list__item "><a class="link--list link link--list__second" href="{{route('price')}}#{{$subcategory->subcategory_code}}">{{$subcategory->subcategory_name}}</a></li>
                        @endif
                    @endforeach
                </ul>
 
    @endforeach

</ul>