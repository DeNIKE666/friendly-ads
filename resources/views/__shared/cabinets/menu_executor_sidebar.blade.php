<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            @include('__shared.cabinets.user')

            <ul class="nav nav-primary">

                <li class="nav-section">
                    <h4 class="text-section">Сайты</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('executor.sites.index') }}">
                        <i class="fal fa-sitemap"></i>
                        <p>Все сайты</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('executor.sites.create') }}">
                        <i class="fal fa-layer-plus"></i>
                        <p>Добавить сайт</p>
                    </a>
                </li>

                <li class="nav-section">
                    <h4 class="text-section">Работа</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('executor.offers') }}">
                        <i class="fal fa-briefcase"></i>
                        <p>Все предложения</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('executor.subs.task') }}">
                        <i class="fal fa-paper-plane"></i>
                        <p>Мои отклики</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
