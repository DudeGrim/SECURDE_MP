$(document).ready(function() {
  var maxchar = 45;
  /*For Shipping Address*/
  $('#housenumberchars').html(maxchar + ' characters remaining');
  $('#housenumber').keyup(function() {
      var text_length = $('#housenumber').val().length;
      var text_remaining = maxchar - text_length;
      $('#housenumberchars').html(text_remaining + ' characters remaining');
  });

  $('#streetchars').html(maxchar + ' characters remaining');
  $('#street').keyup(function() {
      var text_length = $('#street').val().length;
      var text_remaining = maxchar - text_length;
      $('#streetchars').html(text_remaining + ' characters remaining');
  });

  $('#subdivisionchars').html(maxchar + ' characters remaining');
  $('#subdivision').keyup(function() {
      var text_length = $('#subdivision').val().length;
      var text_remaining = maxchar - text_length;
      $('#subdivisionchars').html(text_remaining + ' characters remaining');
  });

  $('#citychars').html(maxchar + ' characters remaining');
  $('#city').keyup(function() {
      var text_length = $('#city').val().length;
      var text_remaining = maxchar - text_length;
      $('#citychars').html(text_remaining + ' characters remaining');
  });

  $('#postalcodechars').html(maxchar + ' characters remaining');
  $('#postalcode').keyup(function() {
      var text_length = $('#postalcode').val().length;
      var text_remaining = maxchar - text_length;
      $('#postalcodechars').html(text_remaining + ' characters remaining');
  });

  $('#countrychars').html(maxchar + ' characters remaining');
  $('#country').keyup(function() {
      var text_length = $('#country').val().length;
      var text_remaining = maxchar - text_length;
      $('#countrychars').html(text_remaining + ' characters remaining');
  });

  /*For Billing Address*/
  $('#billing_housenumberchars').html(maxchar + ' characters remaining');
  $('#billing_housenumber').keyup(function() {
      var text_length = $('#billing_housenumber').val().length;
      var text_remaining = maxchar - text_length;
      $('#billing_housenumberchars').html(text_remaining + ' characters remaining');
  });

  $('#billing_streetchars').html(maxchar + ' characters remaining');
  $('#billing_street').keyup(function() {
      var text_length = $('#billing_street').val().length;
      var text_remaining = maxchar - text_length;
      $('#billing_streetchars').html(text_remaining + ' characters remaining');
  });

  $('#billing_subdivisionchars').html(maxchar + ' characters remaining');
  $('#billing_subdivision').keyup(function() {
      var text_length = $('#billing_subdivision').val().length;
      var text_remaining = maxchar - text_length;
      $('#billing_subdivisionchars').html(text_remaining + ' characters remaining');
  });

  $('#billing_citychars').html(maxchar + ' characters remaining');
  $('#billing_city').keyup(function() {
      var text_length = $('#billing_city').val().length;
      var text_remaining = maxchar - text_length;
      $('#billing_citychars').html(text_remaining + ' characters remaining');
  });

  $('#billing_postalcodechars').html(maxchar + ' characters remaining');
  $('#billing_postalcode').keyup(function() {
      var text_length = $('#billing_postalcode').val().length;
      var text_remaining = maxchar - text_length;
      $('#billing_postalcodechars').html(text_remaining + ' characters remaining');
  });

  $('#billing_countrychars').html(maxchar + ' characters remaining');
  $('#billing_country').keyup(function() {
      var text_length = $('#billing_country').val().length;
      var text_remaining = maxchar - text_length;
      $('#billing_countrychars').html(text_remaining + ' characters remaining');
  });

});
