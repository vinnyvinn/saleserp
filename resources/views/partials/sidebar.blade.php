<header id="header-menu">
    <div class="navbar container navbar-expand-sm">
    {{-- <div class="user-box text-center pt-5 pb-3">
        <div class="user-img">
            <img src="{{ auth()->user()->present()->avatar }}"
                 width="90"
                 height="90"
                 alt="user-img"
                 class="rounded-circle img-thumbnail img-responsive">
        </div>
        <h5 class="my-3">
            <a href="{{ route('profile') }}">{{ auth()->user()->present()->nameOrEmail }}</a>
        </h5>

        <ul class="list-inline mb-2">
            <li class="list-inline-item">
                <a href="{{ route('profile') }}" title="@lang('app.my_profile')">
                    <i class="fas fa-cog"></i>
                </a>
            </li>

            <li class="list-inline-item">
                <a href="{{ route('auth.logout') }}" class="text-custom" title="@lang('app.logout')">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </div> --}}

   <div class="row">
        <div class="col-sm-12">
        
                <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'active' : ''  }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-home"></i>
                                <span>@lang('app.dashboard')</span>
                            </a>
                        </li>
            
                        @permission('users.manage')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('user*') ? 'active' : ''  }}" href="{{ route('user.list') }}">
                                <i class="fas fa-users"></i>
                                <span>@lang('app.users')</span>
                            </a>
                        </li>
                        @endpermission
            
                        @permission('manage.account')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('accounts*') ? 'active' : ''  }}" href="{{ route('accounts.index') }}">
                                <i class="fas fa-server"></i>
                                <span>Accounts</span>
                            </a>
                        </li>
                        @endpermission
                        @permission('manage.opportunity')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('opportunity*') ? 'active' : ''  }}" href="{{ route('opportunity') }}">
                                <i class="fas fa-list"></i>
                                <span>Opportunities</span>
                            </a>
                        </li>
                        @endpermission
                        
                        @permission('manage.lead')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('lead*') ? 'active' : ''  }}" href="{{ route('leads.index') }}">
                                <i class="fas fa-list"></i>
                                <span>Leads</span>
                            </a>
                        </li>
                        @endpermission
                        @permission('manage.quotations')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('quotation*') ? 'active' : ''  }}" href="{{ route('quotations.index') }}">
                                <i class="fas fa-list"></i>
                                <span>Quotations</span>
                            </a>
                        </li>
                        @endpermission
                        @permission(['roles.manage', 'permissions.manage'])
                        <li class="nav-item">
                            <a href="#roles-dropdown"
                               class="nav-link"
                               data-toggle="collapse"
                               aria-expanded="{{ Request::is('role*') || Request::is('permission*') ? 'true' : 'false' }}">
                                <i class="fas fa-users-cog"></i>
                                <span>@lang('app.roles_and_permissions')</span>
                            </a>
                            <ul class="{{ Request::is('role*') || Request::is('permission*') ? '' : 'collapse' }} list-unstyled sub-menu" id="roles-dropdown">
                                @permission('roles.manage')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('role*') ? 'active' : '' }}"
                                       href="{{ route('role.index') }}">@lang('app.roles')</a>
                                </li>
                                @endpermission
                                @permission('permissions.manage')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('permission*') ? 'active' : '' }}"
                                       href="{{ route('permission.index') }}">@lang('app.permissions')</a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission
            
                        @permission(['settings.general', 'settings.auth', 'settings.notifications'], false)
                        <li class="nav-item">
                            <a href="#settings-dropdown"
                               class="nav-link"
                               data-toggle="collapse"
                               aria-expanded="{{ Request::is('settings*') ? 'true' : 'false' }}">
                                <i class="fas fa-cogs"></i>
                                <span>@lang('app.settings')</span>
                            </a>
                            <ul class="{{ Request::is('settings*') ? '' : 'collapse' }} list-unstyled sub-menu"
                                id="settings-dropdown">
            
                                @permission('settings.general')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('settings') ? 'active' : ''  }}"
                                       href="{{ route('settings.general') }}">
                                        @lang('app.general')
                                    </a>
                                </li>
                                @endpermission
                                
                                @permission('settings.services')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('service') ? 'active' : ''  }}"
                                       href="{{ route('service.items') }}">
                                       Service Items
                                    </a>
                                </li>
                                @endpermission

                                @permission('settings.auth')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('settings/auth*') ? 'active' : ''  }}"
                                       href="{{ route('settings.auth') }}">@lang('app.auth_and_registration')</a>
                                </li>
                                @endpermission
            
                                @permission('settings.notifications')
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('settings/notifications*') ? 'active' : ''  }}"
                                       href="{{ route('settings.notifications') }}">@lang('app.notifications')</a>
                                </li>
                                @endpermission
                            </ul>
                        </li>
                        @endpermission
                    </ul>
        </div>
   </div>
    </div>
</header>

