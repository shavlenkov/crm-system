@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Companies') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <a href="{{ route('companies.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Create</a>
                    <br><br>
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Foundation year</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                    <tr>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td>{{ $company->foundation_year }}</td>
                                        <td>{{ $company->description }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                <form method="POST" action="{{ route('companies.destroy', $company->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i> Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $companies->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
@endsection
