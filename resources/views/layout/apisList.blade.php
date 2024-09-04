@extends('welcome')

@section('content')
    <div class="content-wrapper  px-4 py-2">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Api List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Api List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">Api Settings</h3>
                        <span class="v-popper--has-tooltip" style="margin-left: 2px; position: relative; top: 0px; color: rgb(51, 122, 183);">
                            <i class="fas fa-question-circle" style="font-size: medium; cursor: help;"></i></span>
                        <div class="card-tools switch-pos">
                            <div class="btn-tool">
                                <div class="toggle-container toggle-switch" tabindex="0" aria-checked="true" role="switch">
                                    <input type="checkbox" id="toggle" name="toggle" value="true" style="display: none;">
                                    <div class="toggle toggle-on">
                                        <span class="toggle-handle toggle-handle-on"></span><span class="toggle-label">&nbsp;</span><!--v-if-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="protocol protocol-settings">
                            <div class="row">
                                <div class="col-sm-6 form-group form-field-template" >
                                    <label for="api-secret">Api Secret</label>
                                    <input type="text" class="form-control" name="api-secret" placeholder="Enter API Secret key">
                                </div>
                                <div class="col-sm-6 form-group form-field-template" >
                                    <label for="api-url">License Manager URL</label>
                                    <input type="text" class="form-control" name="api-url" placeholder="Enter URL">
                                </div>
                                <!---->
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"><button class="btn btn-primary mr-2"><i class="fas fa-save"></i> Save</button></div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-light">
                    <div class="card-header"><h3 class="card-title">Product to License</h3></div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($apis as $api)
                                <div class="col-sm-4">
                                    <div class="card report-body bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0 pb-0 row">
                                            <div class="card-title col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-11 p-0">
                                                        <div class="fa-stack fa-1x resize-icon"><i class="fa-solid fa-gear"></i></div>
                                                        <a href="{{ url('apis/'.$api['id']) }}" class="text-header"><b data-v-87812038="">{{ $api['name'] }}</b></a>
                                                    </div>
                                                    <div class="col-sm-1 p-0">
                                                        <div class="card-tools float-right">
                                                            <div class="btn-group">
                                            <span data-v-87812038="">
                                                <!---->
                                                <div class="dropdown-menu dropdown-menu-right custom-dropdown-menu">
                                                    <a class="dropdown-item text-dark" href="javascript:;"><i class="fas fa-edit"></i>&nbsp;Edit</a>
                                                    <a class="dropdown-item text-dark" href="javascript:;"><i class="fas fa-trash"></i>&nbsp;Delete</a>
                                                </div>
                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body pt-1">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <p class="text-muted text-sm">{{ $api['description'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <style >
        .report-modify {
            position: relative;
            left: 68px;
        }

        .text-header{
            vertical-align: -6px;
            font-size: 15px;
        }

        .text-header:hover{
            color: #3c8dbc;
            cursor: pointer;
        }

        .resize-icon{
            width: 38px !important;
            font-size: 25px !important;
        }

        .report-body{
            min-height: 150px !important;
        }

        @media (max-width: 900px) {
            .report-body {
                min-height: 270px !important; /* Adjust minimum height for screens up to 900px */
            }
        }

        @media (max-width: 600px) {
            .report-body {
                min-height: 100px !important; /* Adjust minimum height for screens between 700px and 900px */
            }
        }

        @media (max-width: 500px) {
            .report-body {
                min-height: 100px !important; /* Adjust minimum height for screens between 700px and 900px */
            }
        }

        .custom-dropdown-menu{
            position: absolute;
            top: -5px !important;
            left: 0px;
            will-change: transform;
        }

        .badge-style{
            padding-left: 3px;
            vertical-align: -5px;
        }

        .ml-6 { margin-left: 6px; }

        .fw-500 { font-weight: 500 !important; }
    </style>
@endsection
