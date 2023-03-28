@extends('admin.layout.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Package</li>
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
                        <div class="card-header">
                            <h3 class="card-title">
                                Package List
                            </h3>
                            <a href="{{ route('package.create') }}" class="float-right btn btn-warning"><b>Add</b></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Titel</th>
                                        <th>Company Logo</th>
                                        <th>Price</th>
                                        <th>Total Job Post</th>
                                        <th>Is Published</th>
                                        <th>Date/Time</th>
                                        <th>Action Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($package as $key => $pac)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $pac->title }}</td>
                                            <td><img src="{{ asset($pac->logo) }}" alt="" width="50px"
                                                    height="50px"></td>
                                            <td>{{ $pac->price }}</td>
                                            <td>{{ $pac->total_job_post }}</td>
                                            <td>
                                                @if ($pac->is_published == 1)
                                                    <a href="{{ route('package.status_update', [$pac->id, 0]) }}"
                                                        class="btn btn-danger">Hide</a>
                                                @else
                                                    <a href="{{ route('package.status_update', [$pac->id, 1]) }}"
                                                        class="btn btn-success">Show</a>
                                                @endif
                                            </td>
                                            <td>{{ get_formatted_date($pac->created_at, 'd-m-y') }}</td>
                                            <td>
                                                <a href="{{ route('package.edit', $pac->id) }}" class="btn btn-success"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('package.delete', $pac->id) }}" class="btn btn-danger"><i
                                                        class="fas fa-trash"></i></a>
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
