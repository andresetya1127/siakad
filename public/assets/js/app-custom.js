

try {
    $('.select2').select2({
        theme: 'bootstrap4',
    });

} catch (error) {
}
$(".sub-menu").find("a").prepend('<i class="mdi mdi-bird"></i>');

$('#myform').on('submit', function (e) {
    e.preventDefault();
    let form = $(this).serialize();
    $.ajax({
        url: $('#myform').attr('action'),
        data: form,
        type: 'POST',
        success: function (response) {
            if (response.error) {
                $('.error').html('');
                $.each(response.errors, function (key, value) {
                    $(`[name=${key}]`).parents('div').children('.error').html(value);
                })
                Sweat_alert('error', response.error)

            } else if (response.success) {
                Sweat_alert('success', response.success)
                location.href = response.route;

            }
        },

    })
})

try {
    $('.btn-delete').on('click', function (e) {
        e.preventDefault()
        let url = $(this).attr('href');
        Swal.fire({
            title: "Apakah Anda Yakin?",
            icon: "warning",
            iconColor: "#c47c00",
            showCancelButton: true,
            confirmButtonText: "Ya.",
            cancelButtonText: "batal",
            cancelButtonColor: "#f04141",
            confirmButtonColor: "#1ac71a",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = url;
            }
        });
    })
} catch (error) {
    console.log('alert-not-found');
}

function Sweat_alert(icon, title) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        background: icon == 'success' ? '#2dc425' : '#f55433',
        iconColor: '#ffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: icon,
        title: title,
    });
}



var sesi = $('#session-get');

if (!sesi.attr('data-value') == '' | !sesi.attr('data-value') == null) {
    Sweat_alert(sesi.attr('data-type'), sesi.attr('data-value'));
}



function fetchLog() {
    $.ajax({
        'type': 'GET',
        'url': '/get-logs-all',
        success: function (r) {
            let logContainer = $('#logContainer');

            logContainer.html(r.log);
            logContainer.removeClass('text-center')
        }
    })
}
function logScroll() {
    let scroll = $('#auto-scroll').hasClass('scroll-on');
    if (scroll) {
        let logContainer = $('#logContainer');
        logContainer.scrollTop(logContainer[0].scrollHeight);
    }


}

$('#auto-scroll').on('click', function () {
    if ($(this).hasClass('scroll-on')) {
        $(this).removeClass('scroll-on btn-subtle-success').addClass('scroll-off btn-subtle-danger').text('Auto Scroll: Off');
    } else {
        $(this).removeClass('scroll-off btn-subtle-danger').addClass('scroll-on btn-subtle-success').text('Auto Scroll: on');
    }
});

try {
    setInterval(function () {
        fetchLog();
        logScroll();
    }, 2000);
} catch (error) {

}

