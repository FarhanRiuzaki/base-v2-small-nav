// ADMINART
// apps
$('.datepicker').datepicker({
    format: 'dd-mm-yyyy',
    autoclose: 'true',
    orientation: 'bottom',
    todayHighlight: 'true'
});

// fill 15 char untuk no rek
function pad (str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

// validasi file upload
function fileCheck(file,size, file_type = []) {

  file_name   = file.files[0].name;
  size        = file.files[0].size / 1024;
  limit       = 1024 * size;
  validExtensions = file_type;

  extension   = file_name.substr( (file_name.lastIndexOf('.') + 1) );

  // change_name = file_name.split('.').shift() + '' + parseInt(Math.random() * 10000) + '.' + extension;

  // file.name = change_name;

  valid = true;
  if(validExtensions.indexOf(extension) == -1){
      swal.fire('Oops', 'file harus berektensi: ' + file_type, 'info');
      file.value = '';
  }

  if(size > limit){
      swal.fire('Oops', 'file harus berukuran kurang dari 1MB', 'info');
      file.value = '';
  }

}

function number_format(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
       return false;
    }else{
       return true;
    }
  }
// deklarasi function
window.pad              = pad;
window.fileCheck        = fileCheck;
window.number_format    = number_format;
window.IsEmail          = IsEmail;

// COMPONENT
$('.number').number(true, 2);
// $('.numberOnly').number(true);
$(".numberOnly").on("keypress keyup blur",function (event) {
  $(this).val($(this).val().replace(/[^\d].+/, ""));
   if ((event.which < 48 || event.which > 57)) {
       event.preventDefault();
   }
});

$('#detailList').on('shown.bs.collapse', function() {
    $(".iconDrop").addClass('fa-angle-up').removeClass('fa-angle-down');
  });

$('#detailList').on('hidden.bs.collapse', function() {
    $(".iconDrop").addClass('fa-angle-down').removeClass('fa-angle-up');
});

// Jquery Validate min value
$.validator.addMethod('minStrict', function (value, el, param) {
    return value > param;
});

$.validator.addMethod('maxStrict', function (value, el, param) {
    console.log(value);
    console.log(param);
    return value <= param;
});


