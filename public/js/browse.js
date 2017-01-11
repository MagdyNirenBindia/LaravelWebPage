$('document').ready(function() {
  console.log('page loaded');
});

$('#textSearchInput').keyup(function () {
  //code comes here
  $('#numEvents').hide();
  var input, filter, ul, li, a, i;
  input = document.getElementById('textSearchInput');
  filter = input.value.toUpperCase();
  if(filter == ''){
      $('#numEvents').show();
  }
  ul = document.getElementById("eventsOL");
  li = ul.getElementsByTagName('li');

  for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName('EventName')[0];
        console.log(a.innerHTML);
        console.log(a.innerHTML.toUpperCase().indexOf(filter));
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
});


$('#catSearchInput').change(function () {
  //code comes here
    $('#numEvents').hide();
  var input, filter, ul, li, a, i;
  input = document.getElementById('catSearchInput');
  filter = input.value.toUpperCase();
  console.log(filter);
  ul = document.getElementById("eventsOL");
  li = ul.getElementsByTagName('li');

  for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByClassName('EventCat')[0];
        console.log(a);
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
    if(filter == 'ALL'){
      for (i = 0; i < li.length; i++) {
            $('#numEvents').show();
            a = li[i].getElementsByClassName('EventCat')[0];
            li[i].style.display = "";
          }
    }
});
