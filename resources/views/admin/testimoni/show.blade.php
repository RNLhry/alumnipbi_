<div class="modal fade" id="modalTesti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Detail Testimoni Alumni</h5>
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
                        <p><strong>NIM:</strong> <span id="user-nim"></span></p>
                        <p><strong>Jenis Kelamin:</strong> <span id="user-jenis_kelamin"></span></p>
                        <p><strong>Testimoni:</strong> <span id="al-testimonis"></span></p>

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
{{-- <div class="modal fade" id="extractModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                                    <select name="angkatan" class="default-select form-control wide mb-3"
                                        style="display: none;">
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
</div> --}}

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            /* When click show user */
            $('body').on('click', '#modalTestimoni', function() {
                var userURL = $(this).data('url');
                $.get(userURL, function(data) {
                    console.log(data);
                    $('#modalTesti').modal('show');

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
                    $('#user-nim').text(data.nim);
                    $('#user-jenis_kelamin').text(data.jenis_kelamin);
                    $('#al-testimoniy').text(data.testimoniy);
                })
            });
        });
    </script>
@endpush
