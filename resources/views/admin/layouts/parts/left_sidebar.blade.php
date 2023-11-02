<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('page.home') }}" class="brand-link">
        <img src="{{ asset('assets/AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ADMIN -
            {{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/admin/images/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block text-center">{{ Auth::user()->name }}</a>
                <a class="d-block">{{ Auth::user()->email }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {!! currentPageActive(['admin']) !!}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {!! trans('admin_menu.dashboard') !!}
                        </p>
                    </a>
                </li>
                @if (in_array('admin.page.index', $composer_auth_permissions))
                    <li class="nav-item {{ currentMenuPageOpen(['*admin/pages*', 'admin/themes']) }}">
                        <a href="#" class="nav-link {!! currentPageActive(['admin/pages', 'admin/themes']) !!}">
                            <i class="nav-icon fas fa fa-copy"></i>
                            <p>
                                {!! trans('admin_menu.pages') !!}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{!! route('admin.page.index') !!}" class="nav-link {!! currentPageActive(['admin/pages']) !!}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('admin_menu.pages_list') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.page.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('admin_menu.create_page') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.theme.index') }}" class="nav-link {!! currentPageActive(['admin/themes']) !!}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ trans('admin_menu.themes') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (in_array('admin.menu.index', $composer_auth_permissions))
                    <li class="nav-item">
                        <a href="{!! route('admin.menu.index') !!}" class="nav-link {!! currentPageActive(['*admin/menu*']) !!}">
                            <i class="nav-icon fas fa-bars"></i>
                            <p>{!! trans('admin_menu.menu') !!}</p>
                        </a>
                    </li>
                @endif
                @if (in_array('admin.faq.category.index', $composer_auth_permissions) ||
                    in_array('admin.faq.index', $composer_auth_permissions))
                    <li class="nav-item {{ currentMenuPageOpen(['*admin/faq-category*', 'admin/faqs']) }}">
                        <a href="javascript:void(0);" class="nav-link {!! currentPageActive(['*admin/faq-category*', '*admin/faqs*']) !!}">
                            <i class="nav-icon fas fa-question-circle"></i>
                            <p>{!! trans('admin_menu.faqs') !!}</p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{!! route('admin.faq.category.index') !!}" class="nav-link {!! currentPageActive(['*admin/faq-category*']) !!}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{!! trans('admin_menu.faq_category') !!}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('admin.faq.index') !!}" class="nav-link {!! currentPageActive(['*admin/faqs*']) !!}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{!! trans('admin_menu.faqs') !!}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (in_array('admin.get.a.quote.index', $composer_auth_permissions))
                    <li class="nav-item">
                        <a href="{!! route('admin.get.a.quote.index') !!}" class="nav-link {!! currentPageActive(['*admin/get-a-quote*']) !!}">
                            <i class="nav-icon fas fa-quote-right"></i>
                            <p>{!! trans('admin_menu.get_a_quote') !!}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/success-message') }}" class="nav-link {!! currentPageActive(['*admin/success-message*']) !!}">
                            <i class="nav-icon fas fa fa-comment-dots"></i>
                            <p>Submission Message</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/info') }}" class="nav-link {!! currentPageActive(['*admin/info*']) !!}">
                            <i class="nav-icon fas fa fa-copy"></i>
                            <p>Info Message</p>
                        </a>
                    </li>
                @endif
                @if (in_array('admin.contact.index', $composer_auth_permissions))
                    <li class="nav-item">
                        <a href="{!! route('admin.payment.plan.index') !!}" class="nav-link {!! currentPageActive(['*admin/payment-plan*']) !!}">
                            <i class="nav-icon fas fa fa-money-bill-wave-alt"></i>
                            <p>{!! trans('admin_menu.payment_plan') !!}</p>
                        </a>
                    </li>
                @endif
                @if (in_array('admin.contact.index', $composer_auth_permissions))
                    <li class="nav-item">
                        <a href="{!! route('admin.account.index') !!}" class="nav-link {!! currentPageActive(['*admin/account*']) !!}">
                            <i class="nav-icon fas fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                @endif
                @if (in_array('admin.company.index', $composer_auth_permissions))
                    <li class="nav-item">
                        <a href="{!! route('admin.company.index') !!}" class="nav-link {!! currentPageActive(['*admin/company*']) !!}">
                            <i class="nav-icon fas fa fa-building"></i>
                            <p>Company</p>
                        </a>
                    </li>
                @endif
                <li class="border-light">
                    <hr class="bg-white" />
                </li>
                @if (in_array('admin.user.index', $composer_auth_permissions))
                    <li class="nav-item {{ currentMenuPageOpen(['*admin/users*', '*admin/roles*']) }}">
                        <a href="javascript:void(0);" class="nav-link {!! currentPageActive(['*admin/users*', '*admin/roles*']) !!}">
                            <i class="nav-icon fas fa fa-user-cog"></i>
                            <p>
                                {!! trans('admin_menu.users') !!}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{!! route('admin.user.index') !!}" class="nav-link {!! currentPageActive(['*admin/users*']) !!}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{!! trans('admin_menu.users') !!}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{!! route('admin.role.index') !!}" class="nav-link {!! currentPageActive(['*admin/roles*']) !!}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{!! trans('admin_menu.roles') !!}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (in_array('admin.system.edit', $composer_auth_permissions))
                    <li class="nav-item">
                        <a href="{!! route('admin.system.edit', '0110') !!}" class="nav-link {!! currentPageActive(['*admin/system*']) !!}">
                            <i class="nav-icon fab fa fa-sitemap"></i>
                            <p>{!! trans('admin_menu.system') !!}</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
