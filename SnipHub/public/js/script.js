// Классы ниже контролирруют переключение классов элементов, которые можно скрывать и показывать п нажатию кнопки
var headerApp = new Vue({
    el: '#header',
    data: {
        visible: false,
    },
    methods: {
        toggleHeader: function(visible) {
            if (visible) {
                this.visible = false;
            } else {
                this.visible = true;
            }
        }
    },
})