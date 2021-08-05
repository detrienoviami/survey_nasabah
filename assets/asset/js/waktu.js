$('.waktu_en_sp').each(function(){
  var nilai = $('#waktu_sp').val();
  var sp = $('#waktu_puas5').val();
  var stp = $('#waktu_tidak_puas5').val();
  var count = ((-sp/nilai)*Math.log2(sp/nilai) + (-stp/nilai)*Math.log2(stp/nilai));
  $('#waktu_en_sp').val(count);
  $('.waktu_en_sp').text(count);
});
var en5= $('.waktu_en_sp').text();
if (isNaN(en5)) {
    $('#waktu_en_sp').val('0');
    $('.waktu_en_sp').text('0');
}else {
  $('.waktu_en_sp').text();
}

$('.waktu_en_p').each(function(){
  var nilai = $('#waktu_p').val();
  var sp = $('#waktu_puas4').val();
  var stp = $('#waktu_tidak_puas4').val();
  var count = ((-sp/nilai)*Math.log2(sp/nilai) + (-stp/nilai)*Math.log2(stp/nilai));
  $('#waktu_en_p').val(count);
  $('.waktu_en_p').text(count);

});
var en4 = $('.waktu_en_p').text();
if (isNaN(en4)) {
    $('#waktu_en_p').val('0');
    $('.waktu_en_p').text('0');
}else {
  $('.waktu_en_p').text();
}

$('.waktu_en_cp').each(function(){
  var nilai = $('#waktu_cp').val();
  var sp = $('#waktu_puas3').val();
  var stp = $('#waktu_tidak_puas3').val();
  var count = ((-sp/nilai)*Math.log2(sp/nilai) + (-stp/nilai)*Math.log2(stp/nilai));
  $('#waktu_en_cp').val(count);
  $('.waktu_en_cp').text(count);

});
var en3 = $('.waktu_en_cp').text();
if (isNaN(en3)) {
    $('#waktu_en_cp').val('0');
    $('.waktu_en_cp').text('0');
}else {
  $('.waktu_en_cp').text();
}

$('.waktu_en_tp').each(function(){
  var nilai = $('#waktu_tp').val();
  console.log(nilai);
  var sp = $('#waktu_puas2').val();
  var stp = $('#waktu_tidak_puas2').val();
  var count = ((-sp/nilai)*Math.log2(sp/nilai) + (-stp/nilai)*Math.log2(stp/nilai));
  $('#waktu_en_tp').val(count);
  $('.waktu_en_tp').text(count);

});
var en2 = $('.waktu_en_tp').text();
if (isNaN(en2)) {
    $('#waktu_en_tp').val('0');
    $('.waktu_en_tp').text('0');
}else {
  $('.waktu_en_tp').text();
}

$('.waktu_en_stp').each(function(){
  var nilai = $('#waktu_stp').val();
  // console.log(nilai);
  var sp = $('#waktu_puas1').val();
  var stp = $('#waktu_tidak_puas1').val();
  var count = ((-sp/nilai)*Math.log2(sp/nilai) + (-stp/nilai)*Math.log2(stp/nilai));
  $('#waktu_en_stp').val(count);
  $('.waktu_en_stp').text(count);

});
var en1 = $('.waktu_en_stp').text();
if (isNaN(en1)) {
    $('#waktu_en_stp').val('0');
    $('.waktu_en_stp').text('0');
}else {
  $('.waktu_en_stp').text();
}

$('.waktu_gain').each(function(){
    var enty = $('#entrophy').val();
    var all_kuis = $('.jawaban').val();

    var en_sp =  $('.waktu_en_sp').text();
    var en_p =  $('.waktu_en_p').text();
    var en_cp =  $('.waktu_en_cp').text();
    var en_tp =  $('.waktu_en_tp').text();
    var en_stp =  $('.waktu_en_stp').text();

    var nilai_sp = $('#waktu_sp').val();
    var nilai_p = $('#waktu_p').val();
    var nilai_cp = $('#waktu_cp').val();
    var nilai_tp = $('#waktu_tp').val();
    var nilai_stp = $('#waktu_stp').val();

    var count = enty-((nilai_sp/all_kuis*en_sp)-(nilai_p/all_kuis*en_p)-(nilai_cp/all_kuis*en_cp)-(nilai_tp/all_kuis*en_tp)-(nilai_stp/all_kuis*en_stp));


    $('#waktu_gain').val(count);
    $('.waktu_gain').text(count);
});
