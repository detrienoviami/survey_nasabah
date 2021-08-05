$('.fokus_en_sp').each(function(){
  var nilai = $('#fokus_sp').val();
  var sp = $('#fokus_puas5').val();
  var stp = $('#fokus_tidak_puas5').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_sp').val(count);
  $('.fokus_en_sp').text(count);
});
var en5= $('.fokus_en_sp').text();
if (isNaN(en5)) {
    $('#fokus_en_sp').val('0');
    $('.fokus_en_sp').text('0');
}else {
  $('.fokus_en_sp').text();
}
if (en5 === Infinity ) {
    $('#fokus_en_sp').val('0');
    $('.fokus_en_sp').text('0');
}else {
  $('.fokus_en_sp').text();
}

$('.fokus_en_p').each(function(){
  var nilai = $('#fokus_p').val();
  var sp = $('#fokus_puas4').val();
  var stp = $('#fokus_tidak_puas4').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_p').val(count);
  $('.fokus_en_p').text(count);

});
var en4 = $('.fokus_en_p').text();
if (isNaN(en4)) {
    $('#fokus_en_p').val('0');
    $('.fokus_en_p').text('0');
}else {
  $('.fokus_en_p').text();
}

$('.fokus_en_cp').each(function(){
  var nilai = $('#fokus_cp').val();
  var sp = $('#fokus_puas3').val();
  var stp = $('#fokus_tidak_puas3').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_cp').val(count);
  $('.fokus_en_cp').text(count);

});
var en3 = $('.fokus_en_cp').text();
if (isNaN(en3)) {
    $('#fokus_en_cp').val('0');
    $('.fokus_en_cp').text('0');
}else {
  $('.fokus_en_cp').text();
}

$('.fokus_en_tp').each(function(){
  var nilai = $('#fokus_tp').val();
  console.log(nilai);
  var sp = $('#fokus_puas2').val();
  var stp = $('#fokus_tidak_puas2').val();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_tp').val(count);
  $('.fokus_en_tp').text(count);

});
var en2 = $('.fokus_en_tp').text();
if (isNaN(en2)) {
    $('#fokus_en_tp').val('0');
    $('.fokus_en_tp').text('0');
}else {
  $('.fokus_en_tp').text();
}

$('.fokus_en_stp').each(function(){
  var nilai = $('#fokus_stp').val();
  var sp = $('#fokus_puas1').val();
  var stp = $('#fokus_tidak_puas1').text();
  var count = -(sp/nilai)*Math.log2((sp/nilai)) + -(stp/nilai)*Math.log2((stp/nilai));
  $('#fokus_en_stp').val(count);
  $('.fokus_en_stp').text(count);

});
var en1 = $('.fokus_en_stp').text();
if (isNaN(en1)) {
    $('#fokus_en_stp').val('0');
    $('.fokus_en_stp').text('0');
}else {
  $('.fokus_en_stp').text();
}

$('.fokus_gain').each(function(){
    var enty = $('#entrophy').val();
    var all_kuis = $('.jawaban').val();

    var en_sp =  $('.fokus_en_sp').text();
    var en_p =  $('.fokus_en_p').text();
    var en_cp =  $('.fokus_en_cp').text();
    var en_tp =  $('.fokus_en_tp').text();
    var en_stp =  $('.fokus_en_stp').text();

    var nilai_sp = $('#fokus_sp').val();
    var nilai_p = $('#fokus_p').val();
    var nilai_cp = $('#fokus_cp').val();
    var nilai_tp = $('#fokus_tp').val();
    var nilai_stp = $('#fokus_stp').val();

    var count = enty-((nilai_sp/all_kuis*en_sp)-(nilai_p/all_kuis*en_p)-(nilai_cp/all_kuis*en_cp)-(nilai_tp/all_kuis*en_tp)-(nilai_stp/all_kuis*en_stp));


    $('#fokus_gain').val(count);
    $('.fokus_gain').text(count);
});
