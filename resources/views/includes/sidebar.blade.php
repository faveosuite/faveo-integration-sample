<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ url('/') }}" class="brand-link text-center">
{{--        <img src="" alt="Agora license manager logo" class="brand-image img-circle elevation-3" >--}}
        <span class="brand-text font-weight-light">Agora License Manager</span>
    </a>

    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" ></div>
        </div>
        <div class="os-size-auto-observer observed" >
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible">
                <div class="os-content" >

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link">
                                    <i class="nav-icon fas fa-house"></i>
                                    <p>
                                        Introduction
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('includeFiles') }}" class="nav-link">
                                    <i class="nav-icon fas fa-folder-open"></i>
                                    <p>
                                        Include Files
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-gears"></i>
                                    <p>
                                        Configuration Settings
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('configuring') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>License</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('updateConfiguring') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Update</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-code"></i>
                                    <p>
                                        Calling Functions
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ url('callingFunction') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>License</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('updateCalling') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Update</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('encoding') }}" class="nav-link">
                                    <i class="nav-icon fas fa-key"></i>
                                    <p>
                                        Encoding and Licensing
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('apiList') }}" class="nav-link">
                                    <i class="nav-icon fas fa-layer-group"></i>
                                    <p>
                                        Integration Apis
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track"><div class="os-scrollbar-handle" >
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track"><div class="os-scrollbar-handle" >
                </div>
            </div>
        </div>
        <div class="os-scrollbar-corner">
        </div>
    </div>

</aside>
