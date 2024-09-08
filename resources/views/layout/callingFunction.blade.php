@extends('welcome')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper px-4 py-2">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">License Calling Function</h1>
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
                    <p>$MYSQLI_LINK is only needed if your script requires MySQL connection.</p>
                    <p>$MYSQLI_LINK should always be local MySQL connection on user's server (never include MySQL credentials of your Agora License Manager installation).</p>
                </blockquote>
                <p>
                    In order to protect your application, you need to call one or more of Agora License Manager functions inside your code. Here's the list of available functions (including type of data each function returns), their descriptions and working examples. Functions marked by <code>*</code> must be called for basic protection to work. Other functions are optional.
                </p>
                <table class="table table-bordered bg-light">
                    <thead>
                    <tr>
                        <th>Function</th>
                        <th>Argument</th>
                        <th>Return Data</th>
                        <th>Notes</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <td><code>aplCheckSettings</code></td>
                        <td><code>N/A</code></td>
                        <td>array</td>
                        <td>Verifies core settings (defined in <code>apl_core_configuration.php</code> file).</td>
                    </tr><tr >
                        <td><code>aplCheckConnection</code></td>
                        <td><code>N/A</code></td>
                        <td>array</td>
                        <td>Checks if connection to your server (where Agora License Manager web module is installed) can be established.</td>
                    </tr><tr >
                        <td><code>aplCheckUserInput</code></td>
                        <td><code>$ROOT_URL</code>, <code>$CLIENT_EMAIL</code>, <code>$LICENSE_CODE</code></td>
                        <td>array</td>
                        <td>Verifies data submitted by user.</td>
                    </tr><tr >
                        <td><code>aplCheckData</code></td>
                        <td><code>$MYSQLI_LINK</code> (optional)</td>
                        <td>bool</td>
                        <td>Checks if additional data (such as license key and signature) is valid.</td>
                    </tr><tr >
                        <td><code>aplDeleteData</code></td>
                        <td><code>$MYSQLI_LINK</code> (optional)</td>
                        <td>N/A</td>
                        <td>Instantly deletes all files and MySQL data.</td>
                    </tr><tr >
                        <td><code>aplInstallLicense</code>*</td>
                        <td><code>$ROOT_URL</code>, <code>$CLIENT_EMAIL</code>, <code>$LICENSE_CODE</code>, <code>$MYSQLI_LINK</code> (optional)</td>
                        <td>array</td>
                        <td>Installs script for licensed users, aborts installation for non-licensed users.</td>
                    </tr><tr >
                        <td><code>aplVerifyLicense</code>*</td>
                        <td><code><code>$MYSQLI_LINK</code> (optional), $FORCE_VERIFICATION</code> (optional)</td>
                        <td>array</td>
                        <td>Verifies license status, allows using script for licensed users, aborts script execution for non-licensed users.</td>
                    </tr><tr >
                        <td><code>aplVerifySupport</code></td>
                        <td><code>$MYSQLI_LINK</code> (optional)</td>
                        <td>array</td>
                        <td>Verifies if user is eligible for support (when support expiration date is set in license).</td>
                    </tr><tr >
                        <td><code>aplVerifyUpdates</code></td>
                        <td><code>$MYSQLI_LINK</code> (optional)</td>
                        <td>array</td>
                        <td>Verifies if user is eligible for updates (when updates expiration date is set in license).</td>
                    </tr><tr >
                        <td><code>aplUpdateLicense</code></td>
                        <td><code>$MYSQLI_LINK</code> (optional)</td>
                        <td>array</td>
                        <td>Updates license if IP address of script was changed, so script continues to work on new IP.</td>
                    </tr><tr >
                        <td><code>aplUninstallLicense</code></td>
                        <td><code>$MYSQLI_LINK</code> (optional)</td>
                        <td>array</td>
                        <td>Uninstalls license, so user can re-install script on different domain. Script stops working immediately.</td>
                    </tr></tbody>
                </table>
                <hr class="my-4">
                <p><b>Function</b>: <code>aplCheckSettings()</code>.<br>
                    <b>Description</b>: verifies Agora License Manager core settings defined by developer and returns an array with error messages in case of error. Doesn't return anything when no errors are found.<br>
                    <b>Arguments</b>: <code>N/A</code>.<br>
                    <b>Returned data</b>: <code>array</code> with errors (if any).<br>
                    <b>Should be used in</b>: <code>any file</code>, optional.<br><br>
                    <b>Additional notes</b>: <i>error messages returned by this function should never be displayed to end user for security reasons (use these messages for debugging purposes only).<br>
                        This function is automatically called by <code>aplInstallLicense()</code>, <code>aplVerifyLicense()</code>, <code>aplVerifySupport()</code>, <code>aplVerifyUpdates()</code>, <code>aplUpdateLicense()</code>, and <code>aplUninstallLicense()</code>; therefore, manual call is not required.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$apl_core_notifications=aplCheckSettings();
