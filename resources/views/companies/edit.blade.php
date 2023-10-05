@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit company') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-secondary" href="{{ route('companies.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
            <br><br>

            <form method="POST" action="{{ route('companies.update', $company->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input value="{{ $company->name }}" name="name" type="text" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input value="{{ $company->email }}" name="email" type="email" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Foundation year</label>
                    <input value="{{ $company->foundation_year }}" name="foundation_year" type="number" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <br>
                    <textarea name="description" id="exampleInputPassword1" cols="30" rows="5">{{ $company->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
@endsection
