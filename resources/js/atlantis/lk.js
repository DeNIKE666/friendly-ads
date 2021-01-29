$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.change').on('click', function () {
        $.ajax({
            type: 'POST',
            url: "/cabinet/account/change-account",
            data: {type_account: $(this).data('account')},
            success: function (data) {
                if (data.success)
                    window.location.href = "/cabinet"
            }
        })
    })

    let data = {
        price: 0,
        period: 0
    }

    let amount    = $('#amount');
    let period    = $('#period');
    let siteCount = $('#site_count');

    amount.change(function () {
        data.price = $(this).val();
    })

    amount.keyup(function () {
        data.price  = parseInt($(this).val());
        data.period = parseInt(period.val());
        setCalc();
    })

    period.change(function () {
        data.price  = parseInt(amount.val());
        data.period = parseInt($(this).val());
        setCalc();
    })

    function setCalc() {

        let days = 0;

        if (data.period < 3)
            days = 0;
        else if (data.period === 3)
            days = 250;
        else if (data.period === 7)
            days = 400
        else if (data.period === 14)
            days = 750
        else if (data.period === 30)
            days = 1250

        if (data.period > data.price) return;

        let siteSum = 0;

        if(days > 3) {
            if (siteCount.val() > 5)
                siteSum = 350;
            else if (data.period > 10)
                siteSum = 900
        }

        let dopOptions = days + siteSum;

        let final = (data.price - dopOptions) / 250;

        let siteCount_int = parseFloat(final).toFixed(0)

        if (siteCount_int > 0)
            siteCount.val(parseFloat(siteCount_int).toFixed(0))
        else
            siteCount.val(0)
    }

    $('.unsubscribe').on('click', function () {

        let          id = $(this).data('id')
        let subsCount =  parseInt($('#subsCount').text());

        $.ajax({
            type: 'POST',
            url: "/cabinet/offers/unsubscribe/" + id,
            data: {id: id},
            success: function () {
                $('#subscribe-task-' + id).fadeOut('slow')

                subsCount--

                $('#subsCount').text(subsCount)
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
            url: "/cabinet/offers/subscribe/" + $(this).data('id'),
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