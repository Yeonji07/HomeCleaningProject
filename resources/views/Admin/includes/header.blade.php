<header id="header" class="fixed-top" style="height: 80px;">
    <div class="d-flex align-items-center" id='navbar-admin' style="padding-left:30px;padding-right:30px;">
        <h1 class="admin-title mr-auto"><a href="#">Welcome, Admin</a></h1>
        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <a class="nav-item nav-link active" href="/admin/home">Home</a>
                <a class="nav-item nav-link active" href="/admin/tambahpekerja">Tambah Pekerja </a>
                <a class="nav-item nav-link active" href="/admin/daftarPekerja">Daftar Pekerja </a>
                <a class="nav-item nav-link" href="/admin/daftarUser">Daftar User</a>
                <a class="nav-item nav-link" href="/admin/daftarAppointment">Daftar Appointment</a>
                <a class="nav-item nav-link" href="/admin/daftarTransaksi">Daftar Transaksi</a>
                <a class="nav-item nav-link" href="/admin/statistik">Statistik</a>
            </ul>
        </nav>
        <!-- .nav-menu -->

        <form method='post' action="/admin/logout">
            @csrf
            <button type='submit' class='btn btn-primary ml-3 mt-1' name='btnLogout'>Logout</button>
        </form>
    </div>
</header>
