<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Адміністрація</li>
        <li class="nav-item">
            <a href="{{route("admin.user.index")}}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Користувачі
                    <span class="badge badge-info right">{{$users}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.role.index")}}" class="nav-link">
                <i class="nav-icon fas fa-tag"></i>
                <p>
                    Ролі
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.typeUser.index")}}" class="nav-link">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                    Тип користувача
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.services.index")}}" class="nav-link">
                <i class="nav-icon fas fa-project-diagram"></i>
                <p>
                    Послуги
                    <span class="badge badge-info right">{{$services}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.graduation.index")}}" class="nav-link">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                    Оцінювання
                    <span class="badge badge-info right">{{$graduations}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.contact.index")}}" class="nav-link">
                <i class="nav-icon fas fa-address-book"></i>
                <p>
                    Повідомлення
                    <span class="badge badge-info right">{{$messages}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route("admin.report.index")}}" class="nav-link">
                <i class="nav-icon fas fa-flag-checkered"></i>
                <p>
                    Повідомлення про порушення
                    <span class="badge badge-info right">{{$reports}}</span>
                </p>
            </a>
        </li>
    </ul>
</nav>
