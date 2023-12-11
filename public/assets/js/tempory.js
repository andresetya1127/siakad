var form_tempory = document.getElementById('form-tempory');
form_tempory.addEventListener('submit', function (e) {
    e.preventDefault();
    tambahBaris();
});


function tambahBaris() {
    var kode = document.getElementById('matakuliah').value;
    var mk = $(`option[value="${kode}"]`).text();
    var semester = document.getElementById('semester').value;
    var data = JSON.parse(sessionStorage.getItem('form')) || [];

    if (kode !== '' | mk !== '' | semester !== '') {
        data.push({
            kode: kode,
            matakuliah: mk,
            semester: semester
        });

        sessionStorage.setItem('form', JSON.stringify(data));

        tampilkanData();
    }
}

function hapusBaris(index) {
    var data = JSON.parse(sessionStorage.getItem('form')) || [];
    data.splice(index, 1);
    sessionStorage.setItem('form', JSON.stringify(data));
    tampilkanData();
}

function tampilkanData() {
    var table = document.getElementById('tbl-tempory');
    var data = JSON.parse(sessionStorage.getItem('form')) || [];

    while (table.rows.length > 1) {
        table.deleteRow(1);
    }

    for (var i = 0; i < data.length; i++) {
        var newRow = table.insertRow(-1);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);

        cell1.innerHTML =
            `${data[i].kode} - ${data[i].matakuliah}<input type="hidden" name="kode_mk[]" value="${data[i].kode}">`;
        cell2.innerHTML = data[i].semester + `<input type="hidden" name="semester[]" value="${data[i].semester}">`;

        var hapusButton = document.createElement('button');
        hapusButton.innerHTML = '<i class="fa fa-trash">';
        hapusButton.classList.add('btn');
        hapusButton.classList.add('btn-danger');

        // Gunakan penutupan (closure) untuk menyimpan nilai i saat ini
        hapusButton.onclick = (function (index) {
            return function () {
                hapusBaris(index);
            };
        })(i);

        cell3.appendChild(hapusButton);
    }
}

window.onload = function () {
    tampilkanData();
};

//
$('#btn-reset-form').on('click', function (e) {
    e.preventDefault();
    sessionStorage.removeItem('form');
    tampilkanData();
})
