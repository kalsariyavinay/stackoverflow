@extends('admin.layout.app')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>JobPost</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">JobPost</li>
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
                                JobPost List
                            </h3>
                            <a href="{{ route('job.create') }}" class="float-right btn btn-warning"><b>Add</b></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped border">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Job Titel</th>
                                        <th>Company Name</th>
                                        <th>Company Logo</th>
                                        <th>Email Address</th>
                                        <th>Location</th>
                                        <th>Date/Time</th>
                                        <th>Action Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobs as $key => $job)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $job->job_title }}</td>
                                            <td>{{ $job->company_name }}</td>
                                            <td><img src="{{ asset($job->company_logo) }}" alt="" width="50px"
                                                    height="50px"></td>
                                            <td>{{ $job->email }}</td>
                                            <td>{{ $job->location }}</td>
                                            <td>{{ get_formatted_date($pac->created_at, 'd-m-y') }}</td>
                                            <td>
                                                <a href="{{ route('job.edit', $job->id) }}" class="btn btn-success"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('job.delete', $job->id) }}" class="btn btn-danger"><i
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
