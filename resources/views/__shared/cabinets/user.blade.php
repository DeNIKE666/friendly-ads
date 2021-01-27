<div class="user">
    <div class="info">
        <a>
			<span>
			  {{ auth()->user()->username }}
			  <span class="user-level">
                  @if(auth()->user()->type_account == 1)
                      Администратор
                  @elseif(auth()->user()->type_account == 2)
                      Заказчик
                  @elseif(auth()->user()->type_account == 3)
                      Исполнитель
                  @endif
              </span>
			</span>
        </a>
        <div class="dropdown-divider"></div>
        <div class="d-flex justify-content-between">
            <button data-account="3" class="btn btn-outline-secondary btn-xs change">Я ИСПОЛНИТЕЛЬ</button>
            <button data-account="2" class="btn btn-outline-info btn-xs change">Я ЗАКАЗЧИК</button>
        </div>
        <div class="clearfix"></div>
    </div>
</div>