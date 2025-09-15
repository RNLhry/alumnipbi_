<form action="/alumnistore" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><b>Tambah Data Mahasiswa Alumni</b></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12 col-xxl-12">
                            <div class="card">

                                <div class="card-body">
                                    <div id="smartwizard"
                                        class="form-wizard order-create sw sw-theme-default sw-justified">

                                        <div class="tab-content" style="">
                                            <div id="wizard_Service" class="tab-pane" role="tabpanel"
                                                style="display: block;">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Nama Lengkap*</label>
                                                            <input type="text" name="nama" class="form-control"
                                                                placeholder="Nama Lengkap" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">NIM*</label>
                                                            <input type="number" name="nim" class="form-control"
                                                                placeholder="Nomor Induk Mahasiswa" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Email*</label>
                                                            <input type="email" name="email" class="form-control"
                                                                placeholder="Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Jenis Kelamin*</label>
                                                            <select name="jenis_kelamin" class="form-control" required>
                                                                <option value="">Pilih Jenis Kelamin</option>
                                                                <option value="laki-laki">Laki-laki</option>
                                                                <option value="perempuan">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Angkatan*</label>
                                                            <input type="number" name="angkatan" class="form-control"
                                                                placeholder="Angkatan" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Agama*</label>
                                                            <input type="text" name="agama" class="form-control"
                                                                placeholder="Agama" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Program Studi*</label>
                                                            <input type="text" name="program_studi"
                                                                class="form-control" placeholder="Program Studi"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Tempat Lahir*</label>
                                                            <input type="text" name="tempat_lahir"
                                                                class="form-control" placeholder="Tempat Lahir"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Tanggal Lahir*</label>
                                                            <input type="date" name="tanggal_lahir"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Alamat*</label>
                                                            <input type="text" name="alamat" class="form-control"
                                                                placeholder="Alamat" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Nomor Telepon*</label>
                                                            <input type="tel" name="no_telp" class="form-control"
                                                                placeholder="Nomor Telepon" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Tahun Masuk*</label>
                                                            <input type="number" name="tahun_masuk"
                                                                class="form-control" placeholder="Tahun Masuk"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Tahun Lulus*</label>
                                                            <input type="number" name="tahun_lulus"
                                                                class="form-control" placeholder="Tahun Lulus"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">IPK*</label>
                                                            <input type="text" name="ipk" class="form-control"
                                                                placeholder="IPK" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Pekerjaan*</label>
                                                            <input type="text" name="pekerjaan"
                                                                class="form-control" placeholder="Pekerjaan" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Awal Bekerja*</label>
                                                            <input type="date" name="awal_bekerja"
                                                                class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Domisili Tempat
                                                                Kerja*</label>
                                                            <input type="text" name="domisili_tempat_kerja"
                                                                class="form-control"
                                                                placeholder="Domisili Tempat Kerja" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Foto*</label>
                                                            <input type="file" name="foto"
                                                                class="form-control-file" required>
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
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
