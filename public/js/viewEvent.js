$('document').ready(function() {
  console.log('page loaded');
attendBtnLisstener();
});

function attendBtnLisstener() {
  $('.attendBtn').on('click',function(e){
    if (confirm("Are you sure you would like to attend?") == false ){
      $(".eventform").submit(function(e){
               e.preventDefault();
           });
    }
  })
}
