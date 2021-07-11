$('.kepuasan_en_sp').each(function(){
  var nilai = $('#kepuasan_sp').val();
  var sp = $('#kepuasan_puas5').val();
  var stp = $('#kepuasan_tidak_puas5').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_sp').val(count);
  $('.kepuasan_en_sp').text(count);
});

$('.kepuasan_en_p').each(function(){
  var nilai = $('#kepuasan_p').val();
  console.log(nilai);
  var sp = $('.kepuasan_puas4').val();
  var stp = $('.kepuasan_tidak_puas4').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_p').val(count);
  $('.kepuasan_en_p').text(count);
});

$('.kepuasan_en_cp').each(function(){
  var nilai = $('#kepuasan_cp').val();
  console.log(nilai);
  var sp = $('.kepuasan_puas3').val();
  var stp = $('.kepuasan_tidak_puas3').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_cp').val(count);
  $('.kepuasan_en_cp').text(count);
});

$('.kepuasan_en_tp').each(function(){
  var nilai = $('#kepuasan_tp').val();
  console.log(nilai);
  var sp = $('.kepuasan_puas2').val();
  var stp = $('.kepuasan_tidak_puas2').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_tp').val(count);
  $('.kepuasan_en_tp').text(count);
});

$('.kepuasan_en_stp').each(function(){
  var nilai = $('#kepuasan_stp').val();
  console.log(nilai);
  var sp = $('.kepuasan_puas1').val();
  var stp = $('.kepuasan_tidak_puas1').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_stp').val(count);
  $('.kepuasan_en_stp').text(count);
});
