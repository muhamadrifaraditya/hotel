@include('home.head')
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    @include('home.header')
    <!-- end header inner -->
    <!-- end header -->
    <!-- our_room -->
    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div style="padding: 20px;" class="room_img">
                            <figure><img style="height: 300px; width: 820px;" src="/room/{{ $room->gambar }}"
                                    alt="#" /></figure>
                        </div>
                        <div class="bed_room">
                            <h3>{{ $room->nama_kamar }}</h3>
                            <p style="padding: 12px;">{{ Str::limit($room->deskripsi, 75) }}</p>
                            <h4 style="padding: 12px;">Free Wifi : {{ $room->wifi }}</h4>
                            <h4 style="padding: 12px;">Tipe Kamar : {{ $room->type_kamar }}</h4>
                            <h3 style="padding: 10px;">Harga : {{ $room->harga }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 style="font-size: 40px;">Booking Kamar</h1>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if ($errors)
                        @foreach ($errors->all() as $errors)
                            <li style="color: red">
                                {{ $errors }}
                            </li>
                        @endforeach
                    @endif
                    @if (Auth::check())
                        <form action="{{ url('add_booking', $room->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="floatingInput">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="floatingInput"
                                    placeholder="Nama" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="floatingInput">Email</label>
                                <input type="email" class="form-control" name="email" id="floatingInput"
                                    placeholder="bebas@example.com" value="{{ Auth::user()->email }}"">
                            </div>
                            <div class="mb-3">
                                <label for="floatingInput">No Telepon</label>
                                <input type="text" class="form-control" name="telpon" id="floatingInput"
                                    placeholder="+62..." value="{{ Auth::user()->telpon }}">
                            </div>
                            <div class="mb-3">
                                <label for="floatingInput">Check in</label>
                                <input type="date" class="form-control" name="start_date" id="start_date">
                            </div>
                            <div class="mb-3">
                                <label for="floatingInput">Check out</label>
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                            <div style="width: 200px; padding: 20px;">
                                <input type="submit" class="btn btn-primary" value="Booking Kamar">
                            </div>
                        @else
                            <p class="alert alert-danger">Anda harus login terlebih dahulu untuk melakukan booking
                                kamar.
                            </p>
                            <a class="btn btn-danger" href="{{ url('login') }}">Login</a>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--  footer -->
    @include('home.footer')
    <!-- end footer -->
    <!-- Javascript files-->
    @include('home.js')
    <script type="text/javascript">
        $(document).ready(function() {
            var dtToday = new Date();
            var month = dtTodat.getMonth() = 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            $('#start_date').attr('min', maxDate);
            $('#end_date').attr('min', maxDate);
        });
    </script>
</body>

</html>
