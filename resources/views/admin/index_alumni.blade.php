@extends('master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Alumni</h4>
                <a href="/tambah" type="button" class="btn btn-rounded btn-info"><span class="btn-icon-start text-info"><i
                            class="fa fa-plus color-info"></i>
                    </span>Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>No.</strong></th>
                                <th><strong>NAME</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>Date</strong></th>
                                <th><strong>Status</strong></th>
                                <th><strong></strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td><strong>542</strong></td>
                                <td>
                                    <div class="d-flex align-items-center"><img src="images/avatar/1.jpg"
                                            class="rounded-lg me-2" width="24" alt=""> <span
                                            class="w-space-no">Dr. Jackson</span></div>
                                </td>
                                <td>example@example.com </td>
                                <td>01 August 2020</td>
                                <td>
                                    <div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i>
                                        Successful</div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                class="fas fa-pencil-alt"></i></a>
                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i
                                                class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
