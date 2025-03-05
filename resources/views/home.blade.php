@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/galleries">
                <div class="card border-bottom border-danger">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $galleries }}</h2>
                                <h6 class="fw-medium text-danger mb-0">Gallery</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-danger display-6"><i class="ti ti-list-details"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $galleriesLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/news">
                <div class="card border-bottom border-primary">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $news }}</h2>
                                <h6 class="fw-medium text-primary mb-0">News</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-primary display-6"> <i class="ti ti-photo"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $newsLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/categories">
                <div class="card border-bottom border-success">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $categories }}</h2>
                                <h6 class="fw-medium text-success mb-0">Categories</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-success display-6"><i class="ti ti-book"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $categoriesLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/regulations">
                <div class="card border-bottom border-success">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $catalogs }}</h2>
                                <h6 class="fw-medium text-success mb-0">Catalogs</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-success display-6"><i class="ti ti-book"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $catalogsLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/clients">
                <div class="card border-bottom border-danger">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $clients }}</h2>
                                <h6 class="fw-medium text-danger mb-0">Clients</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-danger display-6"><i class="ti ti-layout"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $clientsLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/heroes">
                <div class="card border-bottom border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $heroes }}</h2>
                                <h6 class="fw-medium text-info mb-0">Heroes</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-info display-6"><i class="ti ti-chart-pie"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $heroesLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/services">
                <div class="card border-bottom border-success">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $services }}</h2>
                                <h6 class="fw-medium text-success mb-0">Services</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-success display-6"><i class="ti ti-inbox"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $servicesLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 col-md-6 mb-4">
            <a href="/embeds">
                <div class="card border-bottom border-success">
                    <div class="card-body">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="fs-7">{{ $embeds }}</h2>
                                <h6 class="fw-medium text-success mb-0">Embeds</h6>
                            </div>
                            <div class="ms-auto">
                                <span class="text-success display-6"><i class="ti ti-slideshow"></i></span>
                            </div>
                        </div>
                        <h7 class="text-muted">Last created: {{ $embedsLastcreated }}</h7>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
