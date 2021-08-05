$('.all_gain').each(function(){
  var waktu_gain = $('.waktu_gain').text();
  var akurat_gain = $('.akurat_gain').text();
  var fokus_gain = $('.fokus_gain').text();
  var kepuasan_gain = $('.kepuasan_gain').text();

  var count = parseFloat(waktu_gain) + parseFloat(akurat_gain) + parseFloat(fokus_gain) + parseFloat(kepuasan_gain)
  $('#all_gain').val(count);
  $('.all_gain').text(count);
});


$('.all_kesimpulan').each(function(){
  var gain =  $('.all_gain').text();
  var kesimpulan = $('.all_kesimpulan').text();

  if (gain.toString().indexOf('.') > 0 || gaintoString().indexOf('.') <= 0.60) {
      var kesimpulan = $('.all_kesimpulan').text('Sangat Tidak Baik');
  }else if (gain.toString().indexOf('.') > 0.61 || gain.toString().indexOf('.') <= 0.70) {
      var kesimpulan = $('.all_kesimpulan').text('Tidak Baik');
  }else if (gain.toString().indexOf('.') > 0.71 || gain.toString().indexOf('.') <= 0.80) {
      var kesimpulan = $('.all_kesimpulan').text('Cukup Baik');
  }else if (gain.toString().indexOf('.') > 0.81 || gain.toString().indexOf('.') <= 0.90) {
      var kesimpulan = $('.all_kesimpulan').text('Baik');
  }else if (gain.toString().indexOf('.') > 0.90) {
    var kesimpulan = $('.all_kesimpulan').text('Sangat Baik');
  }
})
