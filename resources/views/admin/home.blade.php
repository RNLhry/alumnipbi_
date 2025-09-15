@extends('master')
@section('content')
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-6">
                                            <h2>Manage your Alumni Data</h2>
                                            <span>Klik tombol kelola alumni untuk dapat langsung melihat data almuni
                                                anda.
                                            </span>
                                            <a href="/alumni" class="btn btn-rounded  fs-18 font-w500">Kelola Alumni</a>
                                        </div>
                                        <div class="col-xl-5 col-sm-6">
                                            <img src="{{ asset('assets/images/chart.png') }}" alt=""
                                                class="sd-shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0 flex-wrap">
                                        <h4 class="fs-20 font-w700 mb-2">Project Statistics</h4>
                                        <div class="d-flex align-items-center project-tab mb-2">
                                            <div class="card-tabs mt-3 mt-sm-0 mb-3 ">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" href="#monthly"
                                                            role="tab">Monthly</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#Weekly"
                                                            role="tab">Weekly</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab" href="#Today"
                                                            role="tab">Today</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown ms-2">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="12.4999" cy="3.5" r="2.5" fill="#A5A5A5">
                                                        </circle>
                                                        <circle cx="12.4999" cy="11.5" r="2.5" fill="#A5A5A5">
                                                        </circle>
                                                        <circle cx="12.4999" cy="19.5" r="2.5" fill="#A5A5A5">
                                                        </circle>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex">
                                                <div class="d-inline-block position-relative donut-chart-sale mb-3">
                                                    <span class="donut1"
                                                        data-peity='{ "fill": ["rgba(136,108,192,1)", "rgba(241, 234, 255, 1)"],   "innerRadius": 20, "radius": 15}'>5/8</span>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="fs-24 font-w700 ">246</h4>
                                                    <span class="fs-16 font-w400 d-block">Total
                                                        Projects</span>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex me-5">
                                                    <div class="mt-2">
                                                        <svg width="13" height="13" viewbox="0 0 13 13"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6.5" cy="6.5" r="6.5" fill="#FFCF6D">
                                                            </circle>
                                                        </svg>
                                                    </div>
                                                    <div class="ms-3">
                                                        <h4 class="fs-24 font-w700 ">246</h4>
                                                        <span class="fs-16 font-w400 d-block">On Going</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <svg width="13" height="13" viewbox="0 0 13 13"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="6.5" cy="6.5" r="6.5" fill="#FFA7D7">
                                                            </circle>
                                                        </svg>

                                                    </div>
                                                    <div class="ms-3">
                                                        <h4 class="fs-24 font-w700 ">28</h4>
                                                        <span class="fs-16 font-w400 d-block">Unfinished</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane fade active show" id="monthly">
                                                <div id="chartBar" class="chartBar"></div>
                                            </div>
                                            <div class="tab-pane fade" id="Weekly">
                                                <div id="chartBar1" class="chartBar"></div>
                                            </div>
                                            <div class="tab-pane fade" id="Today">
                                                <div id="chartBar2" class="chartBar"></div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <label class="form-check-label font-w400 fs-16 mb-0"
                                                for="flexSwitchCheckChecked1">Number</label>
                                            <div class="form-check form-switch toggle-switch">
                                                <input class="form-check-input custome" type="checkbox"
                                                    id="flexSwitchCheckChecked1" checked="">

                                            </div>
                                            <label class="form-check-label font-w400 fs-16 mb-0 ms-3"
                                                for="flexSwitchCheckChecked2">Analytics</label>
                                            <div class="form-check form-switch toggle-switch">
                                                <input class="form-check-input custome" type="checkbox"
                                                    id="flexSwitchCheckChecked2" checked="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                                <div>
                                                    <h4 class="fs-18 font-w600 mb-4 text-nowrap">Total Alumni
                                                    </h4>
                                                    <div class="d-flex align-items-center">
                                                        <h2 class="fs-32 font-w700 mb-0">{{ $totalAlumni }}</h2>
                                                        <span class="d-block ms-4">
                                                            <svg width="21" height="11" viewbox="0 0 21 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1.49217 11C0.590508 11 0.149368 9.9006 0.800944 9.27736L9.80878 0.66117C10.1954 0.29136 10.8046 0.291359 11.1912 0.661169L20.1991 9.27736C20.8506 9.9006 20.4095 11 19.5078 11H1.49217Z" fill="#09BD3C"></path>
                                                            </svg>
                                                            <small class="d-block fs-16 font-w400 text-success">+{{ number_format($persentaseKenaikan, 1) }}%</small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div id="columnChart"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body px-4 pb-0">
                                                <h4 class="fs-18 font-w600 mb-5 text-nowrap">Total Clients
                                                </h4>
                                                <div class="progress default-progress">
                                                    <div class="progress-bar bg-gradient1 progress-animated"
                                                        style="width: 40%; height:10px;" role="progressbar">
                                                        <span class="sr-only">45% Complete</span>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                    <span>76 left from target</span>
                                                    <h4 class="mb-0">42</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">
                                                        <h2 class="fs-32 font-w700">562</h2>
                                                        <span class="fs-18 font-w500 d-block">Total
                                                            Clients</span>
                                                        <span class="d-block fs-16 font-w400"><small
                                                                class="text-danger">-2%</small> than last
                                                            month</span>
                                                    </div>
                                                </div>
                                                <div id="NewCustomers"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">
                                                        <h2 class="fs-32 font-w700">892</h2>
                                                        <span class="fs-18 font-w500 d-block">New
                                                            Projects</span>
                                                        <span class="d-block fs-16 font-w400"><small
                                                                class="text-success">-2%</small> than last
                                                            month</span>
                                                    </div>
                                                </div>
                                                <div id="NewCustomers1"></div>
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
    </div>
    </div>
@endsection
