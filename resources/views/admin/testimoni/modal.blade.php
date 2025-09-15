<form action="/testimoni/store" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"><b>Membuat Testimoni Mahasiswa</b></h3>
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
                                                            <label class="text-label form-label">Pilih Nama
                                                                Mahasiswa</label>
                                                            <div class="input-group mb-3">
                                                                <select id="selectMahasiswa" name="alumni_id"
                                                                    class="form-control">
                                                                    <option value="">Pilih Mahasiswa</option>
                                                                    @foreach ($alumnis as $d)
                                                                        <option value="{{ $d->id }}">
                                                                            {{ $d->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">NIM</label>
                                                            <input id="inputNIM" type="text" class="form-control"
                                                                readonly>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 mb-2">
                                                        <div class="mb-3">
                                                            <label class="text-label form-label">Alamat</label>
                                                            <input id="inputAlamat" type="text" class="form-control"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 mb-2">
                                                        <div class="">
                                                            <label class="text-label form-label">Testimoni
                                                                Alumni</label>
                                                            <textarea name="testimoniy" id="inputTestimoni" class="textarea_editor form-control bg-transparent" rows="15"
                                                                placeholder="Enter text ..."></textarea>
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
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#selectMahasiswa').change(function() {
                var mahasiswaId = $(this).val();

                if (mahasiswaId) {
                    $.ajax({
                        url: '/getMahasiswaDetail/' + mahasiswaId,
                        type: 'GET',
                        success: function(response) {
                            $('#inputNIM').val(response.nim);
                            $('#inputAlamat').val(response.alamat);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    $('#inputNIM').val('');
                    $('#inputAlamat').val('');
                }
            });
        });
    </script>
@endpush
