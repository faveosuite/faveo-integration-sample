@include('includes.spinner')
<div class="content-wrapper px-4 py-2">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">API Info</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('apiList') }}">Integration Apis</a></li>
                        <li class="breadcrumb-item active">API Info</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-light">
                    <div class="card-header">
                        <h3 class="card-title">{{ $name }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-1">
                                    <span class="badge badge-primary">{{ $method }}</span>
                                </div>
                                <div class="col-11">
                                    <div class="text-muted" >{{  \App\Models\Setting::where('id',1)->value('license_manager_url') }}</div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label class="form-label">Request URL</label>
                                    <div class="form-control-plaintext" id="endpoint">{{ $endpoint }}</div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="form-label">Description</label>
                                    <div class="form-control-plaintext">{{ $description }}</div>
                                </div>
                            </div>
                            @if(!empty($parameters))
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="form-label">Parameters</label>
                                    <table class="table table-bordered bg-light">
                                        <thead>
                                        <tr>
                                            <th>Parameter</th>
                                            <th>Type</th>
                                            <th>Optional/Required</th>
                                            <th>Description</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(json_decode($parameters, true) as $parameter)
                                        <tr>
                                            <td><code>{{ $parameter['param'] }}</code></td>
                                            <td>{{ $parameter['type'] }}</td>
                                            <td>{{ $parameter['opt_or_req'] }}</td>
                                            <td>{{ $parameter['description'] }}</td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="row mt-1">
                                        <label class="form-label mr-auto">Example Parameters</label>
                                        <button class="btn btn-primary btn-sm ml-2 mb-3 mr-2" id="generate">
                                            Generate Parameters
                                        </button>
                                    </div>

                                    <form id="parametersForm">
                                        <table class="table table-bordered bg-light">
                                            <thead>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Values</th>
                                            </tr>
                                            </thead>
                                            <tbody id="parameter-table-body">
                                            @foreach(json_decode($parameters, true) as $parameter)
                                                <tr>
                                                    <td>{{ $parameter['param'] }}</td>
                                                    @if($parameter['param'] == 'product_id' || $parameter['param'] == 'client_email' || $parameter['param'] == 'license_code' || $parameter['param'] == 'product_key' || $parameter['param'] == 'version_number' || $parameter['param'] == 'user_local_path' || $parameter['param'] == 'query_type' || $parameter['param'] == 'file_type' )
                                                        <td>
                                                            <input class="input-group border-transparent" type="text" id="{{ $parameter['param'] }}" name="{{ $parameter['param'] }}" value="{{ $parameter['values'] }}">
                                                        </td>
                                                    @else
                                                        <td>
                                                            <p class="container-fluid" id="{{ $parameter['param'] }}"></p>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            @endif
                            <div class="row mt-3">
                                <div class="col">
                                    <label class="form-label">Response</label>
                                    <div class="language-html max-height-300 highlighter-rouge">
                                        <div class="highlight">
                    <pre class="highlight">
<code>
<div id="responseDiv"> </div>
                        </code>
                    </pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary mr-2" onclick="submit({{ json_encode($method) }}, {{ json_encode($parameters) }})" >
                        <i class="fa-solid fa-play pr-1"></i> Run request
                        </button>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<script>
    document.getElementById('generate').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        generate();
    });

    function submit(method, parameter) {
        let data = parameter !== null ? getFormData() : null;

        if (parameter !== null) {
            fetchData('/hashGenerator', data)
                .then(responseData => {
                    data['installation_hash'] = responseData.installation_hash;
                    data['license_signature'] = responseData.license_signature;
                    data['root_url'] = responseData.root_url;
                    data['connection_hash'] = responseData.connection_hash;
                    data['script_signature'] = responseData.script_signature;
                    postRequest(method, data);
                })
                .catch(error => {
                    console.error('There was an error!', error);
                });
        } else {
            postRequest(method, data);
        }
    }
    function updateElement(id, value) {
        const element = document.getElementById(id);
        if (element) {
            element.innerHTML = value;
        }
    }
    function generate() {
        let data = getFormData();
        fetchData('/hashGenerator', data)
            .then(data => {
                updateElement('connection_hash', data.connection_hash);
                updateElement('installation_hash', data.installation_hash);
                updateElement('license_signature', data.license_signature);
                updateElement('root_url', data.root_url);
                updateElement('script_signature', data.script_signature);

            })
            .catch(error => {
                console.error('There was an error!', error);
            });
    }

    function getFormData() {
        const form = document.getElementById('parametersForm');
        const formData = new FormData(form);
        let data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });
        return data;
    }

    function fetchData(url, data) {
        showSpinner();
        return fetch(getApiUrl(url), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(responseData => {
                hideSpinner(); // Hide loader once data is received
                return responseData.data;
            })
            .catch(error => {
                hideSpinner(); // Hide loader in case of error
                console.error('There was an error!', error);
            });
    }

    function postRequest(method, data) {
        showSpinner()
        const postData = {
            method: method,
            post: data,
            endpoint: document.getElementById('endpoint').innerText // Ensure $endpoint is JSON encoded
        };

        fetch(getApiUrl('/sendRequest'), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(postData)
        })
            .then(response => response.json())
            .then(data => {
                hideSpinner(); 
                const formattedJson = JSON.stringify(data.message, null, 2);
                const responseDiv = document.getElementById('responseDiv');
                responseDiv.innerHTML = `<pre>${escapeHtml(formattedJson)}</pre>`;
            })
            .catch(error => {
                hideSpinner();
                console.error('There was an error!', error);
            });
    }

    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, m => map[m]);
    }
</script>


