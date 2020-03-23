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
                                                    <th>Clock in</th>
                                                    <th>Clock Out</th>
                                                    <th>Location in</th>
                                                    <th>Location out</th>
                                                    <th>Reason in</th>
                                                    <th>Reason out</th>
                                                    <th>Date in</th>
                                                    <th>Date out</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $no = 1;
                                                @endphp

                                                {{-- CUTI STATUS D = DRAFT | A = APPROVED | C = CANCEL | R = REJECT --}}
                                                @foreach ($absensi_data as $row)

                                                <tr>
                                                    <td class="text-center">{{ $no++ }}</td>
                                                    <td>{{ $row->user->name }}</td>
                                                    <td>{{ $row->clock_in }}</td>
                                                    <td>{{ $row->clock_out }}</td>
                                                    <td>{{ $row->location_in }}</td>
                                                    <td>{{ $row->location_out }}</td>
                                                    <td>{{ $row->reason_in }}</td>
                                                    <td>{{ $row->reason_out }}</td>
                                                    <td>{{ Carbon\Carbon::parse($row->date_in)->format('d-m-Y') }}</td>
                                                    <td>{{ Carbon\Carbon::parse($row->date_out)->format('d-m-Y') }}</td>
                                                    <td class="text-center">
                                                        @if ($row->status == 'I')
                                                            <span class="badge badge-danger">Clock in</span>
                                                        @elseif($row->status == 'O')
                                                            <span class="badge badge-success">Clock Out</span>
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