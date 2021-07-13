$('.akurat_en_sp').each(function(){
  var nilai = $('#akurat_sp').val();
  var sp = $('#akurat_puas5').val();
  var stp = $('#akurat_tidak_puas5').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_sp').val(count);
  $('.akurat_en_sp').text(count);
});
var en5= $('.akurat_en_sp').text();
if (isNaN(en5)) {
    $('#akurat_en_sp').val('0');
    $('.akurat_en_sp').text('0');
}else {
  $('.akurat_en_sp').text();
}

$('.akurat_en_p').each(function(){
  var nilai = $('#akurat_p').val();
  var sp = $('#akurat_puas4').val();
  var stp = $('#akurat_tidak_puas4').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_p').val(count);
  $('.akurat_en_p').text(count);

});
var en4 = $('.akurat_en_p').text();
if (isNaN(en4)) {
    $('#akurat_en_p').val('0');
    $('.akurat_en_p').text('0');
}else {
  $('.akurat_en_p').text();
}

$('.akurat_en_cp').each(function(){
  var nilai = $('#akurat_cp').val();
  var sp = $('#akurat_puas3').val();
  var stp = $('#akurat_tidak_puas3').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_cp').val(count);
  $('.akurat_en_cp').text(count);

});
var en3 = $('.akurat_en_cp').text();
if (isNaN(en3)) {
    $('#akurat_en_cp').val('0');
    $('.akurat_en_cp').text('0');
}else {
  $('.akurat_en_cp').text();
}

$('.akurat_en_tp').each(function(){
  var nilai = $('#akurat_tp').val();
  console.log(nilai);
  var sp = $('#akurat_puas2').val();
  var stp = $('#akurat_tidak_puas2').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_tp').val(count);
  $('.akurat_en_tp').text(count);

});
var en2 = $('.akurat_en_tp').text();
if (isNaN(en2)) {
    $('#akurat_en_tp').val('0');
    $('.akurat_en_tp').text('0');
}else {
  $('.akurat_en_tp').text();
}

$('.akurat_en_stp').each(function(){
  var nilai = $('#akurat_stp').val();
  // console.log(nilai);
  var sp = $('#akurat_puas1').val();
  var stp = $('#akurat_tidak_puas1').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#akurat_en_stp').val(count);
  $('.akurat_en_stp').text(count);

});
var en1 = $('.akurat_en_stp').text();
if (isNaN(en1)) {
    $('#akurat_en_stp').val('0');
    $('.akurat_en_stp').text('0');
}else {
  $('.akurat_en_stp').text();
}

$('.akurat_gain').each(function(){
    var enty = $('#entrophy').val();
    var all_kuis = $('.jawaban').val();

    var en_sp =  $('.akurat_en_sp').text();
    var en_p =  $('.akurat_en_p').text();
    var en_cp =  $('.akurat_en_cp').text();
    var en_tp =  $('.akurat_en_tp').text();
    var en_stp =  $('.akurat_en_stp').text();

    var nilai_sp = $('#akurat_sp').val();
    var nilai_p = $('#akurat_p').val();
    var nilai_cp = $('#akurat_cp').val();
    var nilai_tp = $('#akurat_tp').val();
    var nilai_stp = $('#akurat_stp').val();

    var count = enty-((nilai_sp/all_kuis*en_sp)-(nilai_p/all_kuis*en_p)-(nilai_cp/all_kuis*en_cp)-(nilai_tp/all_kuis*en_tp)-(nilai_stp/all_kuis*en_stp));


    $('#akurat_gain').val(count);
    $('.akurat_gain').text(count);
});
