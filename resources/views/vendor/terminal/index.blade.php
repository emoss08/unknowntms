<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terminal</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover"/>
    <meta name="description"
          content="Interactive entity-relationship diagram or data model diagram implemented by GoJS in JavaScript for HTML."/>
    <link href="{{ asset('demo8/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('demo8/plugins/global/plugins.bundle.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('demo8/plugins/global/plugins-custom.bundle.css') }}"
          rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('demo8/css/style.bundle.css') }}"
          rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="{{ asset('vendor/terminal/css/terminal.css') }}" rel="stylesheet"/>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        #tracy-debug-bar {
            display: none;
        }
    </style>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed" style="">
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <!--begin::Header-->
    <div id="kt_header" class="header">
        <!--begin::Brand-->
        <div class="container-fluid d-flex flex-stack">
            <!--begin::Brand-->
            <div class="d-flex align-items-center me-5">
                <!--begin::Aside toggle-->
                <div class="d-lg-none btn btn-icon btn-active-color-white w-30px h-30px ms-n2 me-3"
                     id="kt_aside_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
											<path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black"/>
											<path opacity="0.3"
                                                  d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                  fill="black"/>
										</svg>
									</span>
                    <!--end::Svg Icon-->
                </div>
                <a href="{{config('laravel-erd.url')}}">
                    <img alt="Logo" src="{{asset('demo8/media/logos/logo-2.svg')}}" class="h-25px h-lg-30px"/>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center flex-shrink-0">
                    <div class="d-flex align-items-center ms-1">
                        <a href="/" class="btn btn-sm btn-text-white btn-active-light-dark btn-active-text-dark">Go back
                            to Application</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column flex-lg-row">
        <div class="aside">
            <div class="aside-menu flex-column-fluid px-5">
                <div class="aside card">
                    <div class="card-header">
                        <h3 class="card-title">Parameters</h3>
                    </div>
                    <div class="card-body">
                        Coming soon
                    </div>
                </div>
            </div>
        </div>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="d-flex flex-column flex-column-fluid container-fluid">
                <div class="flex-lg-row-fluid">

                    <div
                        class="alert alert-dismissible bg-light-danger border border-danger border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<path opacity="0.3"
                                                                  d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z"
                                                                  fill="black"></path>
															<path
                                                                d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z"
                                                                fill="black"></path>
														</svg>
													</span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Content-->
                        <div class="d-flex flex-column pe-0 pe-sm-10">
                            <h5 class="mb-1">Notification!</h5>
                            <span>If you are unsure about commands. Please reference <a
                                    href="https://laravel.com/docs/8.x/artisan">Laravel Artisan Commands</a> before running commands in the terminal.</span>
                        </div>
                        <!--end::Content-->
                        <!--begin::Close-->
                        <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                            <i class="bi bi-x fs-1 text-danger"></i>
                        </button>
                        <!--end::Close-->
                    </div>
                    <div class="card shadow-sm card-stretch">
                        <div class="card-header">
                            <h3 class="card-title">Artisan Control Console</h3>
                        </div>
                        <div class="card-body" style=" height: 100%; ">
                            <div id="terminal-shell" style="width: 100%; height: 50vh"></div>
                            <script src="{{ asset('vendor/terminal/js/terminal.js') }}"></script>
                            <script>
                                (function () {
                                    new Terminal("#terminal-shell", {!! $options !!});
                                })();
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--begin::Footer-->
        <div class="footer py-4 d-flex flex-column flex-md-row flex-stack" id="kt_footer">
            <!--begin::Container-->
            <div
                class="{{ theme()->printHtmlClasses('footer-container', false) }} d-flex flex-column flex-md-row align-items-center justify-content-between">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-muted fw-bold me-1">{{ date("Y") }}&copy;</span>
                    <a href="{{ theme()->getOption('general', 'website') }}" rel="noreferrer" target="_blank"
                       class="text-gray-800 text-hover-primary">
                        Artisan TMS</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
                <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                    <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Support</a></li>

                    <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Privacy Policy</a></li>

                    <li class="menu-item"><a href="#" target="_blank" class="menu-link px-2">Terms & Conditions</a></li>
                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Container-->
        </div>
    </div>
    <!--end::Footer-->
</body>
</html>
