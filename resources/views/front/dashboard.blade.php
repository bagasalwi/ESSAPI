@extends('front.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-info text-white">
                    <div class="hero-inner">
                        <h2>Hello, ESS User!</h2>
                        <p class="lead">Web ini digunakan untuk melihat real time data dari semua fungsi pada aplikasi ESS kami untuk keperluan Thesis.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>TRANSACTION </h4>
                        <h4><span class="badge badge-primary"></span></h4>
                        <div class="card-header-action">
                            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-secondary" href="#"><i
                                    class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="mycard-collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                
            </div>
        </div>
    </section>
</div>
@endsection