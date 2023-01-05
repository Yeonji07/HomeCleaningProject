<header id="header" class="fixed-top">
    <div class="d-flex align-items-center" id='navbar-admin' style="padding-left:30px;padding-right:30px;">
        <h1 class="logo mr-auto"><a href="#">Home Cleaning</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="/pekerja/home">Home</a></li>
                <li><a href="/pekerja/historyPekerjaan">History Pekerjaan</a></li>
                <li><a href="/pekerja/daftarPekerjaan">Daftar Pekerjaan</a></li>
            </ul>
        </nav>
        <!-- .nav-menu -->
        @php
            $a = Session::get("sessionlogin");
            $name = $a["data"]->nama_pekerja;
        @endphp

        <div class="dropdown" style="margin-left: 20px;">
            <button href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><b>Pekerja {{$name}}</b> <span class="caret"></span></button>
            <ul id="login-dp" class="dropdown-menu" style="width: 250px;">
                <li class="px-3 py-3">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form" role="form" method="post" action="/pekerja/editprofile" accept-charset="UTF-8">
                                @csrf
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning btn-block" name='btnEditProfile'>Edit Profile</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <form class="form" role="form" method="post" action="/pekerja/logout" accept-charset="UTF-8" id="login-nav">
                                @csrf
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger btn-block" name='btnLogout'>Logout</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </div>

</header>
