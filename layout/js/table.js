//js code to search in table
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

function validatePhoneNumber(input_str) {
  var re =/^[\+]?[0-9]{1}?[0-9]{11}$/im;
  return re.test(input_str);
}
function validateEmail(input_str) {
  var re =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(input_str);
}


function validateForm(event) {
  var phone = document.getElementById('myform_phone').value;
  var email = document.getElementById('myform_email').value;

  if (!validatePhoneNumber(phone) && !validateEmail(email)) {
    document.getElementById('phone_error').classList.remove('hidden');
    document.getElementById('myform_phone').classList.add('divError');
    document.getElementById('email_error').classList.remove('hidden');
    document.getElementById('myform_email').classList.add('divError');
    return false;
  }  

  if (!validatePhoneNumber(phone)) {
  document.getElementById('phone_error').classList.remove('hidden');
  document.getElementById('myform_phone').classList.add('divError');
  return false;
  }
  else {
    document.getElementById('phone_error').classList.add('hidden');
    document.getElementById('myform_phone').classList.remove('divError');
  }

  if (!validateEmail(email)) {
  document.getElementById('email_error').classList.remove('hidden');
  document.getElementById('myform_email').classList.add('divError');
  return false;
  } 
  else {
      document.getElementById('email_error').classList.add('hidden');
      document.getElementById('myform_email').classList.remove('divError');

  }
  event.preventDefault();
}

document.getElementById('Requestform').addEventListener('submit', validateForm);