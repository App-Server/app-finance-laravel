<div class="row g-3 needs-validation" >
    <div class="col-md-12" style="margin-top: 30px">
        @if ($errors->any())
            <div class="alert alert-danger col-sm-12 " role="alert">
                @foreach ($errors->all() as $error)
                <li><i class="bi bi-exclamation-triangle"></i>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong></strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
</div>