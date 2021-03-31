@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="card">
    <h5 class="card-header">Dashboard</h5>
        <div class="card-body">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
                <div class="row">
                    <div class="col-sm-4">
                        <div class="brand-card">
                            <div class="brand-card-header bg-blue">
                                <i class="fa fa-ticket"></i>
                            </div>
                            <div class="brand-card-body">
                                <div>
                                    <div class="text-value"><h1>{{ number_format($totalTickets) }}</h1></div>
                                    <div class="text-uppercase text-muted small">Total Tickets</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="brand-card">
                            <div class="brand-card-header bg-yellow">
                                <i class="fa fa-warning"></i>
                            </div>
                            <div class="brand-card-body">
                                <div>
                                    <div class="text-value"><h1>{{ number_format($openTickets) }}</h1></div>
                                    <div class="text-uppercase text-muted small">Tickets Abiertos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="brand-card">
                            <div class="brand-card-header bg-green">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div class="brand-card-body">
                                <div>
                                    <div class="text-value"><h1>{{ number_format($closedTickets) }}</h1></div>
                                    <div class="text-uppercase text-muted small">Tickets Cerrados</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
@section('scripts')
@parent

@endsection