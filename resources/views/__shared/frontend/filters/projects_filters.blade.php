<script>

    const projectUrl = '/projects'

    let filters = {
        category_id: null,
        type_task: null,
        amount: null
    }

    CurrentParams();

    // Установим выбранные фильтры

    function CurrentParams()  {

        @if(request('category_id'))
            filters.category_id = "{{ request('category_id') }}"
        $('#category_id-' + filters.category_id).prop('checked', true);
        @endif

        @if(request('type_task'))
            filters.type_task = "{{ request('type_task') }}"
           $('#type_task_' + filters.type_task).prop('checked', true);
        @endif

        @if(request('amount'))
            filters.amount = "{{ request('amount') }}"
        $('#prices-filters-' + filters.amount).prop('checked', true);
        @endif

    }

    // Очищаем все данные

    function clear()
    {
        filters.category_id = null;
        filters.type_task   = null;
        filters.amount      = null;
    }

    // Выбор категории

    let category = $('input[name="category"]');

    category.click(function () {
        filters.category_id = $(this).data('id');
    })

    // Выбор типа задания

    let type_task = $('.type_task');

    type_task.click(function () {
        filters.type_task   = $(this).data('id')
    })

    // Выбор фильтра по сумме больше, меньше

    let amount = $('input[name="amount"]');

    amount.click(function () {
        filters.amount = $(this).data('id');
    })

    // Применяем фильтр

    let apply = $('#apply-filter').on('click', function () {

        let query = '/?';

        $.each(filters, function (index, item) {
            if (item !== null) {
                query += index + '=' + item + '&';
            }
        })

        window.location.href = projectUrl + query.slice(0, -1);
    })

    // Сбрасываем фильтры

    $('#reset-filter').on('click', function () {

        clear();

        apply.trigger('click')

    });

    // Показать скрыть фильтры

    $('#showFilters').on('click', function () {

        let filters = $('#filters');

        if (filters.hasClass('d-none')) {
            filters.removeClass('d-sm-none').removeClass('d-none');
            $(this).text('Закрыть фильтры')
        } else {
            filters.addClass('d-sm-none').addClass('d-none');
            $(this).text('Открыть фильтры')
        }
    })

</script>