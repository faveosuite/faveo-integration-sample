@extends('welcome')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Configuring Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Configuring Settings</li>
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
                <p>Always modify default encryption salt (APL_SALT) in configuration file.</p>
                <p>Always modify default MySQL table name (APL_DATABASE_TABLE) and license file location/name (APL_LICENSE_FILE_LOCATION) in configuration file.</p>
            </blockquote>
            <p>All Agora License Manager settings for your application are stored in
                <code>/SCRIPT/apl_core_configuration.php</code>
                file (rename it from
                <code>apl_core_configuration_sample.php</code>
                to
                <code>apl_core_configuration.php</code>
                first). Since this file must be included in each application you want to protect, be sure to use a different encryption salt every time. When automatic configuration file generator at <i>Extra Tools » Configuration Generator</i> tab of AGORA LICENSE MANAGER web module is used, a random salt is generated automatically. As a result, if someone hacks one of your applications, other ones will remain protected. The copy of default configuration file is below:
            </p>
            <div class="language-html max-height-300 highlighter-rouge">
                <div class="highlight">
                    <pre class="highlight">
                        <code>
&lt;?php

//MAIN CONFIG FILE OF AUTO PHP LICENSER. CAN BE EDITED MANUALLY OR GENERATED USING Extra Tools > Configuration Generator TAB IN AUTO PHP LICENSER DASHBOARD. THE FILE MUST BE INCLUDED IN YOUR SCRIPT BEFORE YOU PROVIDE IT TO USER.


//-----------<span class="nt">BASIC SETTINGS</span>-----------//


//Random salt used for encryption. It should contain random symbols (16 or more recommended) and be different for each application you want to protect. Cannot be modified after installing script.
<span class="nt">define</span>(<span class="s">"APL_SALT"</span>, <span class="s">"some_random_text"</span>);

//The URL (without / at the end) where Auto PHP Licenser from /WEB directory is installed on your server. No matter how many applications you want to protect, a single installation is enough.
<span class="nt">define</span>(<span class="s">"APL_ROOT_URL"</span>, <span class="s">"https://www.demo.license.com/apl"</span>);

//Unique numeric ID of product that needs to be licensed. Can be obtained by going to Products > View Products tab in Auto PHP Licenser dashboard and selecting product to be licensed. At the end of URL, you will see something like products_edit.php?product_id=NUMBER, where NUMBER is unique product ID. Cannot be modified after installing script.
<span class="nt">define</span>(<span class="s">"APL_PRODUCT_ID"</span>, <span class="nt">1</span>);

//Time period (in days) between automatic license verifications. The lower the number, the more often license will be verified, but if many end users use your script, it can cause extra load on your server. Available values are between 1 and 365. Usually 7 or 14 days are the best choice.
<span class="nt">define</span>(<span class="s">"APL_DAYS"</span>, <span class="nt">7</span>);

//Place to store license signature and other details. "DATABASE" means data will be stored in MySQL database (recommended), "FILE" means data will be stored in local file. Only use "FILE" if your application doesn't support MySQL. Otherwise, "DATABASE" should always be used. Cannot be modified after installing script.
<span class="nt">define</span>(<span class="s">"APL_STORAGE"</span>, <span class="s">"FILE"</span>);

//Name of table (will be automatically created during installation) to store license signature and other details. Only used when "APL_STORAGE" set to "DATABASE". The more "harmless" name, the better. Cannot be modified after installing script.
<span class="nt">define</span>(<span class="s">"APL_DATABASE_TABLE"</span>, <span class="s">"user_data"</span>);

//Name and location (relative to directory where "apl_core_configuration.php" file is located, cannot be moved outside this directory) of file to store license signature and other details. Can have ANY name and extension. The more "harmless" location and name, the better. Cannot be modified after installing script. Only used when "APL_STORAGE" set to "FILE" (file itself can be safely deleted otherwise).
<span class="nt">define</span>(<span class="s">"APL_LICENSE_FILE_LOCATION"</span>, <span class="s">"signature/license.key.example"</span>);

//Notification to be displayed when connection to server can't be established. Other notifications will be automatically fetched from server.
<span class="nt">define</span>(<span class="s">"APL_NOTIFICATION_NO_CONNECTION"</span>, <span class="s">"Can't connect to licensing server."</span>);

