

<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            @include('__shared.cabinets.user')

            <ul class="nav nav-primary">

                <li class="nav-section">
                    <h4 class="text-section">Продвижение</h4>
                </li>


                <li class="nav-item">
                    <a href="{{ route('customer.performers') }}">
                        <i class="fal fa-user-chart"></i>
                        <p>Исполнители</p>
                    </a>
                </li>

                <li class="nav-section">
                    <h4 class="text-section">Задачи</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer.tasks.index') }}">
                        <i class="fal fa-tasks"></i>
                        <p>Мои задания</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('customer.tasks.create') }}">
                        <i class="fal fa-plus-circle"></i>
                        <p>Создать задание</p>
                    </a>
                </li>

                <li class="nav-section">
                    <h4 class="text-section">Финансы</h4>
                </li>

                <li class="nav-item">
                    <a href="">
                        <i class="fal fa-wallet"></i>
                        <p>История пополнений</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="">
                        <i class="fal fa-repeat-alt"></i>
                        <p>Расходы</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
