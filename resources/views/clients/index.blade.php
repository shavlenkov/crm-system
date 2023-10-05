@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Clients') }}</h1>
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

                    <a href="{{ route('clients.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Create</a>
                    <br><br>
                    <div class="card">
                        <div class="card-body p-0">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Companies</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->surname }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>
                                            @foreach($client->companies as $company)
                                                {{ $company->name }} <br>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                                <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
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
                            {{ $clients->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content -->
@endsection
