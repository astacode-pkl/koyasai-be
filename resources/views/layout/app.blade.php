<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png"
        href="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}" />

    <!-- Core Css -->
    <link rel="stylesheet" href="https://bootstrapdemos.adminmart.com/modernize/dist/assets/css/styles.css" />
    <link id="themeColors" rel="stylesheet" href="{{ asset('template/backend') }}/dist/css/styles.css" />
    @stack('style')
    <title>{{ $companyProfile->name }}</title>
    <!-- Owl Carousel  -->
    <link rel="stylesheet"
        href="{{ asset('template/backend') }}/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css">
</head>

<body>
    <!-- start welcome message -->
    <div class="toast toast-onload align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-body hstack align-items-start gap-6">
            <i class="ti ti-alert-circle fs-6"></i>
            <div>
                <h5 class="text-white fs-3 mb-1">Welcome to Koyasai</h5>
                <h6 class="text-white fs-2 mb-0">Easy to costomize the Template!!!</h6>
            </div>
            <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none"
                data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <!-- end welcome message -->
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}" alt="loader"
            class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>
                <!-- ---------------------------------- -->
                <!-- Start Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/" class="text-nowrap logo-img">
                        <img src="{{ asset('images/companyprofile/'.$companyProfile->logo_mark) }}" width="20%" alt="Logo Mark" />
                        <img src="{{ asset('images/companyprofile/'.$companyProfile->logo_type) }}" width="35%" alt="Logo Type" />
                    </a>
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>


                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav">
                        <!-- ---------------------------------- -->
                        <!-- Home -->
                        <!-- ---------------------------------- -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Dashboard</span>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Dashboard -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('/')) active @endif" href="/"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Data -->
                        <!-- ---------------------------------- -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Data</span>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Gallery -->
                        <!-- -------    --------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('galleries', 'galleries/*')) active @endif" href="/galleries"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-photo"></i>
                                </span>
                                <span class="hide-menu">Gallery</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- News -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link 
                        @if (request()->is('news', 'news/*')) active @endif"
                                href="/news" aria-expanded="false">
                                <span>
                                    <i class="ti ti-news"></i>
                                </span>
                                <span class="hide-menu">News</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow  " href="#" aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-basket"></i>
                                </span>
                                <span class="hide-menu">Catalogs</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="/categories"
                                        class="sidebar-link @if (request()->is('categories', 'categories/*')) active @endif">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Categories</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="/catalogs"
                                        class="sidebar-link @if (request()->is('catalogs', 'catalogs/*')) active @endif">
                                        <div class="round-16 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-circle"></i>
                                        </div>
                                        <span class="hide-menu">Catalogs</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- ---------------------------------- -->
                        <!-- Clients -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('clients', 'clients/*')) active @endif" href="/clients"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-users"></i>
                                </span>
                                <span class="hide-menu">Clients</span>
                            </a>
                        </li>

                        <!-- ---------------------------------- -->
                        <!-- Heroes -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('heroes', 'heroes/*')) active @endif" href="/heroes"
                                aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-slideshow"></i>
                                </span>
                                <span class="hide-menu">Heroes</span>
                            </a>
                        </li>

                        <!-- ---------------------------------- -->
                        <!-- Services -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('services', 'services/*')) active @endif" href="/services"
                                aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-ad-2"></i>
                                </span>
                                <span class="hide-menu">Services</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Embeds -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('embeds', 'embeds/*')) active @endif" href="/embeds"
                                aria-expanded="false">
                                <span class="d-flex">
                                    <i class="ti ti-link"></i>
                                </span>
                                <span class="hide-menu">Embeds</span>
                            </a>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Setting -->
                        <!-- ---------------------------------- -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Setting</span>
                        </li>
                        <!-- ---------------------------------- -->
                        <!-- Company Profile -->
                        <!-- ---------------------------------- -->
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('company-profile')) active @endif"
                                href="/company-profile" aria-expanded="false">
                                <span>
                                    <i class="ti ti-id-badge"></i>
                                </span>
                                <span class="hide-menu">Company Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('account-settings')) active @endif"
                                href="/account-settings">
                                <span>
                                    <i class="ti ti-user-circle"></i>
                                </span>
                                <span class="hide-menu">Account Settings</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link @if (request()->is('log-histories')) active @endif"
                                href="/log-histories" aria-expanded="false">
                                <span>
                                    <i class="ti ti-history"></i>
                                </span>
                                <span class="hide-menu">Log Histories</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
                    <div class="hstack gap-3">
                        <div class="john-img">
                            <img loading="lazy" src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg"
                                class="rounded-circle" width="40" height="40" alt="modernize-img" />
                        </div>
                        <div class="john-title">
                            <h6 class="mb-0 fs-4 fw-semibold">{{ auth()->user()->name }}</h6>
                            <span class="fs-2">Admin</span>
                        </div>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent text-primary ms-auto"
                                tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip"
                                data-bs-placement="top" data-bs-title="logout">
                                <i class="ti ti-power fs-6"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- ---------------------------------- -->
                <!-- End Vertical Layout Sidebar -->
                <!-- ---------------------------------- -->
            </div>
        </aside>
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    <!-- ---------------------------------- -->
                    <!-- Start Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="ti ti-search"></i>
                                </a>
                            </li>
                             <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex position-relative">
                                <a class="nav-link" href="/admin/inbox">
                                    <i class="ti ti-inbox position-relative"></i>
                                </a>
                                @if (Session::get('countUnread') > 0)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary"
                                        style="font-size: 0.6rem ;">
                                        {{ Session::get('countUnread') }}
                                    </span>
                                @endif
                            </li>
                        </ul>

                        <div class="d-block d-lg-none py-4">
                            <a href="/" class="text-nowrap logo-img">
                                <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}"
                                    width="10%" alt="Logo Mark" />
                                <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_type) }}"
                                    width="10%" alt="Logo Type" />
                            </a>
                        </div>
                        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ti ti-dots fs-7"></i>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                            <i class="ti ti-moon moon"></i>
                                        </a>
                                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                                            <i class="ti ti-sun sun"></i>
                                        </a>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- start notification Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                                        @if($contacts->where('status', 'unread')->count())
                                            <a class="nav-link position-relative" href="javascript:void(0)" id="drop2" aria-expanded="false">
                                                <i class="ti ti-bell-ringing"></i>
                                                <div class="notification bg-primary rounded-circle"></div>
                                            </a>
                                        @else
                                            <a class="nav-link position-relative" href="javascript:void(0)" id="drop2" aria-expanded="false">
                                                <i class="ti ti-bell-ringing"></i>
                                            </a>
                                        @endif
                                        
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                                <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">{{ $contacts->where('status', 'unread')->count() }}</span>
                                            </div>
                                            @foreach ($contacts->take(5) as $contact)
                                                @if ($contact->status == 'unread')
                                                <a href="/inbox/{{ Crypt::encryptString($contact['id']) }}" class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                        <img loading="lazy" src="{{asset('images/contacts/' . $contact->avatar)}}"
                                                            alt="avatar" class="rounded-circle" width="48" height="48" />
                                                    </span>
                                                    <div class="w-100">
                                                        <h6 class="mb-1 fw-semibold lh-base">{{ $contact->name }}</h6>
                                                        <span class="fs-2 d-block text-body-secondary">{{ $contact->message }}</span>
                                                    </div>
                                                </a>
                                                @else
                                                @endif
                                            @endforeach
                                            
                                            <div class="py-6 px-7 mb-1">
                                                <a href="/inboxes">                                                    
                                                    <button class="btn btn-outline-primary w-100" >See All Message</button>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end notification Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg"
                                                        class="rounded-circle" width="35" height="35"
                                                        alt="modernize-img" />
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    {{-- <img src="{{ asset('images/companyprofile/' . $companyProfile->logo) }}"class="rounded-circle img-fluid w-30" alt="logo" /> --}}
                                                    <img loading="lazy" src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg"class="rounded-circle img-fluid w-30"
                                                        alt="logo" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i>
                                                            {{ auth()->user()->email }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <a href="/account-settings"
                                                    class="py-8 px-7 mt-8 d-flex align-items-center">
                                                    <span
                                                        class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                                                        <img src="{{ asset('template/backend') }}/dist/images/svgs/icon-account.svg"
                                                            alt="" width="24" height="24">
                                                    </span>
                                                    <div class="w-75 d-inline-block v-middle ps-3">
                                                        <h6 class="mb-1 bg-hover-primary fw-semibold"> Account </h6>
                                                        <span class="d-block text-dark">Account Settings</span>
                                                    </div>
                                                </a>
                                                <form action="/logout" method="post">
                                                    <div class="d-grid py-4 px-7 pt-8">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Log
                                                            Out</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!-- ---------------------------------- -->
                    <!-- End Vertical Layout Header -->
                    <!-- ---------------------------------- -->
                </div>
                <div class="app-header with-horizontal">
                    <nav class="navbar navbar-expand-xl container-fluid p-0">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
                                <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <a href="/" class="text-nowrap nav-link">
                                    <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_mark) }}"
                                        width="10%" alt="Logo Mark" />
                                    <img src="{{ asset('images/companyprofile/' . $companyProfile->logo_type) }}"
                                        width="10%" alt="Logo Type" />
                                </a>
                            </li>
                            <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-xl-flex">
                                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="ti ti-search"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="d-block d-xl-none">
                            <a href="../main/index.html" class="text-nowrap nav-link">
                                <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/logos/dark-logo.svg"
                                    width="180" alt="modernize-img" />
                            </a>
                        </div>
                        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                                <a href="javascript:void(0)"
                                    class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <i class="ti ti-align-justified fs-7"></i>
                                </a>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                                            <i class="ti ti-moon moon"></i>
                                        </a>
                                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                                            <i class="ti ti-sun sun"></i>
                                        </a>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- start notification Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                                        @if ($contacts->where('is_read', false)->count())
                                        <a class="nav-link position-relative" href="javascript:void(0)"
                                            id="drop2" aria-expanded="false">
                                            <i class="ti ti-bell-ringing"></i>
                                            <div class="notification bg-primary rounded-circle"></div>
                                        </a>
                                        @else
                                        <a class="nav-link position-relative" href="javascript:void(0)"
                                            id="drop2" aria-expanded="false">
                                            <i class="ti ti-bell-ringing"></i>
                                            <div class=" bg-primary rounded-circle"></div>
                                        </a>
                                        @endif
                                        
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                                <span class="badge text-bg-primary rounded-4 px-3 py-1 lh-sm">5
                                                    new</span>
                                            </div>
                                            <div class="message-body" data-simplebar>
                                                @foreach ($contacts as $contact)
                                                <a href="javascript:void(0)"
                                                    class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                    <span class="me-3">
                                                        <img loading="lazy" src="{{asset('images/contacts/' . $contact->avatar)}}"
                                                            alt="user" class="rounded-circle" width="48"
                                                            height="48" />
                                                    </span>
                                                    <div class="w-100">
                                                        <h6 class="mb-1 fw-semibold lh-base">{{ $contact->name }} </h6>
                                                        <span class="fs-2 d-block text-body-secondary">{{ $contact->message }}</span>
                                                    </div>
                                                </a>
                                                @endforeach
                                            </div>
                                            <div class="py-6 px-7 mb-1">
                                                <button class="btn btn-outline-primary w-100">See All
                                                    Notifications</button>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end notification Dropdown -->
                                    <!-- ------------------------------- -->

                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img loading="lazy" src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg"
                                                        class="rounded-circle" width="35" height="35"
                                                        alt="modernize-img" />
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar>
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    {{-- <img src="{{ asset('images/companyprofile/' . $companyProfile->logo) }}"class="rounded-circle img-fluid w-30" alt="logo" /> --}}
                                                    <img loading="lazy" src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/profile/user-1.jpg"class="rounded-circle img-fluid w-30"
                                                        alt="logo" />
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3">{{ auth()->user()->name }}</h5>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i>
                                                            {{ auth()->user()->email }}
                                                        </p>
                                                    </div>
                                                </div>

                                                <form action="/logout" method="post">
                                                    <div class="d-grid py-4 px-7 pt-8">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Log
                                                            Out</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>
            <!--  Header End -->

            <aside class="left-sidebar with-horizontal">
                <!-- Sidebar scroll-->
                <div>
                    <!-- Sidebar navigation-->
                    <nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid">
                        <ul id="sidebarnav">

                            <!-- =================== -->
                            <!-- Dashboard -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/">
                                    <span>
                                        <i class="ti ti-home"></i>
                                    </span>
                                    <span class="hide-menu">Home</span>
                                </a>
                            </li>
                            <!-- ============================= -->
                            <!-- Data -->
                            <!-- ============================= -->
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Data</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link two-column has-arrow" href="javascript:void(0)"
                                    aria-expanded="false">
                                    <span>
                                        <i class="ti ti-archive"></i>
                                    </span>
                                    <span class="hide-menu">Data</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a href="/categories" class="sidebar-link">
                                            <i class="ti ti-list-details"></i>
                                            <span class="hide-menu">Categories</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/galleries" class="sidebar-link">
                                            <i class="ti ti-photo"></i>
                                            <span class="hide-menu">Galleries</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/programs" class="sidebar-link">
                                            <i class="ti ti-layout"></i>
                                            <span class="hide-menu">Programs</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/regulations" class="sidebar-link">
                                            <i class="ti ti-book"></i>
                                            <span class="hide-menu">Regulations</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/programs" class="sidebar-link">
                                            <i class="ti ti-layout"></i>
                                            <span class="hide-menu">Programs</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="/benefits" class="sidebar-link">
                                            <i class="ti ti-chart-pie"></i>
                                            <span class="hide-menu">Benefits</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="heroes" class="sidebar-link">
                                            <i class="ti ti-slideshow"></i>
                                            <span class="hide-menu">Heroes</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!-- =================== -->
                            <!-- Dashboard -->
                            <!-- =================== -->
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/company-profile">
                                    <span>
                                        <i class="ti ti-id-badge"></i>
                                    </span>
                                    <span class="hide-menu">Company Profile</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/account-setting">
                                    <span>
                                        <i class="ti ti-user-circle"></i>
                                    </span>
                                    <span class="hide-menu">Account Setting</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="/loghitories">
                                    <span>
                                        <i class="ti ti-history"></i>
                                    </span>
                                    <span class="hide-menu">Log Histories</span>
                                </a>
                            </li>


                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->

            </aside>

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <script>
                function handleColorTheme(e) {
                    document.documentElement.setAttribute("data-color-theme", e);
                }
            </script>
            <button
                class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn"
                type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
                <i class="icon ti ti-settings fs-7"></i>
            </button>

            <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                    <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                        Settings
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body h-n80" data-simplebar>
                    <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary rounded-2" for="light-layout">
                            <i class="icon ti ti-brightness-up fs-7 me-2"></i>Light
                        </label>

                        <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary rounded-2" for="dark-layout">
                            <i class="icon ti ti-moon fs-7 me-2"></i>Dark
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="direction-l" id="ltr-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="ltr-layout">
                            <i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR
                        </label>

                        <input type="radio" class="btn-check" name="direction-l" id="rtl-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="rtl-layout">
                            <i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                    <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                        <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="BLUE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="AQUA_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="PURPLE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Green_Theme')" for="green-theme-layout"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip"
                            data-bs-placement="top" data-bs-title="CYAN_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>

                        <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center"
                            onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                            <div
                                class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                            </div>
                        </label>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="vertical-layout"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="vertical-layout">
                                <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical
                            </label>
                        </div>
                        <div>
                            <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="horizontal-layout">
                                <i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal
                            </label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="layout" id="boxed-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="boxed-layout">
                            <i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed
                        </label>

                        <input type="radio" class="btn-check" name="layout" id="full-layout"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="full-layout">
                            <i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full
                        </label>
                    </div>

                    <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <a href="javascript:void(0)" class="fullsidebar">
                            <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="full-sidebar">
                                <i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full
                            </label>
                        </a>
                        <div>
                            <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar"
                                autocomplete="off" />
                            <label class="btn p-9 btn-outline-primary" for="mini-sidebar">
                                <i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse
                            </label>
                        </div>
                    </div>

                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                        <input type="radio" class="btn-check" name="card-layout" id="card-with-border"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="card-with-border">
                            <i class="icon ti ti-border-outer fs-7 me-2"></i>Border
                        </label>

                        <input type="radio" class="btn-check" name="card-layout" id="card-without-border"
                            autocomplete="off" />
                        <label class="btn p-9 btn-outline-primary" for="card-without-border">
                            <i class="icon ti ti-border-none fs-7 me-2"></i>Shadow
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!--  Search Bar -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content rounded-1">
                    <div class="modal-header border-bottom">
                        <input type="search" class="form-control fs-3" name="search" placeholder="Search here"
                            id="search" />
                        <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                            <i class="ti ti-x fs-5 ms-3"></i>
                        </a>
                    </div>
                    <div class="modal-body message-body" data-simplebar="">
                        <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>

                        <ul class="list mb-0 py-2" id="search_result">
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Dashboard</span>
                                    <span class="text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Contacts</span>
                                    <span class="text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Posts</span>
                                    <span class="text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Detail</span>
                                    <span
                                        class="text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Shop</span>
                                    <span class="text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Modern</span>
                                    <span class="text-muted d-block">/dashboards/dashboard1</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Dashboard</span>
                                    <span class="text-muted d-block">/dashboards/dashboard2</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Contacts</span>
                                    <span class="text-muted d-block">/apps/contacts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Posts</span>
                                    <span class="text-muted d-block">/apps/blog/posts</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Detail</span>
                                    <span
                                        class="text-muted d-block">/apps/blog/detail/streaming-video-way-before-it-was-cool-go-dark-tomorrow</span>
                                </a>
                            </li>
                            <li class="p-1 mb-1 bg-hover-light-black">
                                <a href="javascript:void(0)">
                                    <span class="d-block">Shop</span>
                                    <span class="text-muted d-block">/apps/ecommerce/shop</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    <script src="{{ asset('template/backend') }}/dist/js/vendor.min.js"></script>
    <!-- Import Js Files -->
    <script src="{{ asset('template/backend') }}/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/backend') }}/dist/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('template/backend') }}/dist/js/theme/app.init.js"></script>
    <script src="{{ asset('template/backend') }}/dist/js/theme/theme.js"></script>
    <script src="{{ asset('template/backend') }}/dist/js/theme/app.min.js"></script>
    <script src="{{ asset('template/backend') }}/dist/js/theme/sidebarmenu.js"></script>
    <script src="{{ asset('template/backend') }}/dist/js/dashboard.js"></script>
    <script src="{{ asset('template/backend') }}/dist/js/sidebarmenu.js"></script>
    <script src="{{ asset('template/backend') }}/dist/libs/jquery/dist/jquery.min.js"></script>

    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
    <script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/libs/owl.carousel/dist/owl.carousel.min.js">
    </script>
    <script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/libs/apexcharts/dist/apexcharts.min.js">
    </script>
    <script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/js/dashboards/dashboard.js"></script>
    @stack('script')
</body>

</html>
