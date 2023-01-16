<!-- sidebar area -->
<aside class="sidebar-wrapper ">
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu1">
            <li class="single-nav-wrapper">
                <a href="{{ url('admin/dashboard') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-home"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <!-- <li class="single-nav-wrapper">
                <a class="menu-item" href="fomrs_editor_ch.html" aria-expanded="false">
                    <span class="left-icon"><i class="far fa-edit"></i></span>
                    <span class="menu-text">Forms</span>
                </a>
            </li> -->
            <!-- <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="#" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-table"></i></span>
                    <span class="menu-text">table</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="basic_table.html">Basic table</a></li>
                    <li><a href="data_table.html">data table</a></li>
                </ul>
            </li> -->
            <li class="single-nav-wrapper">
                <a class="has-arrow menu-item" href="{{ url('admin/bop') }}" aria-expanded="false">
                    <span class="left-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="menu-text">Data BOP Sekolah</span>
                </a>
                <ul class="dashboard-menu">
                    <li><a href="{{ url('admin/bop/bop_sma') }}">SMA</a></li>
                    <li><a href="data_bop_smk.html">SMK</a></li>
                    <li><a href="data_bop_slb.html">SLB</a></li>
                </ul>
            </li>
            <li class="single-nav-wrapper">
                <a href="{{ url('admin/kode_rekening') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-file"></i></span>
                    <span class="menu-text">Kode Rekening Sekolah</span>
                </a>
            </li>
            <li class="single-nav-wrapper">
                <a href="{{ url('admin/data_sekolah') }}" class="menu-item">
                    <span class="left-icon"><i class="fas fa-file"></i></span>
                    <span class="menu-text">Data Sekolah</span>
                </a>
            </li>
        </ul>
    </nav>
</aside><!-- /sidebar Area-->