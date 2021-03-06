<div class="user">
    <div class="info">
        <a>
			<span>
			  {{ auth()->user()->username }}
			  <span class="user-level">
                  @can('customer')
                      Заказчик
                  @elsecan('executor')
                      Исполнитель
                  @elsecan('admin')
                      Администратор
                  @endcan
              </span>
			</span>
        </a>
        <div class="dropdown-divider"></div>
        <div class="d-flex justify-content-between">
            <button data-account="3" class="btn btn-outline-secondary btn-xs change {{ auth()->user()->type_account == 3 ? 'type_account_active' : '' }}">Я ИСПОЛНИТЕЛЬ</button>
            <button data-account="2" class="btn btn-outline-secondary btn-xs change {{ auth()->user()->type_account == 2 ? 'type_account_active' : '' }}">Я ЗАКАЗЧИК</button>
        </div>

        <hr>

        <span class="text-center balance-label">Баланс аккаунта: <b>{{ auth()->user()->balance }}</b> руб. </span>

        @can('customer')
            <a href="{{ route('balance') }}">пополнить</a>
        @elsecan('executor')
            <a href="">вывести</a>
        @endcan

        <div class="clearfix"></div>

    </div>
</div>