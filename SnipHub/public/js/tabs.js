$(document).ready(function() {
   const hash = location.hash;
   activateTab(hash) 
});

window.addEventListener('hashchange', function(evt) {
   const hash = location.hash;
     activateTab(hash) 
 });
 
 function activateTab(hash) {
 
     const currentTab = $(`.js-tab-trigger[href="${hash}"]`)
 
     $(".js-page-title").html(currentTab.html()) 
 
     $(".js-tab-trigger").removeClass("tab--selected")
     currentTab.addClass("tab--selected")
 
     
     $('.js-tab-content').removeClass("page--active")
     $(`.js-tab-content[data-tab="${hash}"]`).addClass("page--active")
 
 }