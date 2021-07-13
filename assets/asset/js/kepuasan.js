$('.kepuasan_en_sp').each(function(){
  var nilai = $('#kepuasan_sp').val();
  var sp = $('#kepuasan_puas5').val();
  var stp = $('#kepuasan_tidak_puas5').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_sp').val(count);
  $('.kepuasan_en_sp').text(count);
});
var en5= $('.kepuasan_en_sp').text();
if (isNaN(en5)) {
    $('#kepuasan_en_sp').val('0');
    $('.kepuasan_en_sp').text('0');
}else {
  $('.kepuasan_en_sp').text();
}

$('.kepuasan_en_p').each(function(){
  var nilai = $('#kepuasan_p').val();
  var sp = $('#kepuasan_puas4').val();
  var stp = $('#kepuasan_tidak_puas4').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_p').val(count);
  $('.kepuasan_en_p').text(count);

});
var en4 = $('.kepuasan_en_p').text();
if (isNaN(en4)) {
    $('#kepuasan_en_p').val('0');
    $('.kepuasan_en_p').text('0');
}else {
  $('.kepuasan_en_p').text();
}

$('.kepuasan_en_cp').each(function(){
  var nilai = $('#kepuasan_cp').val();
  var sp = $('#kepuasan_puas3').val();
  var stp = $('#kepuasan_tidak_puas3').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_cp').val(count);
  $('.kepuasan_en_cp').text(count);

});
var en3 = $('.kepuasan_en_cp').text();
if (isNaN(en3)) {
    $('#kepuasan_en_cp').val('0');
    $('.kepuasan_en_cp').text('0');
}else {
  $('.kepuasan_en_cp').text();
}

$('.kepuasan_en_tp').each(function(){
  var nilai = $('#kepuasan_tp').val();
  console.log(nilai);
  var sp = $('#kepuasan_puas2').val();
  var stp = $('#kepuasan_tidak_puas2').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_tp').val(count);
  $('.kepuasan_en_tp').text(count);

});
var en2 = $('.kepuasan_en_tp').text();
if (isNaN(en2)) {
    $('#kepuasan_en_tp').val('0');
    $('.kepuasan_en_tp').text('0');
}else {
  $('.kepuasan_en_tp').text();
}

$('.kepuasan_en_stp').each(function(){
  var nilai = $('#kepuasan_stp').val();
  // console.log(nilai);
  var sp = $('#kepuasan_puas1').val();
  var stp = $('#kepuasan_tidak_puas1').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#kepuasan_en_stp').val(count);
  $('.kepuasan_en_stp').text(count);

});
var en1 = $('.kepuasan_en_stp').text();
if (isNaN(en1)) {
    $('#kepuasan_en_stp').val('0');
    $('.kepuasan_en_stp').text('0');
}else {
  $('.kepuasan_en_stp').text();
}

$('.kepuasan_gain').each(function(){
    var enty = $('#entrophy').val();
    var all_kuis = $('.jawaban').val();

    var en_sp =  $('.kepuasan_en_sp').text();
    var en_p =  $('.kepuasan_en_p').text();
    var en_cp =  $('.kepuasan_en_cp').text();
    var en_tp =  $('.kepuasan_en_tp').text();
    var en_stp =  $('.kepuasan_en_stp').text();

    var nilai_sp = $('#kepuasan_sp').val();
    var nilai_p = $('#kepuasan_p').val();
    var nilai_cp = $('#kepuasan_cp').val();
    var nilai_tp = $('#kepuasan_tp').val();
    var nilai_stp = $('#kepuasan_stp').val();

    var count = enty-((nilai_sp/all_kuis*en_sp)-(nilai_p/all_kuis*en_p)-(nilai_cp/all_kuis*en_cp)-(nilai_tp/all_kuis*en_tp)-(nilai_stp/all_kuis*en_stp));


    $('#kepuasan_gain').val(count);
    $('.kepuasan_gain').text(count);
});
