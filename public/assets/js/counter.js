
setInterval(function () {
    let sks_a = parseInt($('[name="sks_wajib"]').val());
    let sks_b = parseInt($('[name="sks_pilihan"]').val());

    if (isNaN(sks_a) || isNaN(sks_b)) {
        $('#jmlh_sks').html('NaN');
    } else {
        $('#jmlh_sks').html(sks_a + sks_b);
    }
}, 1000)
