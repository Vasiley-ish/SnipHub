@if($errors->any())
    <div class="alert alert-danger" onClick="closeAlert()">
        <div class="close-alert">X</div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))

    <div class="alert alert-success">
        <div class="close-alert" onClick="closeAlert()">X</div>     
        {{session('success')}}
    </div>
@endif

<script defer >
    function closeAlert() {
        $('.close-alert').parent().hide('slow', function(){ $('.close-alert').parent().remove(); });
    }
</script>