$('document').ready(function() {
    console.log('page loaded');
});

function doubleCheck() {
    if (confirm("Are you sure you would like to create the event?") == false) {
        killSubmission();
    }
    else{
      console.log('form should submit');
    }
}

$('#submit').click(function() {
    //validate elements of the form
    var x = 0;
    x = validateName(x);
    x = validateDate(x);
    x = validateNumbTickets(x);
    x = validateEndDate(x);
    x = validateLocation(x);
    x = validateCategory(x);
    x = validateDescription(x);
                  console.log(x);
    if (!(x == 0)) {
        killSubmission();
        alert('Please fill in fields marked in red');
    } else {
        doubleCheck();
    }
});



function validateName(x) {
    if ($('#name').val() == '') {
        console.log('nameError');
        $('.name').css('color', 'red');
        x = x + 1;
        return x;
    }
    else{
      $('.name').css('color', 'black');
        return x;
    }
}

function validateDate(x) {
    if ($('#date').val() == '') {
        $('.date').css('color', 'red');
        x = x + 1;
        return x;
    }
    else{
      $('.date').css('color', 'black');
        return x;
    }
}

function validateNumbTickets(x) {
    if ($('#ticketCapacity').val() == '') {
        $('.numTickets').css('color', 'red');
        x = x + 1;
        return x;
    }
    else{
      $('.numTickets').css('color', 'black');
        return x;
    }
}

function validateEndDate(x) {
  if ($('#endDate').val() == '') {
      $('.endDate').css('color', 'red');
      x = x + 1;
      return x;
  }
  else{
    $('.endDate').css('color', 'black');
      return x;
  }
}

function validateLocation(x) {
  if ($('#location').val() == '') {
      $('.location').css('color', 'red');
      x = x + 1;
      return x;
    }
      else{
        $('.location').css('color', 'black');
          return x;
      }
  }

function validateCategory(x) {
  if($('#category option:selected').text()=="Please Select"){
    $('.category').css('color', 'red');
    x = x + 1;
    return x;
  }
  else{
    $('.category').css('color', 'black');
      return x;
  }
}

function validateDescription(x) {
var text = $('#description').val();
var sizetext = text.split(" ").length;
if (sizetext < 5){
  $('.description').css('color', 'red');
  $('#descriptionAlert').show();
  x = x + 1;
  return x;
}
else{
  $('.description').css('color', 'black');
  $('#descriptionAlert').hide();
    return x;
}
}


function killSubmission() {
    $(".eventform").submit(function(e) {
        e.preventDefault();
    });
}
