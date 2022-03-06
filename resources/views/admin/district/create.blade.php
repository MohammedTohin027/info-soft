@extends('layouts.admin-layout')

@section('title')
    Address Management | District
@endsection

@section('dashboard-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage District</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">District</li>
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
                                    @if (@$editData)
                                        Edit District
                                    @else
                                        Add District
                                    @endif

                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="btn btn-success btn-sm" href="{{ route('district.view') }}"> <i
                                                    class="fa fa-list"></i> District List</a>
                                        </li>

                                    </ul>
                                </div>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <form
                                    action="{{ @$editData ? route('district.update', $editData->id) : route('district.store') }}"
                                    method="POST" role="form" id="myForm">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="division_id">Division Name</label>
                                            <select id="division_id" class="form-control form-control-sm select2"
                                                name="division_id">
                                                <option value="">Select Division</option>
                                                @foreach ($divisions as $value)
                                                    <option value="{{ $value->id }}" {{ @$editData->division_id == $value->id ? 'selected' : '' }}>
                                                        {{ $value->name_en . ' - ' . $value->name_bn }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name_en">District Name En</label>
                                            <input id="name_en"
                                                class="form-control form-control-sm @error('name_en') is-invalid @enderror"
                                                type="text" name="name_en"
                                                value="{{ @$editData ? $editData->name_en : old('name_en') }}"
                                                placeholder="Name En">
                                            @error('name_en')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name_bn">District Name Bn</label>
                                            <input id="name_bn"
                                                class="form-control form-control-sm @error('name_bn') is-invalid @enderror"
                                                type="text" name="name_bn"
                                                value="{{ @$editData ? $editData->name_bn : old('name_bn') }}"
                                                placeholder="Name Bn">
                                            @error('name_bn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button type="submit"
                                                class="btn btn-sm btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
                                        </div>
                                    </div>
                                </form>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    division_id: {
                        required: true,
                    },
                    name_en: {
                        required: true,
                    },
                    name_bn: {
                        required: true,
                    },
                },
                messages: {

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>

@endsection
