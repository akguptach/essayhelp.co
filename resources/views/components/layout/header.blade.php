<?php
$services = \App\Models\Service::get();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="canonical" href="https://essayhelp.com/">
    <link rel="icon" href="{{ asset('images/essayhelp-icon.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Slick Slider style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <!-- Polyfill.io will load polyfills your browser needs -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Popper JS for Bootstrap tooltip -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Slick Slider JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap Datepicker JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>
        @if(isset($title))
        {{$title}}
        @else
        Welcome to Essay Help
        @endif
    </title>

    <style>
        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }



        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 999;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <header class="main-header">
        <!-- Fixed navbar fixed-top class bg-light-->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mx-auto mx-md-start" href="{{ route('home') }}">
                    <picture>
                        <source media="(min-width:465px)" srcset="{{ asset('images/essay-help-logo.svg') }}">
                        <img src="{{ asset('images/essay-help-logo.svg') }}" alt="Essay Help" title="Essay Help">
                    </picture>
                </a>



                <div class="collapse navbar-collapse" id="withlogin">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('why_us') ) ? 'active' : '' }}" aria-current="page" href="{{ route('why_us') }}">Why us?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('refer_friend') ) ? 'active' : '' }}" href="{{ route('refer_friend') }}">Refer a friend</a>
                        </li>
                        <!--	<li class="nav-item">
						<a class="nav-link  {{ (request()->is('blog') ) ? 'active' : '' }}" href="{{route('blog')}}">Blogs564</a>
					</li>
					<li class="nav-item">
						<a class="nav-link  {{ (request()->is('blog') ) ? 'active' : '' }}" href="{{route('blog')}}">Blogs564</a>
					</li> -->
                        <li class="nav-item">

                            <div class="dropdown">
                                <span class="fa fa-caret-down nav-link">Our Services</span>

                                <div class="dropdown-content">
                                    @foreach($services as $service)
                                    @if($service->seo && $service->seo->seo_url_slug)
                                    <a class="dropdown-item {{ (request()->is('Services') ) ? 'active' : '' }}" href="{{ route('Services.Index',['slug'=>@$service->seo->seo_url_slug]) }}">{{$service->service_name}}</a>
                                    @endif
                                    @endforeach
                                    <!--<a class="dropdown-item {{ (request()->is('Dissertation_service') ) ? 'active' : '' }}" href="{{ route('Dissertation_service') }}">Dissertation writing</a>
                                    <a class="dropdown-item {{ (request()->is('Research_writing_service') ) ? 'active' : '' }}" href="{{ route('Research_writing_service') }}">Research paper writing</a>
                                    <a class="dropdown-item {{ (request()->is('Term_writing_service') ) ? 'active' : '' }}" href="{{ route('Term_writing_service') }}">Term paper writing</a>
                                    <a class="dropdown-item {{ (request()->is('Admission_writing_service') ) ? 'active' : '' }}" href="{{ route('Admission_writing_service') }}">Admission essay writing</a>
                                    <a class="dropdown-item {{ (request()->is('Edit_my_essay') ) ? 'active' : '' }}" href="{{ route('Edit_my_essay') }}">Essay Editing</a>
                                    <a class="dropdown-item {{ (request()->is('Coursework_writing_service') ) ? 'active' : '' }}" href="{{ route('Coursework_writing_service') }}">Coursework writing</a>
                                    <a class="dropdown-item {{ (request()->is('Physics_help') ) ? 'active' : '' }}" href="{{ route('Physics_help') }}">Physics help</a>
                                    <a class="dropdown-item {{ (request()->is('Research_paper_online') ) ? 'active' : '' }}" href="{{ route('Research_paper_online') }}">Buy Research Paper</a>
                                    <a class="dropdown-item {{ (request()->is('Dissertation_online') ) ? 'active' : '' }}" href="{{ route('Dissertation_online') }}">Buy Dissertation</a>-->
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <!--<a class="nav-link" data-bs-toggle="modal" href="#feedbackModal">Contact us</a>-->
                            <a class="nav-link" href="#">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('faq') ) ? 'active' : '' }}" href="{{route('faq')}}">FAQ</a>
                        </li>
                        @guest
                        <li class="nav-item" id="is_login">
                            <a class="nav-link" data-bs-toggle="modal" href="#loginModal">Log in / Sign up</a>
                        </li>
                        @endguest
                        @auth
                        <x-account_drop />
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Logout</a>
                        </li>
                        @endauth
                    </ul>
                    <a href="{{ route('order') }}" class="btn btn-call">Order Now</a>
                </div>

            </div>
        </nav>
    </header>