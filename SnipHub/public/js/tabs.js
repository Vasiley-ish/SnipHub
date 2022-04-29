var jsTriggers = document.querySelectorAll('.js-tab-trigger');
   
jsTriggers.forEach(function (item, i) {
   item.addEventListener('click', function () {
      var tabName = this.dataset.tab,
             tabContent = document.querySelector('.js-tab-content[data-tab="' + tabName + '"]');

             document.querySelectorAll('.js-tab-content.page--active').forEach(function (item, i) {
                item.classList.remove('page--active');
               });
               
         document.querySelectorAll('.js-tab-trigger.tab--selected').forEach(function (item, i) {
            item.classList.remove('tab--selected');
         });
         
         tabContent.classList.add('page--active');
         this.classList.add('tab--selected');
     });
 })