//Notification to be displayed when response received from server is invalid. Other notifications will be automatically fetched from server.
<span class="nt">define</span>(<span class="s">"APL_NOTIFICATION_INVALID_RESPONSE"</span>, <span class="s">"Invalid server response."</span>);

//Notification to be displayed when updating database fails. Only used when APL_STORAGE set to DATABASE.
<span class="nt">define</span>(<span class="s">"APL_NOTIFICATION_DATABASE_WRITE_ERROR"</span>, <span class="s">"Can't write to database."</span>);

//Notification to be displayed when updating license file fails. Only used when APL_STORAGE set to FILE.
<span class="nt">define</span>(<span class="s">"APL_NOTIFICATION_LICENSE_FILE_WRITE_ERROR"</span>, <span class="s">"Can't write to license file."</span>);

//Notification to be displayed when installation wizard is launched again after script was installed.
<span class="nt">define</span>(<span class="s">"APL_NOTIFICATION_SCRIPT_ALREADY_INSTALLED"</span>, <span class="s">"Script is already installed (or database not empty)."</span>);

//Notification to be displayed when license could not be verified because license is not installed yet or corrupted.
<span class="nt">define</span>(<span class="s">"APL_NOTIFICATION_LICENSE_CORRUPTED"</span>, <span class="s">"License is not installed yet or corrupted."</span>);

//Notification to be displayed when license verification does not need to be performed. Used for debugging purposes only, should never be displayed to end user.
<span class="nt">define</span>(<span class="s">"APL_NOTIFICATION_BYPASS_VERIFICATION"</span>, <span class="s">"No need to verify"</span>);


//-----------<span class="nt">ADVANCED SETTINGS</span>-----------//


//Secret key used to verify if configuration file included in your script is genuine (not replaced with 3rd party files). It can contain any number of random symbols and should be different for each application you want to protect. You should also change its name from "APL_INCLUDE_KEY_CONFIG" to something else, let's say "MY_CUSTOM_SECRET_KEY"
<span class="nt">define</span>(<span class="s">"APL_INCLUDE_KEY_CONFIG"</span>, <span class="s">"some_random_text"</span>);

//IP address of your Auto PHP Licenser installation. If IP address is set, script will always check if "APL_ROOT_URL" resolves to this IP address (very useful against users who may try blocking or nullrouting your domain on their servers). However, use it with caution because if IP address of your server is changed in future, old installations of protected script will stop working (you will need to update this file with new IP and send updated file to end user). If you want to verify licensing server, but don't want to lock it to specific IP address, you can use APL_ROOT_NAMESERVERS option (because nameservers change is unlikely).
<span class="nt">define</span>(<span class="s">"APL_ROOT_IP"</span>, <span class="s">""</span>);

//Nameservers of your domain with Auto PHP Licenser installation (only works with domains and NOT subdomains). If nameservers are set, script will always check if "APL_ROOT_NAMESERVERS" match actual DNS records (very useful against users who may try blocking or nullrouting your domain on their servers). However, use it with caution because if nameservers of your domain are changed in future, old installations of protected script will stop working (you will need to update this file with new nameservers and send updated file to end user). Nameservers should be formatted as an array. For example: array("ns1.license.com", "ns2.license.com"). Nameservers are NOT CAse SensitIVE.
//<span class="nt">define</span>(<span class="s">"APL_ROOT_NAMESERVERS"</span>, <span class="nt">array</span>(<span class="s">"ns1.license.com"</span>, <span class="s">"ns2.license.com"</span>)); <span class="nt">//ATTENTION</span>! <span class="nt">THIS</span> <span class="nt">FEATURE</span> <span class="nt">ONLY</span> <span class="nt">WORKS</span> <span class="nt">WITH</span> <span class="nt">PHP</span> <span class="nt">7.0</span> <span class="nt">AND</span> <span class="nt">HIGHER</span>, <span class="nt">ONLY</span> <span class="nt">UNCOMMENT</span> <span class="nt">THIS</span> <span class="nt">LINE</span> <span class="nt">IF</span> <span class="nt">PROTECTED</span> <span class="nt">SCRIPT</span> <span class="nt">WILL</span> <span class="nt">RUN</span> <span class="nt">ON</span> <span class="nt">COMPATIBLE</span> <span class="nt">SERVER</span>!

