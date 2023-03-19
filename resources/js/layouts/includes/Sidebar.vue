<template>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">ADMIN PANEL</li>
            <li class="nav-item">
                <router-link    to="#" class="nav-link" active-class="active" >
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Справочники
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </router-link>
                <ul  class = 'nav nav-treeview'>
                    <li class="nav-item">
                        <router-link    to="/department" class="nav-link" active-class="active" >
                            <i class="far fa-circle nav-icon"></i>
                            <p>Отделение</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/speciality" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Специальности</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/cabinet" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Кабинеты</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Участники</p>
                        </router-link>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <router-link    to="#" class="nav-link" active-class="active" >
                    <i class="fa fa-users"></i>
                    <p>
                        Персонал
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </router-link>

                <ul  class = 'nav nav-treeview'>
                    <li class="nav-item">
                        <router-link    to="employers" class="nav-link" active-class="active" >
                            <i class="far fa-circle nav-icon"></i>
                            <p>Сотрудники</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Сброс пороля</p>
                        </router-link>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <router-link    to="#" class="nav-link" active-class="active" >
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        Связь
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </router-link>

                <ul  class = 'nav nav-treeview'>
                    <li class="nav-item">
                        <router-link    to="department" class="nav-link" active-class="active" >
                            <i class="far fa-circle nav-icon"></i>
                            <p>Отзывы</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Анкета (Опросы)</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Результаты опросов</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                    <router-link    to="/area" class="nav-link" active-class="active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Обращения</p>
                    </router-link>
                     </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Настройки</p>
                        </router-link>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <router-link    to="#" class="nav-link" active-class="active" >
                    <i class="nav-icon fas fa-qrcode"></i>
                    <p>
                        QR
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </router-link>

                <ul  class = 'nav nav-treeview'>
                    <li class="nav-item">
                        <router-link    to="department" class="nav-link" active-class="active" >
                            <i class="far fa-circle nav-icon"></i>
                            <p>Организация</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Кабинеты</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Врачи и сотрудники</p>
                        </router-link>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <router-link    to="#" class="nav-link" active-class="active" >
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>
                        Статистика
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </router-link>

                <ul  class = 'nav nav-treeview'>
                    <li class="nav-item">
                        <router-link    to="department" class="nav-link" active-class="active" >
                            <i class="far fa-circle nav-icon"></i>
                            <p>Общая</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>По участкам</p>
                        </router-link>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <router-link    to="#" class="nav-link" active-class="active" >
                    <i class="nav-icon fas fa-book-medical"></i>
                    <p>
                        Врач
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </router-link>

                <ul  class = 'nav nav-treeview'>
                    <li class="nav-item">
                        <router-link    to="department" class="nav-link" active-class="active" >
                            <i class="far fa-circle nav-icon"></i>
                            <p>Паказатели участка</p>
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link    to="/area" class="nav-link" active-class="active">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Мои данные</p>
                        </router-link>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>



</template>

<script>
    export default {
        name: "Sidebar",
    }
</script>
