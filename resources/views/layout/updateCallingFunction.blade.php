@extends('welcome')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper px-4 py-2">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Calling Function</h1>
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
                    <p>Arguments are only needed when you want to install and/or update older version.</p>
                </blockquote>
                    <p >In order to install and/or update your application, you need to call one or more of Agora License Manager Script functions inside your code. Here's the list of available functions (including type of data each function returns), their descriptions and working examples. Functions marked by <code>*</code> are required for automatic installation and/or update to work, while other functions are optional.</p>
                    <table  class="table table-bordered bg-light">
                        <thead>
                        <tr>
                            <th>Function</th>
                            <th>Arguments</th>
                            <th>Returned Data</th>
                            <th>Notes</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><code>ausCheckSettings</code></td>
                            <td><code>N/A</code></td>
                            <td>array</td>
                            <td>Verifies core settings (defined in <code>aus_core_configuration.php</code> file).</td>
                        </tr>
                        <tr>
                            <td><code>ausGetVersion</code></td>
                            <td><code>$VERSION_NUMBER</code> (optional)</td>
                            <td>array</td>
                            <td>Parses full (except the most sensitive) information of specified version for particular product. If no arguments are provided, the latest version is parsed.</td>
                        </tr>
                        <tr>
                            <td><code>ausGetAllVersions</code></td>
                            <td><code>N/A</code></td>
                            <td>array</td>
                            <td>Parses basic information of all available versions for particular product.</td>
                        </tr>
                        <tr>
                            <td><code>ausDownloadFile</code>*</td>
                            <td><code>$FILE_TYPE</code> (optional), <code>$VERSION_NUMBER</code> (optional)</td>
                            <td>array</td>
                            <td>Downloads and extracts installation/upgrade archive of specified version for particular product. If no arguments are provided, the latest upgrade archive is downloaded.</td>
                        </tr>
                        <tr>
                            <td><code>ausFetchQuery</code></td>
                            <td><code>$QUERY_TYPE</code> (optional), <code>$VERSION_NUMBER</code> (optional)</td>
                            <td>array</td>
                            <td>Fetches installation/upgrade raw MySQL query of specified version for particular product. If no arguments are provided, the latest upgrade query is fetched.</td>
                        </tr>
                        <tr>
                            <td><code>ausDeleteFileDirectory</code></td>
                            <td><code>$ROOT_DIRECTORY</code>, <code>$FILES_ARRAY</code> (optional)</td>
                            <td>integer</td>
                            <td>Recursively deletes specified files and directories in particular location and returns number of deleted records.</td>
                        </tr>
                        </tbody>
                    </table><br><br>

                <hr class="my-4">
                    <p ><b>Function</b>: <code>ausCheckSettings()</code>.<br>
                        <b>Description</b>: verifies Agora License Manager Script core settings defined by developer and returns an array with error messages in case of error. Doesn't return anything when no errors are found.<br>
                        <b>Arguments</b>: <code>N/A</code>.<br>
                        <b>Returned data</b>: <code>array</code> with errors (if any).<br>
                        <b>Should be used in</b>: <code>any file</code>, optional.<br><br>
                        <b>Additional notes</b>: <i>error messages returned by this function should never be displayed to end user for security reasons (use these messages for debugging purposes only).<br>
                            This function is automatically called by <code>ausGetVersion()</code>, <code>ausGetAllVersions</code>, <code>ausDownloadFile()</code> and <code>ausFetchQuery()</code> functions; therefore, a manual call is not needed usually.</i><br><br>
                        <b>Example</b>:</p>
                    <pre >
$aus_core_notifications=ausCheckSettings();
if (!empty($aus_core_notifications)) //invalid settings
    {
    echo &quot;Invalid settings, contact script developer&quot;;
    exit();
    }
