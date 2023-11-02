<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                @if (Breadcrumb::$page_title)
                    <h1 class="m-0">{{ Breadcrumb::$page_title }}</h1>
                @endif
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach (Breadcrumb::$breadcrumb as $name => $link)
                        @if ($link !== null)
                            <li class="breadcrumb-item"><a href="{{ $link }}">{{ $name }}</a></li>;
                        @else
                            <li class="breadcrumb-item active">{{ $name }}</li>
                        @endif
                    @endforeach
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
