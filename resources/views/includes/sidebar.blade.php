 <!-- Left Panel -->
 <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ route('dashboard') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li class="menu-title">Informasi</li><!-- /.menu-title -->
                <li class="">
                    <a href="{{ route('activities.index') }}"> <i class="menu-icon fa fa-list"></i>Kegiatan masjid</a>
                </li>
                <li class="">
                    <a href="{{ route('announcements.index') }}"> <i class="menu-icon fa fa-plus"></i>Penguman Masjid</a>
                </li>
                <li class="">
                    <a href="{{ route('jumat.index') }}"> <i class="menu-icon fa fa-plus"></i>Khotbah jumat</a>
                </li>

                <li class="menu-title">Kas masjid</li><!-- /.menu-title -->
                <li class="">
                    <a href="#"> <i class="menu-icon fa fa-list"></i>Laporan keuangan</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->