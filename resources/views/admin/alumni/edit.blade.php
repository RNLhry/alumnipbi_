@extends('master')
@section('title', 'Edit Data Mahasiswa Alumni')
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
                <li class="breadcrumb-item"><a href="#">Edit Data Mahasiswa Alumni</a></li>
            </ol>
        </div>

        <form action="/alumniupdate" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $alumni[0]->id }}">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">

                        <div class="card-body">
                            <div id="smartwizard" class="form-wizard order-create sw sw-theme-default sw-justified">

                                <div class="tab-content" style="">
                                    <div id="wizard_Service" class="tab-pane" role="tabpanel" style="display: block;">
                                        <div class="row">
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Nama Lengkap*</label>
                                                    <input type="text" name="nama" class="form-control"
                                                        placeholder="Masukkan Nama Lengkap.." value="{{ $alumni[0]->nama }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">NIM*</label>
                                                    <input type="number" name="nim" class="form-control"
                                                        placeholder="Masukkan NIM....." value="{{ $alumni[0]->nim }}"
                                                        id="alumni_nim" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Email*</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Masukkan Email...." value="{{ $alumni[0]->email }}"
                                                        id="alumni_email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Jenis Kelamin*</label>
                                                    <select name="jenis_kelamin" class="form-control" required>
                                                        <option value="">- Pilih Jenis Kelamin -</option>
                                                        <option value="laki-laki" <?php echo 'laki-laki' == $alumni[0]->jenis_kelamin ? 'selected' : ' '; ?>>Laki-Laki</option>
                                                        <option value="perempuan" <?php echo 'perempuan' == $alumni[0]->jenis_kelamin ? 'selected' : ' '; ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Angkatan*</label>
                                                    <input type="number" name="angkatan" class="form-control"
                                                        placeholder="Masukkan Angkatan...."
                                                        value="{{ $alumni[0]->angkatan }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Agama*</label>
                                                    <input type="text" name="agama" class="form-control"
                                                        placeholder="Masukkan Agama...." value="{{ $alumni[0]->agama }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Program Studi*</label>
                                                    <input type="text" name="program_studi" class="form-control"
                                                        placeholder="Masukkan Program Studi..."
                                                        value="{{ $alumni[0]->program_studi }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Tempat Lahir*</label>
                                                    <input type="text" name="tempat_lahir" class="form-control"
                                                        placeholder="Masukkan Tempat Lahir..."
                                                        value="{{ $alumni[0]->tempat_lahir }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Tanggal Lahir*</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control"
                                                        value="{{ $alumni[0]->tanggal_lahir }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Alamat*</label>
                                                    <input type="text" name="alamat" class="form-control"
                                                        placeholder="Masukkan Alamat..." value="{{ $alumni[0]->alamat }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Nomor Telepon*</label>
                                                    <input type="tel" name="no_telp" class="form-control"
                                                        placeholder="MAsukkaan Nomor Telepon..."
                                                        value="{{ $alumni[0]->no_telp }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Tahun Masuk*</label>
                                                    <input type="number" name="tahun_masuk" class="form-control"
                                                        placeholder="Masukkan Tahun Masuk..."
                                                        value="{{ $alumni[0]->tahun_masuk }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Tahun Lulus*</label>
                                                    <input type="number" name="tahun_lulus" class="form-control"
                                                        placeholder="Masukan Tahun Lulus..."
                                                        value="{{ $alumni[0]->tahun_lulus }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">IPK*</label>
                                                    <input type="number" name="ipk" class="form-control"
                                                        placeholder="Masukkan IPK..." value="{{ $alumni[0]->ipk }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Pekerjaan*</label>
                                                    <input type="text" name="pekerjaan" class="form-control"
                                                        placeholder="Masukkan Pekerjaan..."
                                                        value="{{ $alumni[0]->pekerjaan }}" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Awal Bekerja*</label>
                                                    <input type="date" name="awal_bekerja"
                                                        value="{{ $alumni[0]->awal_bekerja }}" class="form-control"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Domisili Tempat
                                                        Kerja*</label>
                                                    <input type="text" name="domisili_tempat_kerja"
                                                        class="form-control" placeholder="MAsukkan Tempat Kerja..."
                                                        value="{{ $alumni[0]->domisili_tempat_kerja }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Foto*</label>
                                                    @if ($alumni[0]->foto)
                                                        <img id="image-preview"
                                                            src="{{ url('images/' . $alumni[0]->foto) }}"
                                                            alt="Preview Gambar" style="max-width: 400px;">
                                                        <span id="image-name">{{ $alumni[0]->foto }}</span>
                                                    @else
                                                        <img id="image-preview"
                                                            src="{{ asset('assets/images/notFoundPicture.png') }}"
                                                            alt="Preview Gambar" style="max-width: 400px;">
                                                    @endif
                                                    <input type="file" name="foto" class="form-control-file">
                                                </div>
                                            </div>



                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger light" href="/alumni">Close</a>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('foto');
            const imagePreview = document.getElementById('image-preview');
            const imageName = document.getElementById('image-name');
            const imageUploads = document.getElementById('image-uploads'); // Ambil elemen dengan ID "image-uploads"

            imageInput.addEventListener('change', function() {
                const file = this.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                    imageName.textContent = file.name;
                    imageName.style.display = 'block';

                    // Sembunyikan elemen "image-uploads"
                    imageUploads.style.display = 'none';
                } else {
                    imagePreview.style.display = 'none';
                    imageName.style.display = 'none';

                    // Tampilkan kembali elemen "image-uploads" jika tidak ada gambar yang dipilih
                    imageUploads.style.display = 'block';
                }
            });
        });
    </script>

@endsection
{{-- @endsection --}}