//When option set to "YES", script files and MySQL data will be deleted when illegal usage is detected. This is very useful against users who may try using pirated software; if someone shares his license with 3rd parties (by sending it to a friend, posting on warez forums, etc.) and you cancel this license, Auto PHP Licenser will try to delete all script files and any data in MySQL database for everyone who uses cancelled license. For obvious reasons, data will only be deleted if license is cancelled. If license is invalid or expired, no data will be modified. Use at your own risk!
<span class="nt">define</span>(<span class="s">"APL_DELETE_CANCELLED"</span>, <span class="s">""</span>);

//When option set to "YES", script files and MySQL data will be deleted when cracking attempt is detected. This is very useful against users who may try cracking software; if some unauthorized changes in core functions are detected, Auto PHP Licenser will try to delete all script files and any data in MySQL database. Use at your own risk!
<span class="nt">define</span>(<span class="s">"APL_DELETE_CRACKED"</span>, <span class="s">"YES"</span>);

//When option set to "YES", ALL files and MySQL data will be deleted when cracking attempt is detected. This option only works when APL_DELETE_CRACKED is set to "YES". The main difference between standard (used by default when APL_DELETE_CRACKED is set to "YES") and GOD mode is that GOD mode deletes not only script files, but also all other files from user's website (including other scripts, custom user files, etc.)
<span class="nt">define</span>(<span class="s">"APL_GOD_MODE"</span>, <span class="s">"YES"</span>);


//-----------<span class="nt">NOTIFICATIONS</span> <span class="nt">FOR</span> <span class="nt">USER</span> <span class="nt">INPUT</span> <span class="nt">VERIFICATIONS</span>. <span class="nt">SAFE</span> <span class="nt">TO</span> <span class="nt">DISPLAY</span> <span class="nt">TO</span> <span class="nt">END</span> <span class="nt">USER</span>-----------//


<span class="nt">define</span>(<span class="s">"APL_USER_INPUT_NOTIFICATION_INVALID_ROOT_URL"</span>, <span class="s">"User input error: Invalid installation URL (it should have a valid scheme and no / symbol at the end)"</span>);
<span class="nt">define</span>(<span class="s">"APL_USER_INPUT_NOTIFICATION_EMPTY_LICENSE_DATA"</span>, <span class="s">"User input error: empty license data (licensed email or license code should be provided)"</span>);
<span class="nt">define</span>(<span class="s">"APL_USER_INPUT_NOTIFICATION_INVALID_EMAIL"</span>, <span class="s">"User input error: invalid licensed email (it should be a valid email address)"</span>);
<span class="nt">define</span>(<span class="s">"APL_USER_INPUT_NOTIFICATION_INVALID_LICENSE_CODE"</span>, <span class="s">"User input error: invalid license code (it should be a code in plain text)"</span>);


//-----------<span class="nt">NOTIFICATIONS</span> <span class="nt">FOR</span> <span class="nt">DEBUGGING</span> <span class="nt">PURPOSES</span> <span class="nt">ONLY</span>. <span class="nt">SHOULD</span> <span class="nt">NEVER</span> <span class="nt">BE</span> <span class="nt">DISPLAYED</span> <span class="nt">TO</span> <span class="nt">END</span> <span class="nt">USER</span>-----------//


<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_SALT"</span>, <span class="s">"Configuration error: invalid or default encryption salt"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_ROOT_URL"</span>, <span class="s">"Configuration error: invalid root URL of Auto PHP Licenser installation"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_PRODUCT_ID"</span>, <span class="s">"Configuration error: invalid product ID"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_VERIFICATION_PERIOD"</span>, <span class="s">"Configuration error: invalid license verification period"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_STORAGE"</span>, <span class="s">"Configuration error: invalid license storage option"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_TABLE"</span>, <span class="s">"Configuration error: invalid MySQL table name to store license signature"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_LICENSE_FILE"</span>, <span class="s">"Configuration error: invalid license file location (or file not writable)"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_ROOT_IP"</span>, <span class="s">"Configuration error: invalid IP address of your Auto PHP Licenser installation"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_ROOT_NAMESERVERS"</span>, <span class="s">"Configuration error: invalid nameservers of your Auto PHP Licenser installation"</span>);
<span class="nt">define</span>(<span class="s">"APL_CORE_NOTIFICATION_INVALID_DNS"</span>, <span class="s">"License error: actual IP address and/or nameservers of your Auto PHP Licenser installation don't match specified IP address and/or nameservers"</span>);

