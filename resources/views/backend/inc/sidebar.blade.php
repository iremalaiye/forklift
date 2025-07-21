<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Anasayfa</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('panel.slider.index')}}">Anasayfa İçeriği</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('panel.slider.create')}}">Anasayfa İçeriği Ekle</a></li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Hakkımızda</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="">
                <i class= "icon-grid menu-icon"> </i>
                <span class="menu-title">İletişim</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Ürünler</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.products.index') }}">Ürün Listesi</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('panel.products.create') }}">Yeni Ürün Ekle</a></li>
                </ul>
            </div>
        </li>


    </ul>
</nav>
