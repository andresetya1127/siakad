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
                    $(`[name=${key}]`).next('.error').html(value);
                })
                Sweat_alert('error', response.error)

            } else if (response.success) {
                Sweat_alert('success', response.success)
                location.href = response.route;

            }
        },

    })
})

function Sweat_alert(icon, title) {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
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
$(document).ready(function () {
    $('.select2').select2({
        theme: 'bootstrap4',
    });

});
