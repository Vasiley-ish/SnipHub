    function selectDay(date, weekDay){
            let card = document.getElementById(date)

            $('.js-day-selector').removeClass("grid-day--clicked")
            card.classList.add("grid-day--clicked")

            $('.appointment__button').attr('disabled', 'disabled')

            $('#apointmentDay').val(date)
            $('#apointmentTime').val('')

            makeTimeCards(date, weekDay)
        }

    function makeTimeCards(date, weekDay){

        $('.js-time-selector').remove() //Удалить все существующие карточки

        let workHours = 9 // рабочие часы
        let workDayStartsAt = 9 // начало рабочего дня

        switch (weekDay) {  //настройка сокращенного рабочего дня в Пт и Сб
            case 'Пт':
                workHours-=1
                break;

            case 'Сб':
                workHours-=2
                workDayStartsAt+=1
                break;
        
            default:
                break;
        }

        let time = ''    
        let hour = workDayStartsAt - 1
        let minute = '00'
        
        for (let index = 1; index < workHours*2+1; index++) {

            if (index % 2 !=0){
                hour++
                minute = '00'
            }

            time = hour + ':' + minute
            minute = '30'

           let card = $(`<div class="grid-day js-time-selector" id="${time}" data-time="${time}" data-date="${date}" data-weekDay="${weekDay}" onClick="selectTime(this.dataset.time, this.dataset.date)" >
                     <strong> ${time} </strong>
               </div>`)

            card.appendTo('.js-time-selection')

            // для каждой созданной выше карточки со временем создается петля, в которой проверяется, есть ли запись в БД с такими же датой и временем. Если есть карточке будет присвоен класс .grid-time--booked, отображающий пользователю, что карточка занята
                $.each(bookedAppointments, function(i, item) {
                    $(`.js-time-selector[data-time='${item.time}'][data-date='${item.day}']`).addClass('grid-time--booked')
                });
          
            }
        }

    function selectTime(appointmentTime, date){

            let thisCard = $('.js-time-selector[data-time="' + appointmentTime + '"]')

            if (thisCard.hasClass("grid-time--booked")){
                return
            }

            $('.js-time-selector').removeClass("grid-day--clicked")
            thisCard.addClass("grid-day--clicked")

            $('#apointmentTime').val(appointmentTime)

            $('.appointment__button').removeAttr('disabled')
        
    }