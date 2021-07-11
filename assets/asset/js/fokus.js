$('.fokus_en_sp').each(function(){
  var nilai = $('#fokus_sp').val();
  var sp = $('#fokus_puas5').val();
  var stp = $('#fokus_tidak_puas5').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_sp').val(count);
  $('.fokus_en_sp').text(count);
});

$('.fokus_en_p').each(function(){
  var nilai = $('#fokus_p').val();
  console.log(nilai);
  var sp = $('.fokus_puas4').val();
  var stp = $('.fokus_tidak_puas4').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_p').val(count);
  $('.fokus_en_p').text(count);
});

$('.fokus_en_cp').each(function(){
  var nilai = $('#fokus_cp').val();
  console.log(nilai);
  var sp = $('.fokus_puas3').val();
  var stp = $('.fokus_tidak_puas3').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_cp').val(count);
  $('.fokus_en_cp').text(count);
});

$('.fokus_en_tp').each(function(){
  var nilai = $('#fokus_tp').val();
  console.log(nilai);
  var sp = $('.fokus_puas2').val();
  var stp = $('.fokus_tidak_puas2').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_tp').val(count);
  $('.fokus_en_tp').text(count);
});

$('.fokus_en_stp').each(function(){
  var nilai = $('#fokus_stp').val();
  console.log(nilai);
  var sp = $('.fokus_puas1').val();
  var stp = $('.fokus_tidak_puas1').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_stp').val(count);
  $('.fokus_en_stp').text(count);
});
