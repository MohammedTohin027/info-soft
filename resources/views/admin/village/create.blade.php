@extends('layouts.admin-layout')

@section('title')
    Address Management | Village
@endsection

@section('dashboard-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Village</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Village</li>
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
                                        Edit Village
                                    @else
                                        Add Village
                                    @endif

                                </h3>
                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <a class="btn btn-success btn-sm" href="{{ route('village.view') }}"> <i
                                                    class="fa fa-list"></i> Village List</a>
                                        </li>

                                    </ul>
                                </div>
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <form
                                    action="{{ @$editData ? route('village.update', $editData->id) : route('village.store') }}"
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
                                            <label for="district_id">District Name</label>
                                            <select id="district_id" class="form-control form-control-sm select2"
                                                name="district_id">
                                                <option value="">Select District</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="upazila_id">Upazila Name</label>
                                            <select id="upazila_id" class="form-control form-control-sm select2"
                                                name="upazila_id">
                                                <option value="">Select Upazila</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="union_id">Union Name</label>
                                            <select id="union_id" class="form-control form-control-sm select2"
                                                name="union_id">
                                                <option value="">Select Union</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="ward_no_id">Ward No</label>
                                            <select id="ward_no_id" class="form-control form-control-sm select2"
                                                name="ward_no_id">
                                                <option value="">Select Ward No</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="name_en">Village En</label>
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
                                            <label for="name_bn">Village Bn</label>
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

                                        <div class="form-group col-md-2" style="padding-top:31px;">
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

    <script>
        $(function(){
            $(document).on('change','#division_id', function(){
                var division_id = $(this).val();
                $.ajax({
                    type:"GET",
                    url:"{{ route('default.get-district') }}",
                    data:{division_id:division_id},
                    success:function(data){
                        var html = '<option value="">Select District</option>';
                        $.each(data, function(key, v){
                            html += '<option value="'+v.id+'">'+v.name_en +' - '+ v.name_bn+'</option>';
                        });
                        $('#district_id').html(html);
                        var district_id = "{{ @$editData->district_id }}";
                        if (district_id != '') {
                            $('#district_id').val(district_id).trigger('change');
                        }
                    }
                });
                // alert(division_id);
            });
        });
    </script>

    <script>
        $(document).on('change', '#district_id', function(){
            var district_id = $(this).val();
            $.ajax({
                type:"GET",
                url:"{{ route('default.get-upazila') }}",
                data:{district_id:district_id},
                success:function(data){
                    var html = '<option value="">Select Upazila</option>';
                    $.each(data, function(key, v){
                        html += '<option value="'+v.id+'">'+v.name_en +' - '+ v.name_bn+'</option>';
                    });
                    $('#upazila_id').html(html);
                    var upazila_id = "{{ @$editData->upazila_id }}";
                    if (upazila_id != '') {
                        $('#upazila_id').val(upazila_id).trigger('change');
                    }
                }
            });
            // alert(district_id);
        });
    </script>
    <script>
        $(document).on('change', '#upazila_id', function(){
            var upazila_id = $(this).val();
            $.ajax({
                type:"GET",
                url:"{{ route('default.get-union') }}",
                data:{upazila_id:upazila_id},
                success:function(data){
                    var html = '<option value="">Select Union</option>';
                    $.each(data, function(key, v){
                        html += '<option value="'+v.id+'">'+v.name_en +' - '+ v.name_bn+'</option>';
                    });
                    $('#union_id').html(html);
                    var union_id = "{{ @$editData->union_id }}";
                    if (union_id != '') {
                        $('#union_id').val(union_id).trigger('change');
                    }
                }
            });
            // alert(district_id);
        });
    </script>

    <script>
        $(document).on('change', '#union_id', function(){
            var union_id = $(this).val();
            $.ajax({
                type:"GET",
                url:"{{ route('default.get-ward-no') }}",
                data:{union_id:union_id},
                success:function(data){
                    var html = '<option value="">Select Ward No</option>';
                    $.each(data, function(key, v){
                        html += '<option value="'+v.id+'">'+v.name_en +' - '+ v.name_bn+'</option>';
                    });
                    $('#ward_no_id').html(html);
                    var ward_no_id = "{{ @$editData->ward_no_id }}";
                    if (ward_no_id != '') {
                        $('#ward_no_id').val(ward_no_id);
                    }
                }
            });
            // alert(union_id);
        });
    </script>

    <script>
        $(function(){
            var division_id = "{{ @$editData->division_id }}";
            if (division_id) {
                $('#division_id').val(division_id).trigger('change');
            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    division_id: {
                        required: true,
                    },
                    district_id: {
                        required: true,
                    },
                    upazila_id: {
                        required: true,
                    },
                    union_id: {
                        required: true,
                    },
                    ward_no_id: {
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
