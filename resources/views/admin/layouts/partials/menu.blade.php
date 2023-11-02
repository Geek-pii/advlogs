<!-- #Top Bar -->
<section>
  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
      <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, .3)"></div>
      <div class="info-container">
        <div class="image pull-left">
          <img src="{{ asset('assets/admin/images/user.png') }}" width="48" height="48" alt="User"/>
        </div>
        <div class="name" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="false">{{ Auth::user()->name }}</div>
        <div class="email">{{ Auth::user()->email }}</div>
        <div class="btn-group user-helper-dropdown">
          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
             aria-expanded="true">keyboard_arrow_down</i>
          <ul class="dropdown-menu pull-right">
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="material-icons">input</i>{!! trans("admin_menu.sign_out") !!}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
      <ul class="list">
        <li class="header"></li>
        <li class="{!! currentPageMenu(["*admin"]) !!}">
          <a href="{{ route('admin.dashboard.index') }}">
            <i class="material-icons">dashboard</i>
            <span>{!! trans("admin_menu.dashboard") !!}</span>
          </a>
        </li>

        @if(in_array('admin.page.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/pages*", '*admin/themes*']) !!}">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">pages</i>
              <span>{!! trans("admin_menu.pages") !!}</span>
            </a>
            <ul class="ml-menu">
              <li class="{!! currentPageMenu(["*admin/pages"]) !!}">
                <a href="{!! route("admin.page.index") !!}">
                  <span>{!! trans("admin_menu.pages_list") !!}</span>
                </a>
              </li>

              <li class="{!! currentPageMenu(["*admin/pages/create*"]) !!}">
                <a href="{!! route("admin.page.create") !!}">
                  <span>{!! trans("admin_menu.create_page") !!}</span>
                </a>
              </li>

              <li class="{!! currentPageMenu(["*admin/themes*"]) !!}">
                <a href="{!! route("admin.theme.index") !!}">
                  <span>{!! trans("admin_menu.themes") !!}</span>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('admin.menu.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/menu*"]) !!}">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">menu</i>
              <span>{!! trans("admin_menu.menu") !!}</span>
            </a>
            <ul class="ml-menu">
              <li class="{!! currentPageMenu(["*admin/menu*"]) !!}">
                <a href="{!! route("admin.menu.index") !!}">
                  <span>{!! trans("admin_menu.menu") !!}</span>
                </a>
              </li>
              <li class="{!! currentPageMenu(["*admin/menu-item*"]) !!}">
                <a href="{!! route("admin.menu.item.index") !!}">
                  <span>{!! trans("admin_menu.menu_item") !!}</span>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('admin.faq.category.index', $composer_auth_permissions) || in_array('admin.faq.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/faq-category*", "*admin/faqs*"]) !!}">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">quiz</i>
              <span>{!! trans("admin_menu.faqs") !!}</span>
            </a>
            <ul class="ml-menu">
              <li class="{!! currentPageMenu(["*admin/faq-category*"]) !!}">
                <a href="{!! route("admin.faq.category.index") !!}">
                  <span>{!! trans("admin_menu.faq_category") !!}</span>
                </a>
              </li>
              <li class="{!! currentPageMenu(["*admin/faqs*"]) !!}">
                <a href="{!! route("admin.faq.index") !!}">
                  <span>{!! trans("admin_menu.faqs") !!}</span>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('admin.get.a.quote.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/get-a-quote*"]) !!}">
            <a href="{!! route("admin.get.a.quote.index") !!}">
              <i class="material-icons">request_quote</i>
              <span>{!! trans("admin_menu.get_a_quote") !!}</span>
            </a>
          </li>
          <li class="">
            <a href="{{ url('admin/success-message') }}">
              <i class="material-icons">request_quote</i>
              <span>Submission Message</span>
            </a>
          </li>
          <li class="">
            <a href="{{ url('admin/info') }}">
              <i class="material-icons">request_quote</i>
              <span>Info Message</span>
            </a>
          </li>
        @endif

        {{-- @if(in_array('admin.contact.index', $composer_auth_permissions) || in_array('admin.department.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/contact*", "*admin/department*"]) !!}">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">contacts</i>
              <span>{!! trans("admin_menu.contact") !!}</span>
            </a>
            <ul class="ml-menu">
              <li class="{!! currentPageMenu(["*admin/contact*"]) !!}">
                <a href="{!! route("admin.contact.index") !!}">
                  <span>{!! trans("admin_menu.contact") !!}</span>
                </a>
              </li>
              <li class="{!! currentPageMenu(["*admin/department*"]) !!}">
                <a href="{!! route("admin.department.index") !!}">
                  <span>{!! trans("admin_menu.department") !!}</span>
                </a>
              </li>
            </ul>
          </li>
        @endif --}}

        @if(in_array('admin.contact.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/payment-plan*"]) !!}">
            <a href="{!! route("admin.payment.plan.index") !!}">
              <i class="material-icons">payment</i>
              <span>{!! trans("admin_menu.payment_plan") !!}</span>
            </a>
          </li>
        @endif
        @if(in_array('admin.contact.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/account*"]) !!}">
            <a href="{!! route("admin.account.index") !!}">
              <i class="material-icons">
                people
                </i>
              <span>Users</span>
            </a>
          </li>
        @endif
        @if(in_array('admin.company.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/company*"]) !!}">
            <a href="{!! route("admin.company.index") !!}">
              <i class="material-icons">
                business
              </i>
              <span>Company</span>
            </a>
          </li>
        @endif
        <li class="header"></li>
        @if(in_array('admin.user.index', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/users*", '*admin/roles*']) !!}">
            <a href="javascript:void(0);" class="menu-toggle">
              <i class="material-icons">account_box</i>
              <span>{!! trans("admin_menu.users") !!}</span>
            </a>
            <ul class="ml-menu">
              <li class="{!! currentPageMenu(["*admin/users*"]) !!}">
                <a href="{!! route("admin.user.index") !!}">
                  <span>{!! trans("admin_menu.users") !!}</span>
                </a>
              </li>
              <li class="{!! currentPageMenu(["*admin/roles*"]) !!}">
                <a href="{!! route("admin.role.index") !!}">
                  <span>{!! trans("admin_menu.roles") !!}</span>
                </a>
              </li>
            </ul>
          </li>
        @endif

        @if(in_array('admin.system.edit', $composer_auth_permissions))
          <li class="{!! currentPageMenu(["*admin/system*"]) !!}">
            <a href="{!! route("admin.system.edit", '0110') !!}">
              <i class="material-icons">settings</i>
              <span>{!! trans("admin_menu.system") !!}</span>
            </a>
          </li>
        @endif

        <li class="{!! currentPageMenu(["*"]) !!} hidden">
          <a></a>
        </li>
      </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
      <div class="copyright">
        &copy;{!! date("Y") !!} <a href="javascript:void(0);">Admin {{ config('app.name') }}</a>
      </div>
    </div>
    <!-- #Footer -->
  </aside>
  <!-- #END# Left Sidebar -->
</section>
