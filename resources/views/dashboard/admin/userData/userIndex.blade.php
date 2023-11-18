@extends('dashboard.layout.layoutdashboard')

@section('content')
    <h3 class="text-center mt-5 mb-5">User</h3>
    <div class="row justify-content-center align-items-start" style="height: 100%">
        <div class="col-lg-7">
            @if (session()->has('success'))
                <p class="card text-center mx-5 mt-3 mb-1"
                    style="font-weight: 700; background-color:rgba(17, 255, 0, 0.6)">{{ session('success') }}
                </p>
            @endif
            <table class="table table-striped text-center mt-5 table-responsive">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col" class="text-start">Name</th>
                        <th scope="col" class="text-start">Username</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Card ID</th>
                        <th scope="col">Shift Name</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-start">{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->card_id }}</td>
                            <td>{{ ($user->shift_id) ? $user->shift->name : "" }}</td>
                            <td>{{ ($user->is_admin) ? "Yes" : "No" }}</td>
                            <td><a href="/dashboard/user/{{ $user->id }}/edit"
                                    class="badge btn btn-warning me-2 text-dark">Edit</a>
                                <form action="/dashboard/user/{{ $user->id }}" method="POST" class="d-inline">
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
            {{ $users->links() }}
        </div>
    </div>
@endsection
