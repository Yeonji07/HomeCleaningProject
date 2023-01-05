<header id="header" class="fixed-top">
    <div class="container-fluid d-flex align-items-center">
        <h1 class="logo mr-auto" style="margin-left: 2%;"><a href="/user/home">Home Cleaning</a></h1>
        <nav class="nav-menu d-none d-lg-block" style="margin-right: 2%;">
            <ul>
                <li><a href="/user/home#about">About Us</a></li>
                <li><a href="/user/home#services">Services</a></li>
                <li><a href="/user/home#portofolio">Portfolio</a></li>
                <li><a href="/user/home#pricing">Pricing</a></li>
                <li><a href="/user/home#contact">Contact Us</a></li>
                {{-- <li><a href="/user/order">Order</a></li> --}}
                <li><a href="/user/appointment">Appointment</a></li>
                <li><a href="/user/history">History Pemesanan</a></li> <!-- Belum ngelink ke file laen -->
                <li><a href="/user/listpemesanan-user">List Appointment</a></li> <!-- Belum ngelink ke file laen -->
            </ul>
        </nav>
        @php
            $a = Session::get("sessionlogin");
            $name = $a["data"]->full_name;
        @endphp

        <div class="dropdown" style="margin-right: 2%;">
            <button href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><b>{{$name}}</b></button>
            <ul id="login-dp" class="dropdown-menu" style="width: 250px;">
                <li class="px-3 py-3">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form" method="post" action="/user/logout" style="width: 100%;">
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
