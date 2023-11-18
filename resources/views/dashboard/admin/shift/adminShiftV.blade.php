@extends('dashboard.layout.layoutdashboard')

@section('content')
    <h3 class="text-center mt-5 mb-5">Shift</h3>
    <div class="row justify-content-center align-items-start" style="height: 100%">
        <div class="col-lg-6">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <a href="/dashboard/shift/create" class="btn btn-success">New Shift</a>
            <table class="table table-striped text-center mt-5 table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" class="text-start">Name</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shifts as $shift)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-start">{{ $shift->name }}</td>
                            <td>{{ $shift->start }}</td>
                            <td>{{ $shift->end }}</td>
                            <td><a href="/dashboard/shift/{{ $shift->id }}/edit"
                                    class="badge btn btn-warning me-2 text-dark">Edit</a>
                                <form action="/dashboard/shift/{{ $shift->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0 text-dark"
                                        onclick="return confirm('Do You Want to delete?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
