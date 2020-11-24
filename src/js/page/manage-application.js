$(document).ready(function() {
  selectRedirect();
  ajaxUpdate();
  autoHeightTextarea();
  simplebartbl();
})
function selectRedirect(){
  $('.js-select-redirect').on('change', function () {
    var url = $(this).val();
    if (url) {
      window.location = url;
    }
    return false;
  });
}

function ajaxUpdate(){
  $('.js-row').find('input, select, textarea').on('change', function(){
    var _post_id = $(this).closest('.js-row').attr('data-post-id'),
        _field_key = $(this).attr('name'),
        _field_value = $(this).val();
    $.ajax({
      method: 'POST',
      dataType: 'json',
      data: {
        post_id: _post_id,
        field_key: _field_key,
        field_value: _field_value,
      }
    }).success(function(data) {
    }).error(function(xhr, status, error) {
      console.log(xhr + status + error);
    })
  })
}

function autoHeightTextarea(){
  $('textarea').each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
  }).on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
  });
}

function simplebartbl(){
  new SimpleBar($('.js-tbl-outside')[0], { autoHide: false })
}