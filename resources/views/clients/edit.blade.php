@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit client') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <a class="btn btn-secondary" href="{{ route('clients.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
            <br><br>

            <form method="POST" action="{{ route('clients.update', $client->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input value="{{ $client->name }}" name="name" type="text" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Surname</label>
                    <input value="{{ $client->surname }}" name="surname" type="text" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input value="{{ $client->email }}" name="email" type="email" class="form-control w-25" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <select class="form-control w-25" id="films" name="companies[]" multiple>
                    @foreach(App\Models\Company::all() as $company)
                        <option {{ in_array($company->name, array_column($client->companies->toArray(), 'name')) ? 'selected' : '' }}>{{ $company->name }}</option>
                    @endforeach
                </select><br/><br/>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
@endsection
