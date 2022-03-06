@extends('layouts.admin-layout')

@section('title')
    Address Management | Ward No
@endsection

@section('dashboard-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Ward No</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Ward No</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight:bold">
                                    Ward No List
                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a href="{{ route('ward-no.create') }}" class="btn btn-success btn-sm"> <i
                                                    class="fa fa-plus-circle"></i> Add New</a>
                                        </li>

                                    </ul>
                                </div>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <table id="example1" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Division</th>
                                            <th>District</th>
                                            <th>Upazila</th>
                                            <th>Union</th>
                                            <th>Name En</th>
                                            <th>Name Bn</th>
                                            <th>Status</th>
                                            <th width = 12% >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allData as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $item->division->name_en }}</td>
                                                <td>{{ $item->district->name_en }}</td>
                                                <td>{{ $item->upazila->name_en }}</td>
                                                <td>{{ $item->union->name_en }}</td>
                                                <td>{{ $item->name_en }}</td>
                                                <td>{{ $item->name_bn }}</td>
                                                <td>
                                                    @if($item->status == 0)
                                                        <span class="badge badge-pill badge-success">active</span>
                                                    @else
                                                        <span class="badge badge-pill badge-danger">inactive</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->status == 0)
                                                        <a href="{{ route('ward-no.inactive', $item->id) }}"
                                                            class="btn btn-success btn-sm" title="Inactive Now"><i
                                                                class="fa fa-arrow-down"></i></i></a>
                                                    @else
                                                        <a href="{{ route('ward-no.active', $item->id) }}"
                                                            class="btn btn-warning btn-sm" title="Active Now"><i
                                                                class="fa fa-arrow-up"></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('ward-no.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="{{ route('ward-no.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm" id="delete" title="Delete"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->

                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
