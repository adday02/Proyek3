<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/img/favicon.png" rel="icon">

    <title>Daftar</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
        @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"aria-label="close">
                        <span aria-hidden= "true"></span>
                    </button>
                    <div>
                        @foreach ($errors->all() as $error)
                            {{$error}} <br>
                            @endforeach
                    </div>
                </div>
                @endif  
          <section class="login_content">
          <form action="{{route('daftar.store')}}" class="form-horizontal tasi-form" method="post" enctype="multipart/form-data">
            @csrf
              <h1>DAFTAR</h1>
                <input type="text" class="form-control" name="nik" placeholder="NIK" required pattern="[0-9]{16}" title="Masukkan NIK dengan angka dan 16 karakter">
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required pattern="[A-Za-z\s]{3,255}" title="Masukkan Nama Masyarakat hanya dengan huruf, Min 3 dan Max 255">
                <input type="password" class="form-control" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Masukkan Password dengan huruf besar dan kecil, Min 8 Karakter">
                <input type="text" class="form-control" name="no_hp" placeholder="No HP" required attern="[0-9]{11,13}" title="Masukkan No HP dengan angka, Min 11 dan Max 13">
                <select class="form-control" name="jk" required>
                        <option disabled="" selected="" value="">Pilih Jenis Kelamin</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                </select>
                <br>
                <select class="form-control" name="pendidikan_terakhir" required>
                        <option disabled="" selected="" value="">Pilih Pendidikan Terakhir</option>
                        <option>SD/MI/Sederajat</option>
                        <option>SMP/MTs/Sederajat</option>
                        <option>SMA/SMK/MA/Sederajat</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4</option>
                        <option>S1</option>
                        <option>S2</option>
                        <option>S3</option>
                      </select>
                <br>
                <textarea type="text" class="form-control" name="alamat" placeholder="Alamat" required pattern=".{,255}" title="Alamat Max 255 Karakter"></textarea>
                <br>
                <input type="file" class="form-control" name="foto" required>
                <br>
                <button type="submit" class="btn btn-successt">Daftar</button>
                <p>Jika Anda sudah memiliki akun silahkan <a href="{{URL('/login')}}">login disini</a></p>
              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br>
                <div>
                  <h1>Disnaker Kabupaten Indramayu</h1>
                  <p>©Kelompok 2</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>