$(document).ready(function () {
    $('.unsubscribe').on('click', function () {
        $.ajax({
            type: 'POST',
            url: "/cabinet/offers/unsubscribe/" + $(this).data('id') ,
            data: {id: $(this).data('id')},
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
                $.notify({
                    icon: 'flaticon-alarm-1',
                    title: 'Ошибка',
                    message: data.responseJSON.message,
                }, {
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    },
                    time: 1000,
                });
            }
        })
    })

    $('.subscribe').on('click', function () {
        $.ajax({
            type: 'POST',
            url: "/cabinet/offers/subscribe",
            data: {id: $(this).data('id')},
            success: function (data) {
                window.location.reload();
            },
            error: function (data) {
                $.notify({
                    icon: 'flaticon-alarm-1',
                    title: 'Ошибка',
                    message: data.responseJSON.message,
                }, {
                    type: 'danger',
                    placement: {
                        from: "top",
                        align: "center"
                    },
                    time: 1000,
                });
            }
        })
    })
})