var fields,
    data = {};

var dateToday = new Date();
var options = $.extend({},
  $.datepicker.regional["ja"], {
    changeMonth: true,
    changeYear: true,
    dateFormat: 'yy/mm/dd',
  }
);
$(document).ready(function() {
  addDatePicker();
  editRow();
  deleteRow();
  selectRedirect();
})
function addDatePicker(){
  $('body').on('focus', '.js-datepicker', function(){
    $(this).datepicker(options)
  });
}

function editRow(){
  $('body').on('click', '.js-edit-row', function(){
    fields = $(this).closest('.js-row').find('input');
    if($(this).is('.editing')){
      $(this).text('修正する');
      $(this).removeClass('editing');
      fields.prop('disabled', true);

      fields.each(function(key, value) {
        var name = $(this).attr('name'),
            val = $(this).val();
        data[name] = val;
      })
      $.ajax({
        method: 'POST',
        dataType: 'json',
        data: data
      }).success(function(data) {
      }).error(function(xhr, status, error) {
        console.log(xhr + status + error);
      })
      return false;
    }else{
      $(this).text('セーブする');
      $(this).addClass('editing');
      fields.prop('disabled', false);
    }
  })
}

function deleteRow(){
  $('body').on('click', '.js-delete-row', function(){
    $(this).closest('.js-row').remove();

    data['delete'] = $(this).closest('.js-row').find('input[name=post_id]').val();

    $.ajax({
      method: 'POST',
      dataType: 'json',
      data: data
    }).success(function(data) {
    }).error(function(xhr, status, error) {
      console.log(xhr + status + error);
    })
    return false;
  })
}

function selectRedirect(){
  $('.js-select-redirect').on('change', function () {
    var url = $(this).val();
    if (url) {
      window.location = url;
    }
    return false;
  });
}