if (!empty($apl_core_notifications)) //invalid settings
    {
    echo &quot;Invalid settings, contact script developer&quot;;
    exit();
    }
</pre><br><br>
                <hr class="my-4">

                <p><b>Function</b>: <code>aplCheckConnection()</code>.<br>
                    <b>Description</b>: checks if connection to your server (where Agora License Manager web module is installed) can be established and returns an array with error messages in case of error. Doesn't return anything when no errors are found.<br>
                    <b>Arguments</b>: <code>N/A</code>.<br>
                    <b>Returned data</b>: <code>array</code> with errors (if any).<br>
                    <b>Should be used in</b>: <code>any file</code>, optional.<br><br>
                    <b>Additional notes</b>: <i>calling this function is optional.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$apl_connection_notifications=aplCheckConnection();
if (!empty($apl_connection_notifications)) //protected script can't connect to your licensing server
    {
    echo &quot;Connection failed because of this reason: &quot;.$apl_connection_notifications['notification_text'];
    exit();
    }
</pre><br><br>

                <hr class="my-4">
                <p><b>Function</b>: <code>aplCheckUserInput()</code>.<br>
                    <b>Description</b>: verifies data submitted by user during license installation and returns an array with error messages in case of error. Doesn't return anything when no errors are found.<br>
                    <b>Arguments</b>: <code>$ROOT_URL</code>, <code>$CLIENT_EMAIL</code>, <code>$LICENSE_CODE</code>.<br>
                    <b>Returned data</b>: <code>array</code> with errors (if any).<br>
                    <b>Should be used in</b>: <code>installer</code>, optional.<br><br>
                    <b>Additional notes</b>: <i>error messages returned by this function are safe to display to end user, so he can fix his own errors.<br>
                        This function is automatically called by <code>aplInstallLicense()</code>; therefore, manual call is not required.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$apl_user_input_notifications=aplCheckUserInput($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE);
if (!empty($apl_user_input_notifications)) //invalid data submitted
    {
    echo &quot;Installation failed because of this reason: &quot;.$apl_user_input_notifications['notification_text'];
    exit();
    }
</pre><br><br>

                <hr class="my-4">
                <p><b>Function</b>: <code>aplCheckData($MYSQLI_LINK)</code>.<br>
                    <b>Description</b>: checks if additional data (such as license key and signature) is valid (not modified by user). Returns true on success, false otherwise.<br>
                    <b>Arguments</b>: <code>$MYSQLI_LINK</code> (only when MySQL database is used).<br>
                    <b>Returned data</b>: <code>true/false</code>.<br>
                    <b>Should be used in</b>: <code>any file</code> (except script installer when no license signature is stored yet), optional.<br><br>
                    <b>Additional notes</b>: <i>This function is automatically called by <code>aplVerifyLicense()</code>; therefore, manual call is not required.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database
if (!aplCheckData($GLOBALS[&quot;mysqli&quot;])) //internal data was modified by user
    {
    echo &quot;Invalid license data&quot;;
    exit();
    }
</pre><br><br>

                <hr class="my-4">
                <p><b>Function</b>: <code>aplDeleteData($MYSQLI_LINK)</code>.<br>
                    <b>Description</b>: instantly deletes all files and MySQL data of protected script. Doesn't return anything.<br>
                    <b>Arguments</b>: <code>$MYSQLI_LINK</code> (only when MySQL database is used).<br>
                    <b>Returned data</b>: <code>N/A</code>.<br>
                    <b>Should be used in</b>: <code>any file</code>, optional.<br><br>
                    <b>Additional notes</b>: <i>should only be used when files and data need to be deleted right now. Otherwise, activating <code>APL_DELETE_CANCELLED</code> and/or <code>APL_DELETE_CRACKED</code> option in <code>apl_core_configuration.php</code> file is enough.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database
