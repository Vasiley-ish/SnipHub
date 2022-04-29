var headerApp = new Vue({
    el: '#header',
    data: {
        visible: false,
    },
    methods: {
        // Кнопка бургера главного меню
        toggleHeader: function(visible) {
            this.visible = !this.visible;
        }
    },
})

// var headerApp = new Vue({
//     el: '#appointmentApp',
//     data() {
//         return {
//             dayOfAppointment: ''
//         }
//     },
//     methods: {

//         getTargetID: function(clicked_id) {
//             console.log(clicked_id);
//             document.getElementById('apointmentDay').value = clicked_id;
//         }
//     },
// })