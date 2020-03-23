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
                                                    <th>Kategori</th>
                                                    <th>Tanggal</th>
                                                    <th>Tujuan</th>
                                                    <th>Reason</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp

                                                {{-- CUTI STATUS D = DRAFT | A = APPROVED | C = CANCEL | R = REJECT --}}
                                                @foreach ($transport_data as $row)

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>{{ $row->user->name }}</td>
                                                    <td>{{ $row->category }}</td>
                                                    <td>{{ $row->date }}</td>
                                                    <td>{{ $row->tujuan }}</td>
                                                    <td>{{ $row->reason }}</td>
                                                    <td class="text-center">
                                                        @if ($row->status == 'D')
                                                            <span class="badge badge-danger">Draft</span>
                                                        @elseif($row->status == 'A')
                                                            <span class="badge badge-success">Approved</span>
                                                        @elseif($row->status == 'C')
                                                            <span class="badge badge-warning">Cancel</span>
                                                        @elseif($row->status == 'R')
                                                            <span class="badge badge-info">Reject</span>
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