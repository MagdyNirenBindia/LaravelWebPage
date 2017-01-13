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
      $('#endSaleNoticeCapacity').hide();
      $('#endSaleNoticeTime').show();
  }
}

function checkCapacity() {
      var atCapacity = $('#cap').html();
      ($('#cap').html() == 1) ? soldOut():notSoldOut();
}


function soldOut(){
  $('#attendEvent').hide();
  $('#endSaleNoticeCapacity').show();
}

function notSoldOut() {
  $('#attendEvent').show();
  $('#endSaleNoticeCapacity').hide();
}
