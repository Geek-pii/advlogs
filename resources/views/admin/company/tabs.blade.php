<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ $activeTab == 'basic_info' ? 'active' : '' }}"
            href="{{ route('admin.company.show', ['id' => $companyId]) }}">Basic Info</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $activeTab == 'contacts' ? 'active' : '' }}"
            href="{{ route('admin.contact.index', ['company_id' => $companyId]) }}">Users</a>
    </li>
    @if (isset($carrierLoad) || \App\Models\Company::find($companyId)->type == 'carrier')
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'carrier-load' ? 'active' : '' }}"
                href="{{ route('admin.company.carrier-load.index', ['company' => $companyId]) }}">Carrier Loads</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab == 'payment' ? 'active' : '' }}"
                href="{{ route('admin.company.payment.index', ['company' => $companyId]) }}">Payments</a>
        </li>
    @endif
</ul>
