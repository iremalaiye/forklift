<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <a href="{{route('panel.dashboard.index')}}">
            <img src="{{ asset('images/icon1.ico') }}" alt="Logo" style="height: 60px;">
        </a>
    </div>



    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('panel.contacts.index') }}" title="Mesajlar">
                    <i class="ti-email"></i>
                </a>
            </li>

            <li class="nav-item nav-settings d-none d-lg-flex">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" style="padding: 0; border: none; background: none;">
                        <i class="ti-power-off"></i>
                    </button>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