</pre><br><br>
                <hr class="my-4">

                    <p ><b>Function</b>: <code>ausGetVersion($VERSION_NUMBER)</code>.<br>
                        <b>Description</b>: parses full (except the most sensitive) information of specified version for particular product from Agora License Manager Script web module and returns an array with product and version details.<br>
                        <b>Arguments</b>: <code>$VERSION_NUMBER</code> (only when old version is needed).<br>
                        <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code>, <code>notification_text</code> and <code>notification_data</code>.<br>
                        <b>Should be used in</b>: <code>any file</code>, optional.<br><br>
                        <b>Additional notes</b>: <i>array's key <code>notification_case</code> value will always be <code>notification_operation_ok</code> when operation succeeds.<br>
                            If no version number is provided, the latest version is parsed.</i><br><br>
                        <b>Example</b>:</p>
                    <pre >
$version_notifications_array=ausGetVersion(); //get data of latest available version
if ($version_notifications_array['notification_case']==&quot;notification_operation_ok&quot;) //'notification_operation_ok' case returned - operation succeeded
    {
    echo $version_notifications_array['notification_data']['product_title'].&quot; version &quot;.$version_notifications_array['notification_data']['version_number'].&quot; details parsed.&quot;;
    }
else //Other case returned - operation failed
    {
    echo &quot;Version details could not be parsed because of this reason: &quot;.$version_notifications_array['notification_text'];
    }
</pre><br><br>

                <hr class="my-4">
                    <p ><b>Function</b>: <code>ausGetAllVersions()</code>.<br>
                        <b>Description</b>: parses basic information of all available versions for particular product from Agora License Manager Script web module and returns an array with product details and sub-array with version details.<br>
                        <b>Arguments</b>: <code>N/A</code>.<br>
                        <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code>, <code>notification_text</code> and <code>notification_data</code>. Key <code>notification_data</code> contains a sub-array <code>product_versions</code> with information of each available version.<br>
                        <b>Should be used in</b>: <code>any file</code>, optional.<br><br>
                        <b>Additional notes</b>: <i>array's key <code>notification_case</code> value will always be <code>notification_operation_ok</code> when operation succeeds.</i><br><br>
                        <b>Example</b>:</p>
                    <pre >
$version_notifications_array=ausGetAllVersions(); //get data of all available versions
if ($version_notifications_array['notification_case']==&quot;notification_operation_ok&quot;) //'notification_operation_ok' case returned - operation succeeded
    {
    echo &quot;All versions parsed.
    Versions total: &quot;.count($version_notifications_array['notification_data']['product_versions']).&quot;,
    Latest version number: &quot;.end($version_notifications_array['notification_data']['product_versions'])['version_number'].&quot;,
    Latest version date: &quot;.end($version_notifications_array['notification_data']['product_versions'])['version_date'];
    }
else //Other case returned - operation failed
    {
    echo &quot;Available versions could not be parsed because of this reason: &quot;.$version_notifications_array['notification_text'];
    }
</pre><br><br>

                <hr class="my-4">
                    <p ><b>Function</b>: <code>ausDownloadFile($FILE_TYPE, $VERSION_NUMBER)</code>.<br>
                        <b>Description</b>: downloads and extracts installation/upgrade archive of specified version for particular product (optionally, deletes downloaded archive after extracting files).<br>
                        <b>Arguments</b>: <code>$FILE_TYPE</code> (<code>version_install_file</code> - installation files, <code>version_install_query</code> - installation MySQL query, <code>version_upgrade_file</code> - upgrade files, <code>version_upgrade_query</code> - upgrade MySQL query), <code>$VERSION_NUMBER</code> (only when old version is needed).<br>
                        <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code>, <code>notification_text</code> and <code>notification_data</code>.<br>
                        <b>Should be used in</b>: <code>any file</code> where automatic installation and/or update feature is needed.<br><br>
                        <b>Additional notes</b>: <i>array's key <code>notification_case</code> value will always be <code>notification_operation_ok</code> when operation succeeds.<br>
                            If no file type is provided, upgrade archive is downloaded.<br>
                            If no version number is provided, the latest version is downloaded.</i><br><br>
                        <b>Example</b>:</p>
                    <pre >
