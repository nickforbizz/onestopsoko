@extends('layouts.frontend')
    
    @section('content')
    <!-- Intro Start -->
    <section id="intro" class="full-height">
        <!-- Intro Panel Start -->
        <div class="intro-panel">
            <div class="container">
                <!-- Row Start -->
                <div class="row d-flex flex-row-reverse">
                    <!-- Btn & Info Start -->
                    <div class="col-lg-7 col-md-7 col-sm-12 d-flex">
                        <div class="align-self-center">
                            <!-- Title and Description -->
                            <div class="intro-content">
                                <h1 class="h1">we connect people for better business</h1>
                                <p>Ne assum iracundia appellantur vel, mea cu alia fugit splendide, est in animal epicuri indoctum. Eam ignota intellegebat ad. Dolor utamur debitis eos at.</p>
                            </div>
                            <div class="icon-btn clearfix">
                                
                                <!-- Btn Start -->
                                <a href="{{ route('login') }}" class="btn rounded p-btn bxs-none">
                                    <!-- Icon Btn Start -->
                                    <span class="icon-btn-card">
                                        <!-- Btn Icon -->
                                        <span class="icon-btn-card-item">
                                            <i class="icon ti-user pr-3"></i>
                                        </span>
                                        <!-- Btn Text -->
                                        <span class="icon-btn-card-item">
                                            <span class="icon-head"> Login </span>
                                        </span>
                                    </span>
                                    <!-- Icon Btn End -->
                                </a>
                                <!-- Btn End -->
                            </div>
                        </div>
                    </div>
                    <!-- Btn & Info End -->
                    <!-- Mobile Screen Start -->
                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <img src="{{ asset('assets/frontend/img/heroimg.png') }}"  id="mobile-img" alt="Mobile screen">
                    </div>
                    <!-- Mobile Screen End -->
                </div>
                <!-- Row End -->
            </div>
        </div>
        <!-- Intro Panel End -->
    </section>
    <!-- Intro End -->
    
    <!-- About Start -->
    <section id="about" class="pt-6">
        <div class="container">
            <!-- Heading Start -->
            <div class="heading text-center">
                <h2 class="h2">All about {{ env('APP_NAME') }}</h2>
                <span class="sub-head">Main moto to connect people for business</span>
            </div>
            <!-- Heading End -->
            <!-- Row Start -->
            <div class="row">
                <div class="col-lg-8 col-md-12 mx-auto">
                    <!-- Row Start -->
                    <div class="row d-flex flex-row-reverse">
                        <!-- App Screen Start -->
                       <div class="col-lg-7 col-md-6 col-sm-12">
                                <img src="{{ asset('assets/frontend/img/mobile-bg.jpg') }}" class="mob-screen mob-1" alt="Mobile screen 01">
                        </div>
                        <!-- App Screen End -->
                        <!-- Description Start -->
                        <div class="col-lg-5 col-md-6 col-sm-12 d-flex about-desc">
                            <!-- Description Center Start -->
                            <div class="align-self-center">
                                <span class="h4 mb-4">{{ env('APP_NAME') }} deals with the business</span>
                                <p>{{ env('APP_NAME') }} is an inventory application tailored for grocery businesses. It helps manage stock levels, track sales, and optimize supply chains, ensuring efficient operations and reduced waste.</p>
                            </div>
                            <!-- Description Center End -->
                        </div>
                        <!-- Description End -->
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- About End -->
    
    <!-- Feature Start -->
    <section id="features" class="pt-6">
        <div class="container">
            <!-- Heading Start -->
            <div class="heading text-center">
                <h2 class="h2">Features</h2>
                <span class="sub-head">Best app features</span>
            </div>
            <!-- Heading End -->
            <!-- Informational Text Start -->
            <div class="info-txt text-center row">
                <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
                    <p>Our inventory app offers real-time stock tracking, automated alerts, and seamless integration, ensuring you're always in control.</p>
                </div>
            </div>
            <!-- Informational Text End -->
            <!-- Row Start -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Feature Card Start -->
                    <div class="feature-card p-4 d-flex align-items-stretch">
                        <!-- Feature Icon Start -->
                        <div class="align-self-center">
                            <div class="icon-circle white d-flex">
                                <i class="ti-package align-self-center mx-auto"></i>
                            </div>
                        </div>
                        <!-- Feature Description Start -->
                        <div class="pl-3">
                            <span class="h5 mb-1">Inventory Tracking</span>
                            <p>Real-time monitoring of stock levels to prevent shortages and overstocking.</p>
                        </div>
                        <!-- Feature Description End -->                        
                    </div>
                    <!-- Feature Card End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Feature Card Start -->
                    <div class="feature-card p-4 d-flex align-items-stretch">
                        <!-- Feature Icon Start -->
                        <div class="align-self-center">
                            <div class="icon-circle white d-flex">
                                <i class="ti-money align-self-center mx-auto"></i>
                            </div>
                        </div>
                        <!-- Feature Icon End -->
                        <!-- Feature Description Start -->
                        <div class="pl-3">
                            <span class="h5 mb-1">Sales Monitoring</span>
                            <p>Track sales trends and identify top-selling products for better decision-making.</p>
                        </div>
                        <!-- Feature Description End -->                        
                    </div>
                    <!-- Feature Card End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Feature Card Start -->
                    <div class="feature-card p-4 d-flex align-items-stretch">
                        <!-- Feature Icon Start -->
                        <div class="align-self-center">
                            <div class="icon-circle white d-flex">
                                <i class="ti-alert align-self-center mx-auto"></i>
                            </div>
                        </div>
                        <!-- Feature Icon End -->
                        <!-- Feature Description Start -->
                        <div class="pl-3">
                            <span class="h5 mb-1">Low Stock Alerts</span>
                            <p>Receive notifications when stock levels are low, ensuring timely replenishment.</p>
                        </div>
                        <!-- Feature Description End -->                        
                    </div>
                    <!-- Feature Card End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Feature Card Start -->
                    <div class="feature-card p-4 d-flex align-items-stretch">
                        <!-- Feature Icon Start -->
                        <div class="align-self-center">
                            <div class="icon-circle white d-flex">
                                <i class="ti-bar-chart align-self-center mx-auto"></i>
                            </div>
                        </div>
                        <!-- Feature Icon End -->
                        <!-- Feature Description Start -->
                        <div class="pl-3">
                            <span class="h5 mb-1">Reporting & Analytics</span>
                            <p>Generate detailed reports on inventory, sales, and stock movement for analysis.</p>
                        </div> 
                        <!-- Feature Description End -->                       
                    </div>
                    <!-- Feature Card End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Feature Card Start -->
                    <div class="feature-card p-4 d-flex align-items-stretch">
                        <!-- Feature Icon Start -->
                        <div class="align-self-center">
                            <div class="icon-circle white d-flex">
                                <i class="ti-exchange-vertical align-self-center mx-auto"></i>
                            </div>
                        </div>
                        <!-- Feature Icon End -->
                        <!-- Feature Description Start -->
                        <div class="pl-3">
                            <span class="h5 mb-1">Stock Movement</span>
                            <p>Track inventory movement from suppliers to customers, ensuring accountability.</p>
                        </div> 
                        <!-- Feature Description End -->                       
                    </div>
                    <!-- Feature Card End -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- Feature Card Start -->
                    <div class="feature-card p-4 d-flex align-items-stretch">
                        <!-- Feature Icon Start -->
                        <div class="align-self-center">
                            <div class="icon-circle white d-flex">
                                <i class="ti-settings align-self-center mx-auto"></i>
                            </div>
                        </div>
                        <!-- Feature Icon End -->
                        <!-- Feature Description Start -->
                        <div class="pl-3">
                            <span class="h5 mb-1">Customization</span>
                            <p>Tailor the app to fit your specific business needs and workflows.</p>
                        </div> 
                        <!-- Feature Description End -->                       
                    </div>
                    <!-- Feature Card End -->
                </div>
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- Feature End -->

    

    

    
    <!-- Static Start -->
    <div id="counter" class="static py-6 mt-6">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <!-- Static Card Start -->
                <div class="col-lg-3 col-md-3 col-sm-6 text-center app-info">                   
                    <span class="counter-value d-block head pb-1" data-count="{{ $totalSales ?? 0 }}" > {{ $totalSales }} </span>
                    <span class="d-block">Sales</span>
                </div>
                <!-- Static Card End -->
                <!-- Static Card Start -->
                <div class="col-lg-3 col-md-3 col-sm-6 text-center app-info">                   
                    <span class="counter-value d-block head pb-1" data-count="{{ $totalProducts ?? 0 }}"> {{ $totalProducts ?? 0 }} </span>
                    <span class="d-block">Products</span>
                </div>
                <!-- Static Card End -->
                <!-- Static Card Start -->
                <div class="col-lg-3 col-md-3 col-sm-6 text-center app-info">                   
                    <span class="counter-value d-block head pb-1" data-count="{{ $totalClients ?? 0 }}"> {{ $totalClients ?? 0 }} </span>
                    <span class="d-block">Clients</span>
                </div>
                <!-- Static Card End -->
                <!-- Static Card Start -->
                <div class="col-lg-3 col-md-3 col-sm-6 text-center app-info">                   
                    <span class="counter-value d-block head pb-1" data-count="{{ $totalSuppliers ?? 0 }}"> {{ $totalSuppliers ?? 0 }}  </span>
                    <span class="d-block">Suppliers</span>
                </div>
                <!-- Static Card End -->
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Static End -->
    
  



@endsection


@push('scripts')
<!-- Scripts -->
<script src="{{ asset('assets/frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/lity.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
@endpush