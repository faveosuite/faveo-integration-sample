@extends('welcome')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper px-4 py-2">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Include Files</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Include Files</li>
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
                    <p>Always place /SCRIPT directory in the root directory of your script.</p>
                    <p>Always rename /SCRIPT directory into something else (doing so will NOT break code functionality) for better protection.</p>
                </blockquote>
                <p>Just copy whole
                    <code>/SCRIPT</code>
                    directory to the root directory of your script and include
                    <code>apl_core_configuration.php</code> ,
                    <code>apl_core_functions.php</code> ,
                    <code>aus_core_configuration.php</code>
                     and
                    <code>aus_core_functions.php</code>
                    files in your script using this code:
                </p>
                <div class="language-html max-height-300 highlighter-rouge">
                    <div class="highlight">
                    <pre class="highlight"><code>
<span class="nt">require_once</span>(<span class="s">"SCRIPT/apl_core_configuration.php"</span>);
<span class="nt">require_once</span>(<span class="s">"SCRIPT/apl_core_functions.php"</span>);
<span class="nt">require_once</span>(<span class="s">"SCRIPT/aus_core_configuration.php"</span>);
<span class="nt">require_once</span>(<span class="s">"SCRIPT/aus_core_functions.php"</span>);</code>
                    </pre>
                    </div>
                </div>
                <p>
                    Since most PHP scripts usually have main settings file, this code can be added right to the settings file. This way, you don't need to include code to each file separately.
                </p><p>
                    There might be situations when wannabe hacker somehow finds out your script is protected by Agora License Manager (especially when default file names are used) and decides to replace <code>apl_core_configuration.php</code> and <code>apl_core_functions.php</code> files with his own files. In order to prevent this from happening, you should always verify that included files are genuine and abort execution if they are not. Hence, if someone cracks code protection algorithm and replaces it with his own, application becomes useless.
                </p><p>
                    The task can be accomplished using <code>APL_INCLUDE_KEY_CONFIG</code> option and/or standard PHP functions <code>md5_file</code> or <code>sha1_file</code> (or both of them). While <code>APL_INCLUDE_KEY_CONFIG</code> is extremely simple to implement, hash verification is more secure; therefore, it would be wise to combine both methods.
                </p><p>
                    Let's take a closer look how both methods work in a real life. We will assume that <code>APL_INCLUDE_KEY_CONFIG</code> was renamed into <code>MY_CUSTOM_SECRET_KEY</code> and has a value <code>abc456xyz</code>. Then you just add this code to your file(s) right after <code>apl_core_configuration.php</code> is included:
                </p>
                <div class="language-html max-height-300 highlighter-rouge">
                    <div class="highlight">
                    <pre class="highlight"><code>
<span class="nt">require_once</span>(<span class="s">"SCRIPT/apl_core_configuration.php"</span>);
<span class="nt">if</span>(<span class="s">"MY_CUSTOM_SECRET_KEY"</span>!=<span class="s">"abc456xyz"</span>){
<span class="nt">echo</span> <span class="s">"Don't modify my files."</span>;
<span class="nt">exit</span>();}
                        </code>
                    </pre>
                    </div>
                </div>
                <p>
                    While basic example above can be easily implemented even by PHP beginners, professionals will prefer a stronger verification to avoid core files from being replaced. It can be done by calculating file hash values every time an application is executed. In other words, once you finish customizing settings in apl_core_configuration.php file, calculate its hash value and use it for further verifications. Hash values can be calculated using free tools such as HashCheck (Windows), fHash (Windows, Mac OS), or md5sum command (Linux).
                </p>
                <blockquote class="quote-info mt-0">
                    <h5>Attention</h5>
                    <p>PHP treats UPPERCASE and lowercase values differently; therefore, if calculated hash value is abc123 and your script expects it to be ABC123, check will fail. Since md5_file function returns lowercase value, it's recommended to always use lowercase letters for hash verification.</p>
                </blockquote>
                <p>
                    Let's say that function md5_file was used and apl_core_configuration.php hash value is abc123, while apl_core_functions.php hash value is 987zyx. Then you just add this code right after Agora License Manager core files are included:
                </p>
                <div class="language-html max-height-300 highlighter-rouge">
                    <div class="highlight">
                    <pre class="highlight"><code>
<span class="nt">if</span>(<span class="nt">md5_file</span>(<span class="s">"SCRIPT/apl_core_configuration.php"</span>)!=<span class="s">"abc123"</span> || <span class="nt">md5_file</span>(<span class="s">"SCRIPT/apl_core_configuration.php"</span>)!=<span class="s">"987zyx"</span>){
<span class="nt">echo</span> <span class="s">"Don't modify my files."</span>;
<span class="nt">exit</span>();}
                        </code>
                    </pre>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