if (user did something really wrong...) //delete everything
    {
    aplDeleteData($GLOBALS[&quot;mysqli&quot;]);
    exit();
    }
</pre><br><br>
                <hr class="my-4">

                <p><b>Function</b>: <code>aplInstallLicense($ROOT_URL, $CLIENT_EMAIL, $LICENSE_CODE, $MYSQLI_LINK)</code>.<br>
                    <b>Description</b>: installs license (only if license exists, is active, and meets installation requirements) or aborts installation for non-licensed users. Activates script on success, returns an array with error messages otherwise.<br>
                    <b>Arguments</b>: <code>$ROOT_URL</code> (full URL of script installation without / at the end), <code>$CLIENT_EMAIL</code> (licensed email address for personal licenses), <code>$LICENSE_CODE</code> (license code for anonymous licenses), <code>$MYSQLI_LINK</code> (only when MySQL database is used).<br>
                    <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code> and <code>notification_text</code>.<br>
                    <b>Should be used in</b>: <code>installer</code> (needs to be called once during script installation).<br><br>
                    <b>Additional notes</b>: <i>When personal license is used (license code not available), <code>$LICENSE_CODE</code> should be empty. When anonymous license is used (user's email unknown), <code>$CLIENT_EMAIL</code> should be empty.<br>
                        Array's key <code>notification_case</code> value will always be <code>notification_license_ok</code> when operation succeeds.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database

$license_notifications_array=aplInstallLicense(&quot;http://www.clientdomain.com&quot;, &quot;client@email.com&quot;, &quot;&quot;, $GLOBALS[&quot;mysqli&quot;]); //install personal (email-based) license using MySQL database
if ($license_notifications_array['notification_case']==&quot;notification_license_ok&quot;) //'notification_license_ok' case returned - operation succeeded
    {
    echo &quot;Congratulations, script is installed and ready to use!&quot;;
    }
else //Other case returned - operation failed
    {
    echo &quot;Installation failed because of this reason: &quot;.$license_notifications_array['notification_text'];
    exit();
    }
</pre><br><br>

                <hr class="my-4">
                <p><b>Function</b>: <code>aplVerifyLicense($MYSQLI_LINK, $FORCE_VERIFICATION)</code>.<br>
                    <b>Description</b>: verifies license status (only if license exists, is active, and meets installation requirements) or aborts execution when license is invalid. Allows using script on success, returns error message otherwise (optionally, deletes user data when license is cancelled).<br>
                    <b>Arguments</b>: <code>$MYSQLI_LINK</code> (only when MySQL database is used), <code>$FORCE_VERIFICATION</code> (<code>1</code> to force verification).<br>
                    <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code> and <code>notification_text</code>.<br>
                    <b>Should be used in</b>: <code>all files</code> (except script installer when no license signature is stored yet) for maximum protection, or at least the most important files of your script.<br><br>
                    <b>Additional notes</b>: <i>Array's key <code>notification_case</code> value will always be <code>notification_license_ok</code> when operation succeeds.<br>
                        There might be some cases when you don't want X days/weeks/months/years to pass since last verification, and need to force license validation right now. This way, set <code>$FORCE_VERIFICATION</code> value to <code>1</code> and Agora License Manager will connect to your server to force license validation. Use this option in extraordinary situations only, otherwise protected script will connect to your server every time it's in use (which means high server load).</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database

$license_notifications_array=aplVerifyLicense($GLOBALS[&quot;mysqli&quot;]); //verify license (Agora License Manager will determine when connection to your server is needed)
if ($license_notifications_array['notification_case']==&quot;notification_license_ok&quot;) //'notification_license_ok' case returned - operation succeeded
    {
    //display some success message or simply do nothing (so user can continue using his script)
    }
else //Other case returned - operation failed
    {
    echo &quot;License verification failed because of this reason: &quot;.$license_notifications_array['notification_text'];
    exit();
    }
</pre><br><br>
                <hr class="my-4">

                <p><b>Function</b>: <code>aplVerifySupport($MYSQLI_LINK)</code>.<br>
                    <b>Description</b>: verifies if user is eligible for support (when support expiration date is set in license).<br>
                    <b>Arguments</b>: <code>$MYSQLI_LINK</code> (only when MySQL database is used).<br>
                    <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code> and <code>notification_text</code>.<br>
                    <b>Should be used in</b>: <code>support section</code> (if your script has one).<br><br>
                    <b>Additional notes</b>: <i>Array's key <code>notification_case</code> will always be <code>notification_license_ok</code> when user is eligible for support.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database

$license_notifications_array=aplVerifySupport($GLOBALS[&quot;mysqli&quot;]);
if ($license_notifications_array['notification_case']==&quot;notification_license_ok&quot;) //'notification_license_ok' case returned - operation succeeded
    {
    echo &quot;Congratulations, you are eligible for support.&quot;;
    }
else //Other case returned - operation failed
    {
    echo &quot;You are not eligible for support because of this reason: &quot;.$license_notifications_array['notification_text'];
    exit();
    }
</pre><br><br>

                <hr class="my-4">
                <p><b>Function</b>: <code>aplVerifyUpdates($MYSQLI_LINK)</code>.<br>
                    <b>Description</b>: verifies if user is eligible for updates (when updates expiration date is set in license).<br>
                    <b>Arguments</b>: <code>$MYSQLI_LINK</code> (only when MySQL database is used).<br>
                    <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code> and <code>notification_text</code>.<br>
                    <b>Should be used in</b>: <code>updates section</code> (if your script has one).<br><br>
                    <b>Additional notes</b>: <i>Array's key <code>notification_case</code> will always be <code>notification_license_ok</code> when user is eligible for updates.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database

$license_notifications_array=aplVerifyUpdates($GLOBALS[&quot;mysqli&quot;]);
if ($license_notifications_array['notification_case']==&quot;notification_license_ok&quot;) //'notification_license_ok' case returned - operation succeeded
    {
    echo &quot;Congratulations, you are eligible for updates.&quot;;
    }
else //Other case returned - operation failed
    {
    echo &quot;You are not eligible for updates because of this reason: &quot;.$license_notifications_array['notification_text'];
    exit();
    }
</pre><br><br>
                <hr class="my-4">

                <p><b>Function</b>: <code>aplUpdateLicense($MYSQLI_LINK)</code>.<br>
                    <b>Description</b>: Updates license if IP address of script was changed, so script continues to work on new IP.<br>
                    <b>Arguments</b>: <code>$MYSQLI_LINK</code> (only when MySQL database is used).<br>
                    <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code> and <code>notification_text</code>.<br>
                    <b>Should be used in</b>: <code>license update section</code> (if your script has one).<br><br>
                    <b>Additional notes</b>: <i>Array's key <code>notification_case</code> will always be <code>notification_license_ok</code> when license update succeeds.<br>
                        Function will return error if IP address of script already matches IP stored on licensing server.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database

$license_notifications_array=aplUpdateLicense($GLOBALS[&quot;mysqli&quot;]);
if ($license_notifications_array['notification_case']==&quot;notification_license_ok&quot;) //'notification_license_ok' case returned - operation succeeded
    {
    echo &quot;License updated.&quot;;
    }
else //Other case returned - operation failed
    {
    echo &quot;License update failed because of this reason: &quot;.$license_notifications_array['notification_text'];
    exit();
    }
</pre><br><br>

                <hr class="my-4">
                <p ><b>Function</b>: <code>aplUninstallLicense($MYSQLI_LINK)</code>.<br>
                    <b>Description</b>: Uninstalls license, so user can re-install script on different domain. Script stops working immediately.<br>
                    <b>Arguments</b>: <code>$MYSQLI_LINK</code> (only when MySQL database is used).<br>
                    <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code> and <code>notification_text</code>.<br>
                    <b>Should be used in</b>: <code>uninstaller section</code> (if your script has one).<br><br>
                    <b>Additional notes</b>: <i>Array's key <code>notification_case</code> will always be <code>notification_license_ok</code> when license uninstallation succeeds.</i><br><br>
                    <b>Example</b>:</p>
                <pre>
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to local MySQL database

$license_notifications_array=aplUninstallLicense($GLOBALS[&quot;mysqli&quot;]);
if ($license_notifications_array['notification_case']==&quot;notification_license_ok&quot;) //'notification_license_ok' case returned - operation succeeded
    {
    echo &quot;License uninstalled.&quot;;
    }
else //Other case returned - operation failed
    {
    echo &quot;License uninstallation failed because of this reason: &quot;.$license_notifications_array['notification_text'];
    exit();
    }
</pre><br><br>

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
