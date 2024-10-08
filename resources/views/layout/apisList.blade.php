@extends('welcome')

@section('content')
    <div class="content-wrapper  px-4 py-2">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Integration APIs</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Integration APIs</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="alert-container" id="alert" style="display: none;">
                    <div class="alert alert-success">
                        <button type="button" class="close" id="alert_close">×</button>
                        <div id="alert-message">
                            <i class="fa fa-check-circle alert-icon"></i>&nbsp; <span></span>
                        </div>
                    </div>
                </div>
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">API Settings</h3>
                        <!-- Example usage in a Blade view -->
                        <x-tooltip
                            placement="top"
                            message="Configure the settings to connect to the License Manager."
                            size="16px"
                        />

                    </div>
                    <div class="card-body">
                        <div class="protocol protocol-settings">
                            <div class="row">
                                <div class="col-sm-6 form-group form-field-template">
                                    <label for="api-url">License Manager URL</label>
                                    <input type="url" class="form-control" name="license_manager_url"
                                           placeholder="Enter URL" id="license_manager_url" pattern="https?://.+"
                                           required>
                                    <span id="license-error" class="error invalid-feedback"></span>
                                </div>
                                <!---->
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary mr-2 toastrDefaultSuccess" id="save_button"><i
                                class="fas fa-save"></i> Save
                        </button>
                    </div>
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
                                <div class="col-sm-4 d-flex align-items-stretch">
                                    <div class="card report-body bg-light flex-fill">
                                        <div class="card-header text-muted border-bottom-0 pb-0 row">
                                            <div class="card-title col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-11 p-0">
                                                        <div class="fa-stack fa-1x resize-icon"><i
                                                                class="fa-solid fa-gear"></i></div>
                                                        <a href="{{ url('apis/'.$api['id']) }}"
                                                           class="text-header"><b>{{ $api['name'] }}</b></a>
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

    <style>
        .report-modify {
            position: relative;
            left: 68px;
        }

        .text-header {
            vertical-align: -6px;
            font-size: 15px;
        }

        .text-header:hover {
            color: #3c8dbc;
            cursor: pointer;
        }

        .resize-icon {
            width: 38px !important;
            font-size: 25px !important;
        }


        .custom-dropdown-menu {
            position: absolute;
            top: -5px !important;
            left: 0px;
            will-change: transform;
        }

        .badge-style {
            padding-left: 3px;
            vertical-align: -5px;
        }

        .ml-6 {
            margin-left: 6px;
        }

        .fw-500 {
            font-weight: 500 !important;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            function fetchSettings() {
                sendGetRequest(getApiUrl('/getSettings'))
                    .then(data => {
                        const inputElement = document.getElementById('license_manager_url');
                        inputElement.value = data.data.license_manager_url || ''; // Fallback to empty string
                    })
                    .catch(error => {
                        console.error('Error fetching data and setting input value:', error);
                    });
            }

            function checkUrlAndDisplayError() {
                const inputElement = document.getElementById('license_manager_url');
                const errorSpan = document.getElementById('license-error');
                const url = inputElement.value;

                if (!isUrlValid(url)) {
                    inputElement.classList.add('is-invalid');
                    errorSpan.textContent = 'Please enter a valid URL';
                    errorSpan.style.display = 'block';
                } else {
                    inputElement.classList.remove('is-invalid');
                    errorSpan.style.display = 'none';
                }
            }

            function saveSettings() {
                checkUrlAndDisplayError();

                const inputElement = document.getElementById('license_manager_url');
                const errorSpan = document.getElementById('license-error');
                const data = {license_manager_url: inputElement.value};

                if (inputElement.classList.contains('is-invalid')) {
                    return; // Prevent saving if URL is invalid
                }

                sendPostRequest(getApiUrl('/updateApiSetting'), data)
                    .then(responseData => {
                        // Set the message dynamically
                        $('#alert-message span').text(responseData.message); // Adjust according to your response structure

                        // Show the alert
                        $('#alert').show();

                        // Hide the alert after 3 seconds
                        setTimeout(function () {
                            $('#alert').fadeOut(); // You can use .hide() if you prefer
                        }, 3000);
                    })
                    .catch(error => {
                        inputElement.classList.add('is-invalid');
                        errorSpan.textContent = error.message.license_manager_url;
                        errorSpan.style.display = 'block';
                    });
            }

            document.getElementById('save_button').addEventListener('click', saveSettings);
            fetchSettings();
        });

    </script>
@endsection
