<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <title>Halaman Jadwal Kuliah</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a class="navbar-brand font-weight-bold text-white" href="#">UNIVERSITAS HARAPAN BANGSA</a>

          <form class="form-inline my-2 my-lg-0 ml-auto">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
          </form>

          <div class="ml-3">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <i class="fa fa-bell" aria-hidden="true"></i>
              <i class="fas fa-sign-out-alt" data-toggle="tooltips" title="Sign Out"></i>

          </div>
        </div>
      </nav>

      <div class="row no-gutters">

          <div class="nav col-md-2 bg-dark">

            <ul class="menu flex-column mt-4 mb-2 ml-1 mr-1 pl-0">

                <li class="nav-item">
                    <a class="nav-link active" href="/"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <hr class="bg-light">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/mahasiswa"><i class="fas fa-user-graduate"></i>  Daftar Mahasiswa</a>
                    <hr class="bg-light">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dosen"><i class="fas fa-chalkboard-teacher"></i> Daftar Dosen</a>
                    <hr class="bg-light">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pegawai"><i class="fa fa-user" aria-hidden="true"></i> Daftar Pegawai</a>
                    <hr class="bg-light">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/jadwal"><i class="fa fa-calendar" aria-hidden="true"></i> Jadwal Kuliah</a>
                    <hr class="bg-light">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/matakuliah"><i class="fa fa-clipboard" aria-hidden="true"></i> Mata Kuliah</a>
                    <hr class="bg-light">
                </li>
              </ul>
          </div>

          <div class="content col-md-9 mt-5 ml-5">

            <h3><i class="fa fa-calendar"></i> Jadwal</h3><hr>

            <div class="table-wrapper">
              <div class="table-scroll">
                <table class="table table-fixed mt-5">
                  <thead>
                    <tr>
                      <th scope="col" class="text">No</th>
                      <th scope="col" class="text">Mata Kuliah</th>
                      <th scope="col" class="text">Dosen Pengajar</th>
                      <th scope="col" class="text">Hari</th>
                      <th scope="col" class="text">Jam</th>
                      <th scope="col" class="text">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($jadwal as $j)
                        @php ($i=1)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$j->kode_mk}}</td>
                            <td>{{$j->nip}}</td>
                            <td>{{$j->hari}}</td>
                            <td>{{$j->jam}}</td>
                            <td>
                            <a href="/jadwal/edit"><i class="fas fa-edit mr-4"></i></a>
                            <a href="/jadwal/hapus"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @php ($i++)
                      @endforeach


                  </tbody>
                </table>

                <div>
                    <a href="/jadwal/add"><button class="btn btn-secondary ml-auto">Tambah</button></a>
                </div>
              </div>

          </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>
