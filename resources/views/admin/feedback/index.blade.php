@extends('master')
@section('title', 'Data Feedback')
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
                <li class="breadcrumb-item"><a href="/alumni">Data Feedback</a></li>
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
                                        {{-- <a href="#" type="button" class="btn btn-rounded btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#modalCreate"><span
                                                class="btn-icon-start text-primary"><i class="fa fa-plus color-info"></i>
                                            </span>Add</a>

                                        <a id="modalExtract" href="#" class="btn btn-rounded btn-warning"
                                            data-bs-toggle="modal" data-bs-target="#extractModal"><span
                                                class="btn-icon-start text-warning"><i class="fa fa-file-pdf"></i>
                                            </span>Extract PDF</a>
                                        </a> --}}

                                    </div>
                                </div>
                                <div class="right-section">
                                    <div id="example3_filter" class="dataTables_filter">
                                        <form action="/feedback/search" method="GET">
                                            <label><b>Search:</b></label>
                                            <input type="search" name="keyword" id="searchInput"
                                                placeholder="Cari data feedback..." aria-controls="example3">
                                        </form>

                                    </div>

                                </div>
                            </div>


                            <table id="example2" class="display dataTable no-footer" style="min-width: 100%" role="grid"
                                aria-describedby="example3_info">
                                <thead>
                                    <tr role="row">

                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 50px;">No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 50px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Department: activate to sort column ascending"
                                            style="width: 50px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Education: activate to sort column ascending"
                                            style="width: 50px;">Subjek</th>
                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Mobile: activate to sort column ascending"
                                            style="width: 90px;">Pesan</th>

                                        <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 56.0312px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp

                                    @foreach ($feedback as $datas)
                                        <tr role="row" class="odd">


                                            <td>{{ $no++ }}</td>
                                            <td>{{ $datas->name }}</td>
                                            <td>{{ $datas->email }}</td>
                                            <td>{{ $datas->subject }}</td>
                                            <td>{{ $datas->message }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a id="feedbackModal" href="#" data-id="{{ $datas->id }}"
                                                        data-url="/feedback/show/{{ $datas->id }}"
                                                        class="btn btn-success shadow btn-xs sharp me-1"
                                                        data-bs-toggle="modal" data-bs-target="#feedbackShow"><i
                                                            class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="/feedback/hapus/{{ $datas->id }}"
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
                                    {{ $feedback->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('admin.alumni.modal') --}}
    @include('admin.feedback.show')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

@endsection
