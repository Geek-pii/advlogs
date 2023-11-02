@extends('admin.layouts.master')

@section('meta')
    <meta name="linkDatatable"
        content="{{ route('admin.contact.datatable', ['company_id' => request()->get('company_id')]) }}" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 border-bottom-0">
            @include('admin.company.tabs', ['activeTab' => 'contacts'])
          </div>
          <div class="card-body">
              @include('admin.company.contact.list')
          </div>
      </div>
    </div>
</div>
@endsection

@section('script')
    @include('admin.layouts.parts.modal-delete')
    @include('admin.company.contact.partials.approve')
    @include('admin.company.contact.partials.un_approve')
    <script type="text/javascript" src="{{ asset('assets/admin/js/pages/company/contact/contact.index.js') }}"></script>
@endsection
