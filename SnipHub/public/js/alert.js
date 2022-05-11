$('.show_confirm').on('click', function(event) {
    var form = $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();

    
    swal({
            title: `Подтвердите удаление`,
            text: "Выбранная заявка на консультацию будет удалена!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {            
            if (willDelete) {
                swal({
                    title: `Успешно!`,
                    icon: "success",
                })
                setTimeout(function(){ 
                    form.trigger('submit');
                }, 900)
            }
        });
});