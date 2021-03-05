<!-- ============================ Footer Start ================================== -->

<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <div class="footer-widget">
                        <img src="{{ asset('images/frontend/logo_2.png') }}" class="img-footer" alt="Размещение ссылки на сайте" />
                        <div class="footer-add">
                            <p><span class="contacts-line"><i class="fal fa-envelope-open"></i></span> - <a href="mail:l1nkst@yandex.ru">l1nkst@yandex.ru</a></p>
                            <p><span class="contacts-line"><i class="fab fa-discord"></i></span> - <a href="https://discord.gg/UtYZUtRv">дискорд сервер</a></p>
                            <p>Сервис для массовых размещений ссылок на многих популярных ресурсах с хорошим траффиком</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-2">
                    <div class="footer-widget">
                        <h4 class="widget-title">Полезные ссылки</h4>
                        <ul class="footer-menu">
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Вопрос ответ</a></li>
                            <li><a href="#">Пожелания</a></li>
                            <li><a href="#">Поддержка проекта</a></li>
                            <li><a href="#">Сотрудничество</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-2">
                    <div class="footer-widget">
                        <h4 class="widget-title">Исполнитель</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('executor.sites.index') }}">Мои сайты</a></li>
                            <li><a href="{{ route('executor.sites.create') }}">Добавить сайт</a></li>
                            <li><a href="{{ route('executor.offers') }}">Все задания</a></li>
                            <li><a href="{{ route('executor.subs.task') }}">Мои отклики</a></li>
                            <li><a href="#">Вывод баланса</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-2">
                    <div class="footer-widget">
                        <h4 class="widget-title">Заказчик</h4>
                        <ul class="footer-menu">
                            <li><a href="{{ route('customer.tasks.index') }}">Мои задания</a></li>
                            <li><a href="{{ route('customer.tasks.create') }}">Создать задание</a></li>
                            <li><a href="#">Пополнить баланс</a></li>
                            <li><a href="#">Исполнители</a></li>
                            <li><a href="#">Расходы</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <p class="mb-0">© 2020 {{ env('APP_NAME') }}. All Rights Reserved</p>
                </div>

                <div class="col-lg-6 col-md-6 text-right">
                    <ul class="footer-bottom-social">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-linkedin"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->