$download_notifications_array=ausDownloadFile(); //download and extract archive with upgrade files of latest available version

if ($download_notifications_array['notification_case']==&quot;notification_operation_ok&quot;) //'notification_operation_ok' case returned - operation succeeded
    {
    echo &quot;Your installation has been updated to the latest version&quot;
    }
else //Other case returned - operation failed
    {
    echo &quot;Your installation could not be updated because of this reason: &quot;.$download_notifications_array['notification_text'];
    }
</pre><br><br>
                <hr class="my-4">

                    <p ><b>Function</b>: <code>ausFetchQuery($QUERY_TYPE, $VERSION_NUMBER)</code>.<br>
                        <b>Description</b>: fetches installation/upgrade raw MySQL query of specified version for particular product.<br>
                        <b>Arguments</b>: <code>$QUERY_TYPE</code> (<code>install</code> - installation raw MySQL query, <code>upgrade</code> - upgrade raw MySQL query), <code>$VERSION_NUMBER</code> (only when old version is needed).<br>
                        <b>Returned data</b>: <code>array</code> with keys <code>notification_case</code>, <code>notification_text</code> and <code>notification_data</code>.<br>
                        <b>Should be used in</b>: <code>any file</code> where real-time installation/upgrade MySQL query execution is needed.<br><br>
                        <b>Additional notes</b>: <i>array's key <code>notification_case</code> value will always be <code>notification_operation_ok</code> when operation succeeds.<br>
                            array's key <code>notification_data</code> will always contain raw query, ready for execution.<Br>
                            If no query type is provided, upgrade query is fetched.<br>
                            If no version number is provided, the latest version is fetched.</i><br><br>
                        <b>Example</b>:</p>
                    <pre >
$GLOBALS[&quot;mysqli&quot;]=mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port); //establish connection to MySQL database

$query_notifications_array=ausFetchQuery(); //fetch upgrade raw MySQL query of latest available version

if ($query_notifications_array['notification_case']==&quot;notification_operation_ok&quot;) //'notification_operation_ok' case returned - operation succeeded
    {
    mysqli_multi_query($GLOBALS[&quot;mysqli&quot;], $query_notifications_array['notification_data']); //instantly execute fetched query
    echo &quot;Your database has been updated to the latest version&quot;
    }
else //Other case returned - operation failed
    {
    echo &quot;Your database could not be updated because of this reason: &quot;.$query_notifications_array['notification_text'];
    }
</pre><br><br>
                <hr class="my-4">

                    <p ><b>Function</b>: <code>ausDeleteFileDirectory($ROOT_DIRECTORY, $FILES_ARRAY)</code>.<br>
                        <b>Description</b>: recursively deletes specified files and directories in particular location and returns number of deleted records.<br>
                        <b>Arguments</b>: <code>$ROOT_DIRECTORY</code> (full path of directory from which files/directories need to be deleted), <code>$FILES_ARRAY</code> (array with names of files/directories to be deleted).<br>
                        <b>Returned data</b>: <code>integer</code> with number of deleted records.<br>
                        <b>Should be used in</b>: <code>any file</code> where automatic deletion feature is needed.<br><br>
                        <b>Additional notes</b>: <i><code>$ROOT_DIRECTORY</code> can point anywhere (even outside script).<br>
                            If <code>$FILES_ARRAY</code> is not used or is empty, all files and subdirectories inside specified directory will be deleted.<br>
                            If <code>$FILES_ARRAY</code> contains directory name, whole directory (including all subdirectories and files inside) will be deleted.<br>
                            If <code>$FILES_ARRAY</code> contains directory name, the number of deleted records won't include subdirectories and files inside it.</i><br><br>
                        <b>Example</b>:</p>
                    <pre >
