@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Dashboard') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ count(\App\Models\User::all()) }}</h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                        <a href="{{ route('users.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ count(\App\Models\Company::all()) }}</h3>

                            <p>Companies</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-building"></i>
                        </div>
                        <a href="{{ route('companies.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ count(\App\Models\Client::all()) }}</h3>

                            <p>Clients</p>
                        </div>
                        <div class="icon">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <a href="{{ route('clients.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->

                <!-- ./col -->
            </div>
        </div>
    </section>

@endsection
