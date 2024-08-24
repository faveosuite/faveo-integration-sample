@extends('welcome')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Configuration</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Configuration</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <blockquote class="quote-info mt-0">
                    <h5>Important!</h5>
                    <p>Always make sure product security key (AUS_PRODUCT_KEY) matches the key in Agora License Manager Script web module.</p>
                </blockquote>
                <p>All Agora License Manager Script settings for your application are stored in
                    <code>/SCRIPT/aus_core_configuration.php</code>
                    file (rename it from
                    <code>aus_core_configuration_sample.php</code>
                    to
                    <code>aus_core_configuration.php</code>
                    first). Since this file must be included in each application you want to automatically install and/or update, be sure to use a valid security key. When automatic configuration file generator at Extra Tools » Configuration Generator tab of Agora License Manager Script web module is used, correct security key is selected automatically. The copy of default configuration file is below:
                </p>
                <div class="language-html max-height-300 highlighter-rouge">
                    <div class="highlight">
                    <pre class="highlight">
                        <code>
&lt;?php
//MAIN CONFIG FILE OF Agora License Manager SCRIPT. CAN BE EDITED MANUALLY OR GENERATED USING Extra Tools > Configuration Generator TAB IN Agora License Manager SCRIPT DASHBOARD. THE FILE MUST BE INCLUDED IN YOUR SCRIPT BEFORE YOU PROVIDE IT TO USER.

//-----------<span class="nt">BASIC SETTINGS</span>-----------//

//The URL (without / at the end) where Agora License Manager Script from /WEB directory is installed on your server. No matter how many products you want to install and/or update, a single installation is enough.
<span class="nt">define</span>(<span class="s">"AUS_ROOT_URL"</span>, <span class="s">"https://www.demo.license.com/aus"</span>);

//Unique numeric ID of product that needs to be installed and/or updated. Can be obtained by going to Products > View Products tab in Agora License Manager Script dashboard and selecting product to be installed and/or updated. At the end of URL, you will see something like products_edit.php?product_id=NUMBER, where NUMBER is unique product ID. Cannot be modified after installing script.
<span class="nt">define</span>(<span class="s">"AUS_PRODUCT_ID"</span>, 1);

//Unique key of product that needs to be installed and/or updated. The key can be generated automatically or entered manually during product creation and can be obtained by going to Products > View Products tab in Agora License Manager Script dashboard and selecting product to be installed and/or updated. If key is modified via Agora License Manager Script dashboard, it must be updated in configuration file too.
<span class="nt">define</span>(<span class="s">"AUS_PRODUCT_KEY"</span>, <span class="s">"some_random_key"</span>);

//Connection timeout in seconds. If product can't connect to and/or receive data from updates server after this period, connection will be dropped. Rule of thumb: 1 second for each MB to download. For example, if ZIP archives with your products are 50 MB in size, set this value to 50. As most compressed products only contain several MB of data, the default value of 30 should be enough. Increasing connection timeout will also slightly increase server resources usage.
<span class="nt">define</span>(<span class="s">"AUS_CONNECTION_TIMEOUT"</span>, 30);

//Notification to be displayed when connection to server can't be established. Other notifications will be automatically fetched from server.
<span class="nt">define</span>(<span class="s">"AUS_NOTIFICATION_NO_CONNECTION"</span>, <span class="s">"Can't connect to updates server."</span>);

//Notification to be displayed when ZipArchive class is missing on user's machine.
<span class="nt">define</span>(<span class="s">"AUS_NOTIFICATION_ZIPARCHIVE_CLASS_MISSING"</span>, <span class="s">"ZipArchive class is missing on this server."</span>);

//Notification to be displayed when extracting downloaded ZIP archive fails.
<span class="nt">define</span>(<span class="s">"AUS_NOTIFICATION_ZIP_EXTRACT_ERROR"</span>, <span class="s">"Can't extract downloaded ZIP archive or write files."</span>);

//Notification to be displayed when removing downloaded ZIP archive fails.
<span class="nt">define</span>(<span class="s">"AUS_NOTIFICATION_ZIP_DELETE_ERROR"</span>, <span class="s">"Can't delete downloaded ZIP archive."</span>);

//-----------<span class="nt">ADVANCED SETTINGS</span>-----------//

//When option set to "YES", downloaded ZIP archive will be automatically deleted after extracting files.
<span class="nt">define</span>(<span class="s">"AUS_DELETE_EXTRACTED"</span>, <span class="s">"YES"</span>);

//-----------<span class="nt">NOTIFICATIONS FOR DEBUGGING PURPOSES ONLY. SHOULD NEVER BE DISPLAYED TO END USER</span>-----------//