//-----------<span class="nt">SOME</span> <span class="nt">EXTRA</span> <span class="nt">STUFF</span>. <span class="nt">SHOULD</span> <span class="nt">NEVER</span> <span class="nt">BE</span> <span class="nt">REMOVED</span> <span class="nt">OR</span> <span class="nt">MODIFIED</span>-----------//
<span class="nt">define</span>(<span class="s">"APL_DIRECTORY"</span>, <span class="nt">__DIR__</span>);
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
                <tr>
                    <td><code>APL_SALT</code>*</td>
                    <td>Random salt used for encryption. It should contain 16 or 24 random symbols and be different for each application you want to protect.</td>
                    <td>Cannot be modified after installing script.</td>
                </tr><tr >
                    <td><code>APL_ROOT_URL</code>*</td>
                    <td>The URL (without / at the end) where AGORA LICENSE MANAGER from <code>/WEB</code> directory is installed on your server. No matter how many applications you want to protect, a single installation is enough.</td>
                    <td></td>
                </tr><tr>
                    <td><code>APL_PRODUCT_ID</code>*</td>
                    <td>Unique numeric ID of product that needs to be licensed. Can be obtained by going to <code>Products &gt; View Products</code> tab in AGORA LICENSE MANAGER dashboard and selecting product to be licensed. At the end of URL, you will see something like <code>products_edit.php?product_id=NUMBER</code>, where NUMBER is unique product ID.</td>
                    <td>Cannot be modified after installing script.</td>
                </tr><tr >
                    <td><code>APL_DAYS</code></td>
                    <td>Time period (in days) between automatic license verifications. The lower the number, the more often license will be verified, but if many end users use your script, it can cause extra load on your server. Available values are between 1 and 365. Usually 7 or 14 days are the best choice.</td>
                    <td></td>
                </tr><tr>
                    <td><code>APL_STORAGE</code></td>
                    <td>Place to store license signature and other details. <code>DATABASE</code> means data will be stored in MySQL database (recommended), <code>FILE</code> means data will be stored in local file. Only use <code>FILE</code> if your application doesn't support MySQL. Otherwise, <code>DATABASE</code> should always be used.</td>
                    <td>Cannot be modified after installing script.</td>
                </tr><tr >
                    <td><code>APL_DATABASE_TABLE</code></td>
                    <td>Name of table (will be automatically created during installation) to store license signature and other details. Only used when <code>APL_STORAGE</code> set to <code>DATABASE</code>. The more "harmless" name, the better.</td>
                    <td>Cannot be modified after installing script.</td>
                </tr><tr>
                    <td><code>APL_LICENSE_FILE_LOCATION</code></td>
                    <td>Name and location (relative to directory where <code>apl_core_configuration.php</code> file is located, cannot be moved outside this directory) of file to store license signature and other details. Can have ANY name and extension. The more "harmless" location and name, the better.</td>
                    <td>Cannot be modified after installing script. Only used when <code>APL_STORAGE</code> set to <code>FILE</code> (file itself can be safely deleted otherwise).</td>
                </tr><tr >
                    <td><code>APL_NOTIFICATION_NO_CONNECTION</code></td>
                    <td>Notification to be displayed when connection to server can't be established. Other notifications will be automatically fetched from server.</td>
                    <td></td>
                </tr><tr>
                    <td><code>APL_NOTIFICATION_INVALID_RESPONSE</code></td>
                    <td>Notification to be displayed when response received from server is invalid. Other notifications will be automatically fetched from server.</td>
                    <td></td>
                </tr><tr >
                    <td><code>APL_NOTIFICATION_DATABASE_WRITE_ERROR</code></td>
                    <td>Notification to be displayed when updating database fails.</td>
                    <td>Only used when APL_STORAGE set to DATABASE.</td>
                </tr><tr>
                    <td><code>APL_NOTIFICATION_LICENSE_FILE_WRITE_ERROR</code></td>
                    <td>Notification to be displayed when updating license file fails.</td>
                    <td>Only used when APL_STORAGE set to DATABASE.</td>
                </tr><tr >
                    <td><code>APL_NOTIFICATION_SCRIPT_ALREADY_INSTALLED</code></td>
                    <td>Notification to be displayed when installation wizard is launched again after script was installed.</td>
                    <td></td>
                </tr><tr>
                    <td><code>APL_NOTIFICATION_LICENSE_CORRUPTED</code></td>
                    <td>Notification to be displayed when license could not be verified because license is not installed yet or corrupted.</td>
                    <td></td>
                </tr><tr >
                    <td><code>APL_NOTIFICATION_BYPASS_VERIFICATION</code></td>
                    <td>Notification to be displayed when license verification does not need to be performed.</td>
                    <td>Used for debugging purposes only, should never be displayed to end user.</td>
                </tr><tr>
                    <td><code>APL_INCLUDE_KEY_CONFIG</code></td>
                    <td>Secret key used to verify if configuration file included in your script is genuine (not replaced with 3rd party files). It can contain any number of random symbols and should be different for each application you want to protect. You should also change its name from <code>APL_INCLUDE_KEY_CONFIG</code> to something else, let's say <code>MY_CUSTOM_SECRET_KEY</code>.</td>
                    <td></td>
                </tr><tr >
                    <td><code>APL_ROOT_IP</code></td>
                    <td>IP address of your AGORA LICENSE MANAGER installation. If IP address is set, script will always check if <code>APL_ROOT_URL</code> resolves to this IP address (very useful against users who may try blocking or nullrouting your domain on their servers). However, use it with caution because if IP address of your server is changed in future, old installations of protected script will stop working (you will need to update this file with new IP and send updated file to end user). If you want to verify licensing server, but don't want to lock it to specific IP address, you can use APL_ROOT_NAMESERVERS option (because nameservers change is unlikely).</td>
                    <td></td>
                </tr><tr>
                    <td><code>APL_ROOT_NAMESERVERS</code></td>
                    <td>Nameservers of your domain with AGORA LICENSE MANAGER installation (only works with domains and NOT subdomains). If nameservers are set, script will always check if <code>APL_ROOT_NAMESERVERS</code> match actual DNS records (very useful against users who may try blocking or nullrouting your domain on their servers). However, use it with caution because if nameservers of your domain are changed in future, old installations of protected script will stop working (you will need to update this file with new nameservers and send updated file to end user). Nameservers should be formatted as an array. For example: array("ns1.license.com", "ns2.license.com"). Nameservers are NOT CAse SensitIVE.</td>
                    <td>Only domain nameservers are checked. Does not work with subdomains because of DNS limitations in PHP.</td>
                </tr><tr >
                    <td><code>APL_DELETE_CANCELLED</code></td>
                    <td>When option set to <code>YES</code>, script files and MySQL data will be deleted when illegal usage is detected. This is very useful against users who may try using pirated software; if someone shares his license with 3rd parties (by sending it to a friend, posting on warez forums, etc.) and you cancel this license, AGORA LICENSE MANAGER will try to delete all script files and any data in MySQL database for everyone who uses cancelled license. For obvious reasons, data will only be deleted if license is cancelled. If license is invalid or expired, no data will be modified. Use at your own risk!</td>
                    <td></td>
                </tr><tr>
                    <td><code>APL_DELETE_CRACKED</code></td>
                    <td>When option set to <code>YES</code>, script files and MySQL data will be deleted when cracking attempt is detected. This is very useful against users who may try cracking software; if some unauthorized changes in core functions are detected, AGORA LICENSE MANAGER will try to delete all script files and any data in MySQL database. Use at your own risk!</td>
                    <td></td>
                </tr><tr >
                    <td><code>APL_GOD_MODE</code></td>
                    <td>When option set to <code>YES</code>, all files and MySQL data will be deleted when cracking attempt is detected. This option only works when APL_DELETE_CRACKED is set to "YES". The main difference between standard (used by default when APL_DELETE_CRACKED is set to "YES") and GOD mode is that GOD mode deletes not only script files, but also all other files from user's website (including other scripts, custom user files, etc.)</td>
                    <td>Only use on a separate and isolated account during testing, otherwise all your files will be deleted.</td>
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
