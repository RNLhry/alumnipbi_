@extends('master')
@section('title', 'Data Mahasiswa Alumni')
@section('content')
    <!-- row -->

    <style>
        .dataTables_header {
            display: flex;
            justify-content: space-between;
            /* Membuat elemen-elemen berada di ujung kiri dan kanan */
            align-items: center;
            /* Memastikan elemen-elemen berada di tengah vertikal */
        }

        .left-section,
        .right-section {
            display: flex;
            /* Mengaktifkan flexbox di dalam masing-masing section */
            align-items: center;
            /* Memastikan elemen-elemen berada di tengah vertikal di dalam section */
        }
    </style>
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item"><a href="/alumni">Data Mahasiswa Alumni</a></li>
            </ol>
        </div>
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_header">
                                <div class="left-section">
                                    <div>
                                        <a href="#" type="button" class="btn btn-rounded btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#modalCreate"><span
                                                class="btn-icon-start text-primary"><i class="fa fa-plus color-info"></i>
                                            </span>Add</a>

                                        <a id="modalExtract" href="#" class="btn btn-rounded btn-warning"
                                            data-bs-toggle="modal" data-bs-target="#extractModal"><span
                                                class="btn-icon-start text-warning"><i class="fa fa-file-pdf"></i>
                                            </span>Extract PDF</a>
                                        </a>

                                    </div>
                                </div>
                                <div class="right-section">
                                    <div id="example3_filter" class="dataTables_filter">
                                        <form action="/alumni/search" method="GET">
                                            <label><b>Search:</b></label>
                                            <input type="search" name="keyword" id="searchInput"
                                                placeholder="Cari data alumni..." aria-controls="example3">
                                        </form>

                                    </div>

                                </div>
                            </div>


                            <table id="example2" class="display dataTable no-footer" style="min-width: 100%" role="grid"
                                aria-describedby="example3_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label=": activate to sort column descending" style="width: 35px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 121.75px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Department: activate to sort column ascending"
                                            style="width: 148.781px;">NIM</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Gender: activate to sort column ascending"
                                            style="width: 63.0312px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Education: activate to sort column ascending"
                                            style="width: 113.562px;">Angkatan</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Mobile: activate to sort column ascending"
                                            style="width: 95.0312px;">Mobile</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Email: activate to sort column ascending"
                                            style="width: 161.422px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Joining Date: activate to sort column ascending"
                                            style="width: 108.016px;">Pekerjaan</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 56.0312px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($alumnis as $datas)
                                        <tr role="row" class="odd">

                                            <td class="sorting_1">
                                                @if ($datas->foto)
                                                    <img src="{{ url('images/' . $datas->foto) }}" class="rounded-circle"
                                                        width="35" alt="img">
                                                @else
                                                    <img src="{{ asset('assets/images/profile/small/pic1.jpg') }}"
                                                        class="rounded-circle" width="35" alt="img">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $datas->nama }}</td>
                                            <td>{{ $datas->nim }}</td>
                                            <td>{{ $datas->jenis_kelamin }}</td>
                                            <td>{{ $datas->angkatan }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $datas->no_telp }}</strong></a>
                                            </td>
                                            <td><a href="javascript:void(0);"><strong>{{ $datas->email }}</strong></a>
                                            </td>
                                            <td>{{ $datas->pekerjaan }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="/edit/{{ $datas->id }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a id="modalTampil" href="#" data-id="{{ $datas->id }}"
                                                        data-url="/show/{{ $datas->id }}"
                                                        class="btn btn-success shadow btn-xs sharp me-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalShow"><i
                                                            class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="/hapus/{{ $datas->id }}"
                                                        class="btn btn-danger shadow btn-xs sharp me-1"><i
                                                            class="fas fa-trash"></i></a>



                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <!-- Tampilkan sesuatu jika tidak ada pencarian tetapi ada data alumni -->




                                </tbody>
                            </table>
                            <div class="dataTables_header">
                                <div class="left-section">
                                    <div class="dataTables_length" id="example3_length">

                                    </div>
                                </div>
                                <div class="right-section">
                                    {{ $alumni->links() }}
                                </div>
                            </div>
                            {{-- <div id="example3_wrapper" class="dataTables_wrapper no-footer">
                        <div class="right-section">
                            {{ $alumni->links() }}
                        </div>
                        </div> --}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.alumni.modal')
    @include('admin.alumni.show')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            /* When click show user */
            $('body').on('click', '#modalTampil', function() {
                var userURL = $(this).data('url');
                $.get(userURL, function(data) {
                    $('#showModal').modal('show');

                    // Menentukan path gambar
                    var imagePath = '/images/' + data.foto;

                    // Memeriksa apakah gambar ada
                    var img = new Image();
                    img.onload = function() {
                        $('#user-foto').attr('src', imagePath);
                    }
                    img.onerror = function() {
                        // Jika gambar tidak ditemukan, tampilkan gambar default
                        $('#user-foto').attr('src',
                            '/images/defaultAlumni.png'
                        ); // Ganti dengan path gambar default Anda
                    }
                    img.src = imagePath;

                    // Menampilkan data pengguna lainnya
                    $('#user-id').text(data.id);
                    $('#user-name').text(data.nama);
                    $('#user-email').text(data.email);
                    $('#user-jenis_kelamin').text(data.jenis_kelamin);
                    $('#user-tempat_tanggal_lahir').text(data.tempat_tanggal_lahir);
                    $('#user-alamat').text(data.alamat);
                    $('#user-angkatan').text(data.angkatan);
                    $('#user-agama').text(data.agama);
                    $('#user-program_studi').text(data.program_studi);
                    $('#user-tempat_lahir').text(data.tempat_lahir);
                    $('#user-no_telp').text(data.no_telp);
                    $('#user-tahun_masuk').text(data.tahun_masuk);
                    $('#user-tahun_lulus').text(data.tahun_lulus);
                    $('#user-ipk').text(data.ipk);
                    $('#user-pekerjaan').text(data.pekerjaan);
                    $('#user-awal_bekerja').text(data.awal_bekerja);
                    $('#user-domisili_tempat_kerja').text(data.domisili_tempat_kerja);
                })
            });
        });
    </script>





@endsection
