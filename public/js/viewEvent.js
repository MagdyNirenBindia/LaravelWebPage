$('document').ready(function() {
    console.log('page loaded');
    chooseBtn();
    attendBtnLisstener();
});

function attendBtnLisstener() {
    $('.attendBtn').on('click', function(e) {
        if (confirm("Are you sure you would like to attend?") == false) {
            $(".eventform").submit(function(e) {
                e.preventDefault();
            });
        }
    })
}

function chooseBtn() {
  checkCapacity();
  checkDate();
}

function checkDate(){
  var endDate = new Date(document.getElementById('endDate').innerHTML);
  var now = new Date();
  if (!(endDate.getTime() > now.getTime())) {
      $('#attendEvent').hide();
        console.log('hello');
      $('#endSaleNotice').html('<strong>Sorry the ticket sales for this event have ended. Please feel free to check out our other events!</strong>');
  }
}

function checkCapacity() {
      var atCapacity = $('#cap').html();
      ($('#cap').html() == 1) ? soldOut():notSoldOut();
}


function soldOut(){
  $('#attendEvent').hide();
  $('#endSaleNotice').html('<strong>Sorry this event is sold out. Please feel free to check out our other events!</strong>') ;
}

function notSoldOut() {
  $('#attendEvent').show();
}
