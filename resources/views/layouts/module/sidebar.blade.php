<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item {{ set_active('home') }}">
                    <a href="{{ route('home') }}" class="sidebar-link test" data-toggle="tooltip" data-placement="right" title="Dashboard">
                        {{-- <span class="tooltiptext tooltip-right">Dashboard</span> --}}
                        <i class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg>
                        </i>
                    </a>
                </li>

            <li class="list-divider"></li>
            @role('super-admin')
                @if (auth()->user()->can('master'))
                    <li class="sidebar-item {{ set_active('flag*') }}">
                        <a class="sidebar-link" href="{{ route('flag.index') }}" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Master Flag">
                            <i class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-flag" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3.5 1a.5.5 0 0 1 .5.5v13a.5.5 0 0 1-1 0v-13a.5.5 0 0 1 .5-.5z"/>
                                    <path fill-rule="evenodd" d="M3.762 2.558C4.735 1.909 5.348 1.5 6.5 1.5c.653 0 1.139.325 1.495.562l.032.022c.391.26.646.416.973.416.168 0 .356-.042.587-.126a8.89 8.89 0 0 0 .593-.25c.058-.027.117-.053.18-.08.57-.255 1.278-.544 2.14-.544a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5c-.638 0-1.18.21-1.734.457l-.159.07c-.22.1-.453.205-.678.287A2.719 2.719 0 0 1 9 9.5c-.653 0-1.139-.325-1.495-.562l-.032-.022c-.391-.26-.646-.416-.973-.416-.833 0-1.218.246-2.223.916a.5.5 0 1 1-.515-.858C4.735 7.909 5.348 7.5 6.5 7.5c.653 0 1.139.325 1.495.562l.032.022c.391.26.646.416.973.416.168 0 .356-.042.587-.126.187-.068.376-.153.593-.25.058-.027.117-.053.18-.08.456-.204 1-.43 1.64-.512V2.543c-.433.074-.83.234-1.234.414l-.159.07c-.22.1-.453.205-.678.287A2.719 2.719 0 0 1 9 3.5c-.653 0-1.139-.325-1.495-.562l-.032-.022c-.391-.26-.646-.416-.973-.416-.833 0-1.218.246-2.223.916a.5.5 0 0 1-.554-.832l.04-.026z"/>
                                </svg>
                            </i>
                        </a>
                    </li>
                <li class="list-divider"></li>
                @endif
            @endrole

            @role('super-admin')

                @if (auth()->user()->can('report-show'))
                    <li class="sidebar-item {{ set_active('report*') }}">
                        <a class="sidebar-link tooltips" href="{{ route('report.index')}}" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Report">
                            <i class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 2h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3z"/>
                                    <path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/>
                                </svg>
                            </i>
                            {{-- <span class="tooltiptext tooltip-right">Apps Setting</span> --}}
                        </a>
                    </li>
                @endif

            <li class="list-divider"></li>
            @endrole
            {{-- END --}}
            @role('Admin|super-admin')
                {{-- SETTING --}}
                {{-- <li class="nav-small-cap"><span>REPORT LC MUDA</span></li> --}}

                @if (auth()->user()->can('apps-show'))
                <li class="sidebar-item {{ set_active('apps*') }}">
                    <a class="sidebar-link tooltips" href="{{ route('apps.index')}}" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Apps Setting">
                        {{-- <i class="icon-note nav-icon"></i> --}}
                        <i class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-down-left" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                <path fill-rule="evenodd" d="M11.5 10a.5.5 0 0 1-.5.5H6a.5.5 0 0 1-.5-.5V5a.5.5 0 0 1 1 0v4.5H11a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M5.646 10.354a.5.5 0 0 1 0-.708l8-8a.5.5 0 0 1 .708.708l-8 8a.5.5 0 0 1-.708 0z"/>
                            </svg>
                        </i>
                        <span class="tooltiptext tooltip-right">Apps Setting</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->can('role-show'))
                <li class="sidebar-item {{ set_active('roles*') }}">
                    <a href="{{ route('roles.index') }}" class="sidebar-link tooltips"  data-toggle="tooltip" data-placement="right" title="Roles">
                        {{-- <i class="fas fa-circle-notch nav-icon"></i> --}}
                        <i class="nav-icon">
                            {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bootstrap-reboot" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 0 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8zm5.48-.079V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6zm0 3.75V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141z"/>
                            </svg> --}}
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmarks" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7 13l5 3V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12l5-3zm-4 1.234l4-2.4 4 2.4V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v10.234z"/>
                                <path d="M14 14l-1-.6V2a1 1 0 0 0-1-1H4.268A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v12z"/>
                            </svg>
                        </i>
                        <span class="tooltiptext tooltip-right">Roles</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->can('role permission-show'))
                <li class="sidebar-item {{ set_active('users.roles_permission') }}">
                    <a href="{{ route('users.roles_permission') }}" class="sidebar-link tooltips"  data-toggle="tooltip" data-placement="right" title="Role Permissions">
                        {{-- <i class="fas fa-clipboard-check nav-icon"></i> --}}
                        <i class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.5 2a.5.5 0 0 0-.5.5v11.066l4-2.667 4 2.667V8.5a.5.5 0 0 1 1 0v6.934l-5-3.333-5 3.333V2.5A1.5 1.5 0 0 1 4.5 1h4a.5.5 0 0 1 0 1h-4z"/>
                                <path fill-rule="evenodd" d="M15.854 2.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 4.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                        </i>
                        <span class="tooltiptext tooltip-right">Role Permissions</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->can('users-show'))
                <li class="sidebar-item {{ set_active('users.create') . set_active('users.edit') . set_active('users.roles') }} ">
                    <a href="{{ route('users.index') }}" class="sidebar-link tooltips"  data-toggle="tooltip" data-placement="right" title="Users">
                        {{-- <i class="fas fa-user-circle nav-icon"></i> --}}
                        <i class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-people" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.995-.944v-.002.002zM7.022 13h7.956a.274.274 0 0 0 .014-.002l.008-.002c-.002-.264-.167-1.03-.76-1.72C13.688 10.629 12.718 10 11 10c-1.717 0-2.687.63-3.24 1.276-.593.69-.759 1.457-.76 1.72a1.05 1.05 0 0 0 .022.004zm7.973.056v-.002.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10c-1.668.02-2.615.64-3.16 1.276C1.163 11.97 1 12.739 1 13h3c0-1.045.323-2.086.92-3zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>
                        </i>
                        <span class="tooltiptext tooltip-right">Users</span>
                    </a>
                </li>
                @endif

            @endrole

                <li class="sidebar-item">
                    <a class="sidebar-link tooltips" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" aria-expanded="false" data-toggle="tooltip" data-placement="right" title="Logout">
                        {{-- <i class="icon-logout nav-icon"></i> --}}
                        <i class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-power" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.578 4.437a5 5 0 1 0 4.922.044l.5-.866a6 6 0 1 1-5.908-.053l.486.875z"/>
                                <path fill-rule="evenodd" d="M7.5 8V1h1v7h-1z"/>
                            </svg>
                        </i>
                        <span class="tooltiptext tooltip-right">Logout</span>
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
