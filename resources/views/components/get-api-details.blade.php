<div class="content-wrapper">
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
                                    <div class="text-muted" >{{ $endpoint }}</div>
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
                                    <label class="form-label">Example Parameters</label>
                                    <form id="parametersForm">
                                        <table class="table table-bordered bg-light">
                                            <thead>
                                            <tr>
                                                <th>Parameter</th>
                                                <th>Values</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(json_decode($parameters, true) as $parameter)
                                                <tr>
                                                    <td>{{ $parameter['param'] }}</td>
                                                    <td>
                                                        <input type="text" id="{{ $parameter['param'] }}" name="{{ $parameter['param'] }}" value="{{ $parameter['values'] }}">
                                                    </td>
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
    function submit(method, parameter) {
        let data = {};

        if (parameter !== null) {
            // Get form data
            const form = document.getElementById('parametersForm');
            const formData = new FormData(form);

            // Convert FormData to an object
            formData.forEach((value, key) => {
                data[key] = value;
            });
        } else {
            data = null; // Set data to null if parameter is null
        }

        const post = data ? new URLSearchParams(data).toString() : '';
        console.log(post);

        const postData = {
            method: method,
            post: post,
            endpoint: document.getElementById('endpoint').innerText // Ensure $endpoint is JSON encoded
        };

        console.log(postData);

        fetch('/integration/public/sendRequest', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token if required by your backend
            },
            body: JSON.stringify(postData)
        })
            .then(response => response.json())
            .then(data => {
                const formattedJson = JSON.stringify(data, null, 2);
                const responseDiv = document.getElementById('responseDiv');
                responseDiv.innerHTML = `<pre>${escapeHtml(formattedJson)}</pre>`;
            })
            .catch(error => {
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


