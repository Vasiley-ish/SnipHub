// Классы ниже контролирруют переключение классов элементов, которые можно скрывать и показывать п нажатию кнопки
var headerApp = new Vue({
    el: '#header',
    data: {
      visible: false,
    },
    methods: {
        toggleHeader: function (visible) {
            if(visible){
                this.visible=false;
            } else{
                this.visible=true;
            }
          }
    },
  })

var formApp = new Vue({
    el: '#messageForm',
    data: {
      formVisible: false,
    },
    methods: {
        toggleForm: function (formVisible) {
            if(formVisible){
                this.formVisible=false;
            } else{
                this.formVisible=true;
            }
          }
    },
})