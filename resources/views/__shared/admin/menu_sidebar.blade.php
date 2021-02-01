<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <h4 class="text-section">Категории</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('categories.create') }}">
                        <i class="fal fa-layer-plus"></i>
                        <p>Добавить категорию</p>
                    </a>


                <li class="nav-item">
                    <a href="{{ route('categories.index') }}">
                        <i class="fal fa-list"></i>
                        <p>Все категории</p>
                    </a>
                </li>

                <li class="nav-section">
                    <h4 class="text-section">Сайты</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sites.index') }}">
                        <i class="fal fa-sitemap"></i>
                        <p>Все сайты</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.sites.create') }}">
                        <i class="fal fa-layer-plus"></i>
                        <p>Добавить сайт</p>
                    </a>
                </li>

                <li class="nav-section">
                    <h4 class="text-section">Задания</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tasks.index') }}">
                        <i class="fal fa-clipboard-list-check"></i>
                        <p>Все задания</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.tasks.create') }}">
                        <i class="fal fa-plus"></i>
                        <p>Добавить задание</p>
                    </a>
                </li>



                <li class="nav-section">
                    <h4 class="text-section">Аккаунты</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fal fa-users"></i>
                        <p>Все пользователи</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.users.create') }}">
                        <i class="fal fa-user-plus"></i>
                        <p>Создать пользователя</p>
                    </a>
                </li>

                <li class="nav-section">
                    <h4 class="text-section">Финансы</h4>
                </li>

                <li class="nav-item">
                    <a href="">
                        <i class="fal fa-sack"></i>
                        <p>Все пополнения</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="">
                        <i class="fal fa-exchange-alt"></i>
                        <p>Выводы</p>
                    </a>
                </li>

                <li class="nav-section">
                    <h4 class="text-section">Настройки</h4>
                </li>

                <li class="nav-item">
                    <a href="">
                        <i class="fal fa-sliders-h"></i>
                        <p>Управление сайтом</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
