$(document).ready(function () {

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

        let final = (data.price - dopOptions) / 550;

        let siteCount_int = parseFloat(final).toFixed(0)

        if (siteCount_int > 0)
            siteCount.val(parseFloat(siteCount_int).toFixed(0))
        else
            siteCount.val(0)
    }
})