
@extends('admin.layout.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Contact Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact Message List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>ddress</th>
                                        <th>Edit</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contactus as $key => $con)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $con->call }}</td>
                                            <td>{{ $con->email }}</td>
                                            <td>{{ $con->address }}</td>
                                            <td>
                                                <a href="{{ route('contacts.edit', $con->id) }}" class="btn btn-success text-center"><i class="fas fa-edit"></i></a>
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

    </section>
@endsection

