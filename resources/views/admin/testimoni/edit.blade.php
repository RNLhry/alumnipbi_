@extends('master')
@section('title', 'Edit Testimoni Mahasiswa Alumni')
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

        <form action="/testimoni/update" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $testimoni[0]->id }}">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">

                        <div class="card-body">
                            <div id="smartwizard" class="form-wizard order-create sw sw-theme-default sw-justified">

                                <div class="tab-content" style="">
                                    <div id="wizard_Service" class="tab-pane" role="tabpanel" style="display: block;">
                                        <div class="row">
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Nama Lengkap*</label>
                                                    <select name="alumni_id" class="form-control" readonly>
                                                        <option value="{{ $testimoni[0]->alumni_id }}">
                                                            {{ $testimoni[0]->alumni->nama }}</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-lg-8 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Testimoni*</label>
                                                    <textarea name="testimoniy" id="inputTestimoni" class="textarea_editor form-control bg-transparent" rows="15"
                                                        placeholder="Enter text ...">{{ $testimoni[0]->testimoniy }}</textarea>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-6 mb-2">
                                                <div class="mb-3">
                                                    <label class="text-label form-label">Foto*</label>
                                                    <input type="file" name="foto" class="form-control-file"
                                                        value="{{ $testimoni[0]->alumni->foto }}" readonly>
                                                    @if ($testimoni[0]->alumni->foto)
                                                        <img id="image-preview"
                                                            src="{{ url('images/' . $testimoni[0]->alumni->foto) }}"
                                                            alt="Preview Gambar" style="max-width: 400px;">
                                                        <span id="image-name">{{ $testimoni[0]->alumni->foto }}</span>
                                                    @else
                                                        <img id="image-preview"
                                                            src="{{ asset('assets/images/notFoundPicture.png') }}"
                                                            alt="Preview Gambar" style="max-width: 400px;">
                                                    @endif
                                                </div>
                                            </div> --}}


                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-danger light" href="/testimoni">Close</a>
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
