<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('admin/img/avatar-6.jpg') }}" alt="..."
                class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Muhamad Rifa 'i</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class=""><a href="{{ url('home') }}"> <i class="icon-home"></i> Home </a></li>

        <li>
            <a href="#kamarDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i> Kamar Hotel
            </a>
            <ul id="kamarDropdown" class="collapse list-unstyled">
                <li><a href="{{ url('data_kamar') }}">Data Kamar</a></li>
                <li><a href="{{ url('create_kamar') }}">Tambah Kamar</a></li>
            </ul>
        </li>

        {{-- <li>
            <a href="#bookingDropdown" aria-expanded="false" data-toggle="collapse">
                <i class="icon-windows"></i> Booking
            </a>
            <ul id="bookingDropdown" class="collapse list-unstyled">
                <li><a href="{{ url('data_booking') }}">Data Booking</a></li>
            </ul>
        </li> --}}
    </ul>

</nav>
