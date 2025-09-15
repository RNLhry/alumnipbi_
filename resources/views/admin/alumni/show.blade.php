<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Detail Data Alumni</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img id="user-foto" alt="" class="img-fluid">
                        <h3 class="text-center"><span id="user-name"></span></h3>
                    </div>
                    <div class="col-md-8">
                        <p><strong>ID:</strong> <span id="user-id"></span></p>

                        <p><strong>Email:</strong> <span id="user-email"></span></p>
                        <p><strong>Jenis Kelamin:</strong> <span id="user-jenis_kelamin"></span></p>
                        <p><strong>Tempat, Tanggal Lahir:</strong> <span id="user-tempat_tanggal_lahir"></span></p>
                        <p><strong>Alamat:</strong> <span id="user-alamat"></span></p>
                        <p><strong>No. Telp:</strong> <span id="user-no_telp"></span></p>
                        <p><strong>Agama:</strong> <span id="user-agama"></span></p>
                        <p><strong>Program Studi:</strong> <span id="user-program_studi"></span></p>
                        <p><strong>Angkatan:</strong> <span id="user-angkatan"></span></p>
                        <p><strong>Tahun Masuk:</strong> <span id="user-tahun_masuk"></span></p>
                        <p><strong>Tahun Lulus:</strong> <span id="user-tahun_lulus"></span></p>
                        <p><strong>IPK:</strong> <span id="user-ipk"></span></p>
                        <p><strong>Pekerjaan:</strong> <span id="user-pekerjaan"></span></p>
                        <p><strong>Awal Bekerja:</strong> <span id="user-awal_bekerja"></span></p>
                        <p><strong>Domisili Tempat Kerja:</strong> <span id="user-domisili_tempat_kerja"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- ====================================MODAL PILIH EXTRACT===================================== --}}
<div class="modal fade" id="extractModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Extract Sesuai Angkatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('alumni.extractPDF') }}" method="GET"> <!-- Perubahan pada action form -->
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Pilih Angkatan</label>
                                <div class="col-sm-10">
                                    <select name="angkatan" class="form-control">
                                        <option value="">- Pilih Angkatan -</option>
                                        @foreach ($angkatan as $tahun)
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-file-pdf"></i> Extract
                        Alumni</button>
                    <!-- Perubahan pada button -->
                </div>
            </form>
        </div>
    </div>
</div>