<span class="nt">define</span>(<span class="s">"AUS_CORE_NOTIFICATION_INVALID_ROOT_URL"</span>, <span class="s">"Configuration error: invalid root URL of Agora License Manager Script installation"</span>);
<span class="nt">define</span>(<span class="s">"AUS_CORE_NOTIFICATION_INVALID_PRODUCT_ID"</span>, <span class="s">"Configuration error: invalid product ID"</span>);
<span class="nt">define</span>(<span class="s">"AUS_CORE_NOTIFICATION_INVALID_PRODUCT_KEY"</span>, <span class="s">"Configuration error: invalid product key"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_PERMISSIONS"</span>, <span class="s">"Configuration error: invalid root directory permissions"</span>);
<span class="nt">define</span>(<span class="s">"AUS_CORE_NOTIFICATION_INACCESSIBLE_ROOT_URL"</span>, <span class="s">"Server error: impossible to establish connection to your Agora License Manager Script installation"</span>);

//-----------<span class="nt">SOME EXTRA STUFF. SHOULD NEVER BE REMOVED OR MODIFIED</span>-----------//
<span class="nt">define</span>(<span class="s">"AUS_DIRECTORY"</span>, __DIR__);

                        </code>
                    </pre>
                    </div>
                </div>

<p>
    While each option is explained in configuration file itself, the table below contains extra notes on the most important ones. All settings marked by * are required, while other settings are optional.
</p>
                <table class="table table-bordered bg-light">
                    <thead>
                    <tr>
                        <th>Option</th>
                        <th>Description</th>
                        <th>Notes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td><code>AUS_ROOT_URL</code>*</td>
                        <td>The URL (without / at the end) where Agora License Manager Script from <code>/WEB</code> directory is installed on your server. No matter how many products you want to install and/or update, a single installation is enough.</td>
                        <td></td>
                    </tr><tr>
                        <td><code>AUS_PRODUCT_ID</code>*</td>
                        <td>Unique numeric ID of product that needs to be installed and/or updated. Can be obtained by going to <code>Products &gt; View Products</code> tab in Agora License Manager Script dashboard and selecting product to be installed and/or updated. At the end of URL, you will see something like <code>products_edit.php?product_id=NUMBER</code>, where NUMBER is unique product ID.</td>
                        <td>Cannot be modified after installing script.</td>
                    </tr><tr >
                        <td><code>AUS_PRODUCT_KEY</code>*</td>
                        <td>Unique key of product that needs to be installed and/or updated. The key can be generated automatically or entered manually during product creation and can be obtained by going to <code>Products &gt; View Products</code> tab in Agora License Manager Script dashboard and selecting product to be installed and/or updated.</td>
                        <td>If key is modified via Agora License Manager Script dashboard, it must be updated in configuration file too.</td>
                    </tr><tr>
                        <td><code>AUS_CONNECTION_TIMEOUT</code></td>
                        <td>Connection timeout in seconds. If product can't connect to and/or receive data from updates server after this period, connection will be dropped. Rule of thumb: 1 second for each MB to download. For example, if ZIP archives with your products are 50 MB in size, set this value to 50. As most compressed products only contain several MB of data, the default value of 30 should be enough.</td>
                        <td>Increasing connection timeout will also slightly increase server resources usage.</td>
                    </tr><tr >
                        <td><code>AUS_NOTIFICATION_NO_CONNECTION</code></td>
                        <td>Notification to be displayed when connection to server can't be established. Other notifications will be automatically fetched from server.</td>
                        <td></td>
                    </tr><tr>
                        <td><code>AUS_NOTIFICATION_ZIPARCHIVE_CLASS_MISSING</code></td>
                        <td>Notification to be displayed when ZipArchive class is missing on user's machine.</td>
                        <td></td>
                    </tr><tr >
                        <td><code>AUS_NOTIFICATION_ZIP_EXTRACT_ERROR</code></td>
                        <td>Notification to be displayed when extracting downloaded ZIP archive fails.</td>
                        <td></td>
                    </tr><tr>
                        <td><code>AUS_NOTIFICATION_ZIP_DELETE_ERROR</code></td>
                        <td>Notification to be displayed when removing downloaded ZIP archive fails.</td>
                        <td></td>
                    </tr><tr >
                        <td><code>AUS_DELETE_EXTRACTED</code></td>
                        <td>When option set to <code>YES</code>, downloaded ZIP archive will be automatically deleted after extracting files.</td>
                        <td></td>
                    </tr></tbody>
                </table>
                <p>
                    As you see, most of settings can be changed at any time, even when script is installed and in use. All you have to do is update configuration file in your script.
                </p>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
