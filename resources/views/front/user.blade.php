@extends('front.layouts.master')

@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>{{ $nav }}</h4>
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
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">
                                                        No
                                                    </th>
                                                    <th>Name</th>
                                                    <th>Nik</th>
                                                    <th>Posisi</th>
                                                    <th>Divisi</th>
                                                    {{-- <th>Role</th> --}}
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp

                                                {{-- CUTI STATUS D = DRAFT | A = APPROVED | C = CANCEL | R = REJECT --}}
                                                @foreach ($user_data as $row)

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->nik }}</td>
                                                    <td>{{ $row->posisi }}</td>
                                                    <td>{{ $row->divisi }}</td>
                                                    {{-- <td>{{ $row->role }}</td> --}}
                                                    <td class="text-center">
                                                        @if ($row->status == 'A')
                                                            <span class="badge badge-primary">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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