$removed_records=ausDeleteFileDirectory(&quot;/home/user/www/script&quot;, array(&quot;install&quot;, &quot;upgrade.php&quot;)); //Delete 'install' directory (and all subdirectories/files inside it) and 'upgrade.php' file from '/home/someuser/www/script'

if (filter_var($removed_records, FILTER_VALIDATE_INT) && $removed_records>0) //positive number returned - operation succeeded
    {
    echo &quot;Deleted $removed_records files/directories&quot;
    }
else //Other value returned - operation failed
    {
    echo &quot;Specified files/directories could not be deleted&quot;;
    }
</pre><br><br>
                <hr class="my-4">

                    <p >A quick note on array's key <code>notification_case</code> returned by <code>ausGetVersion()</code> and <code>ausDownloadFile()</code> functions. The only <code>notification_case</code> value you should accept is <code>notification_operation_ok</code>. If any other case is returned, you should abort script execution and/or display additional notifications (<code>notification_text</code>) accordingly.<br><br>
                        For your convenience, the full list of possible <code>notification_case</code> values and their meanings is below:</p>
                    <ul>
                        <li><code>notification_host_banned</code> - user's IP address is banned</li>
                        <li><code>notification_install_archive_not_found</code> - requested version installation archive not found on Agora License Manager Script server</li>
                        <li><code>notification_install_limit_reached</code> - the maximum number of allowed installations for requested version was reached</li>
                        <li><code>notification_install_query_not_found</code> - requested version MySQL installation query not found on Agora License Manager Script server</li>
                        <li><code>notification_installation_not_verified</code> - updates are only allowed for verified installations, and this installation is not verified</li>
                        <li><code>notification_invalid_parameter</code> - one of parameters provided by script developer is invalid</li>
                        <li><code>notification_invalid_signature</code> - data received from user's machine is invalid (probably unauthorized modification of script)</li>
                        <li><code>notification_no_connection</code> - impossible to establish connection to Agora License Manager Script server</li>
                        <li><code>notification_operation_ok</code> - operation succeeded</li>
                        <li><code>notification_product_inactive</code> - requested product is inactive</li>
                        <li><code>notification_product_not_found</code> - requested product doesn't exist</li>
                        <li><code>notification_product_no_versions</code> - requested product has no versions</li>
                        <li><code>notification_raw_install_query_not_found</code> - requested version MySQL raw installation query not found on Agora License Manager Script server</li>
                        <li><code>notification_raw_upgrade_query_not_found</code> - requested version MySQL raw upgrade query not found on Agora License Manager Script server</li>
                        <li><code>notification_script_corrupted</code> - internal script configuration is invalid</li>
                        <li><code>notification_unknown_error</code> - an unknown error occurred (probably unauthorized modification of script)</li>
                        <li><code>notification_upgrade_archive_not_found</code> - requested version upgrade archive not found on Agora License Manager Script server</li>
                        <li><code>notification_upgrade_limit_reached</code> - the maximum number of allowed upgrades for requested version was reached</li>
                        <li><code>notification_upgrade_query_not_found</code> - requested version MySQL upgrade query not found on Agora License Manager Script server</li>
                        <li><code>notification_version_expired</code> - requested version is expired</li>
                        <li><code>notification_version_inactive</code> - requested version is inactive</li>
                        <li><code>notification_version_not_found</code> - requested version doesn't exist</li>
                        <li><code>notification_zip_delete_failed</code> - impossible to delete downloaded ZIP archive after extracting files on user's machine</li>
                        <li><code>notification_zip_extract_failed</code> - impossible to extract downloaded ZIP archive or write extracted files to user's machine</li>
                        <li><code>notification_ziparchive_class_missing</code> - ZipArchive class is not installed on user's machine</li>
                    </ul><br>
                    <p >Depending on event, <code>notification_text</code> will always contain a detailed error message (parsed from <code>Server Notifications > Customize Notifications</code> section inside Agora License Manager Script web module). This notification is safe to display to end user, so he has an idea what is wrong and how to fix it.</p>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
