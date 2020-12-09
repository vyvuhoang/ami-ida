var fields,
    data = {};

$(document).ready(function() {
  editRow();
  deleteRow();
  selectRedirect();
  autoHeightTextarea();
})

function editRow(){
  $('body').on('click', '.js-edit-row', function(){
    fields = $(this).closest('.js-row').find('input, textarea');
    button = $(this).closest('.js-row').find('button');
    if($(this).is('.editing')){
      $(this).text('修正する');
      $(this).removeClass('editing');
      fields.prop('disabled', true);
      button.prop('disabled', true);

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
      button.prop('disabled', false);
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

function autoHeightTextarea(){
  $('textarea').each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
  }).on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  });
}

jQuery(document).ready(function() {
  var $ = jQuery;
  if ($('.set_custom_logo').length > 0) {
    if ( typeof wp !== 'undefined' && wp.media && wp.media.editor) {
      $(document).on('click', '.set_custom_logo', function(e) {
        e.preventDefault();
        var button = $(this);
        var id = button.prev();
        wp.media.editor.send.attachment = function(props, attachment) {
          id.val(attachment.id);
          button.siblings('.js-img').html('<img src="'+attachment.url+'" alt="">');
        };
        wp.media.editor.open(button);
        return false;
      });
    }
  }
});