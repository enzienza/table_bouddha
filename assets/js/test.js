jQuery(document).ready(function($) {
  $('.btn-save').click(function(e) {
    e.preventDefault();
    $('#publish').click();
  }); // END -> click .btn-save

  $('#add-row').on('click', function() {
    var row = $('.empty-row.screen-reader-text').clone(true);
    row.removeClass('empty-row screen-reader-text');
    row.insertBefore('#table-repeatable-fieldset tbody>tr:last');
    return false;
  }); // END -> on click #add-row

  $('.remove-row').on('click', function() {
    $(this).parents('tr').remove();
    return false;
  }); // END -> on click .remove-row

  // $('#table-repeatable-fieldset tbody').sortable({
  // 	opacity: 0.6,
  // 	revert: true,
  // 	cursor: 'move',
  // 	handle: '.sort'
  // });// END -> sortable #table-repeatable-fieldset
});
