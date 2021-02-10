<div class="row">
    <div class="col-12">
        <h1>{{$pageTitle}}</h1>
    </div>
    <div class="col-12">
        <ol class="breadcrumb float-sm-left">
            @foreach ($preBreadcrumbs as $key => $value)
                <li class="breadcrumb-item">{{$key}}</li>
            @endforeach
            <li class="breadcrumb-item active">{{$activeItem}}s</li>
        </ol>
    </div>
</div>