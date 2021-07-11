$('.akurat_en_sp').each(function(){
  var nilai = $('#akurat_sp').val();
  var sp = $('#akurat_puas5').val();
  var stp = $('#akurat_tidak_puas5').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_sp').val(count);
  $('.akurat_en_sp').text(count);
});

$('.akurat_en_p').each(function(){
  var nilai = $('#akurat_p').val();
  console.log(nilai);
  var sp = $('.akurat_puas4').val();
  var stp = $('.akurat_tidak_puas4').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_p').val(count);
  $('.akurat_en_p').text(count);
});

$('.akurat_en_cp').each(function(){
  var nilai = $('#akurat_cp').val();
  console.log(nilai);
  var sp = $('.akurat_puas3').val();
  var stp = $('.akurat_tidak_puas3').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_cp').val(count);
  $('.akurat_en_cp').text(count);
});

$('.akurat_en_tp').each(function(){
  var nilai = $('#akurat_tp').val();
  console.log(nilai);
  var sp = $('.akurat_puas2').val();
  var stp = $('.akurat_tidak_puas2').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_tp').val(count);
  $('.akurat_en_tp').text(count);
});

$('.akurat_en_stp').each(function(){
  var nilai = $('#akurat_stp').val();
  console.log(nilai);
  var sp = $('.akurat_puas1').val();
  var stp = $('.akurat_tidak_puas1').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_stp').val(count);
  $('.akurat_en_stp').text(count);
});
