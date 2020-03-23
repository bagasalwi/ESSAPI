@extends('front.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        {{-- @if (Auth::user()->nik == null)
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-primary text-white">
                    <div class="hero-inner">
                        <h2>Hello, {{ Auth::user()->name }} !</h2>
                        <p class="lead">Sebelum melanjutkan transaksi, kamu harus melengkapi profil kamu terlebih
                            dahulu.</p>
                        <div class="mt-4">
                            <a href="{{ url('/myprofile/update/') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i
                                    class="far fa-user"></i> Lengkapi Profil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        @endif --}}
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero bg-info text-white">
                    <div class="hero-inner">
                        <h2>Welcome Back, ESS !</h2>
                        <p class="lead">Kamu bisa mengecek status kamar pada menu Status Kamar.</p>
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