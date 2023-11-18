@extends('dashboard.layout.layoutdashboard')

@section('content')
    <h3 class="text-center mt-5 mb-5">Log</h3>
    <div class="row justify-content-center align-items-start" style="height: 100%">
        <div class="col-lg-8">
            <table class="table table-striped text-center mt-5">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Date</th>
                        <th scope="col">Card ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Shift</th>
                        <th scope="col">In</th>
                        <th scope="col">Out</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                @inject('Carbon', 'Carbon\Carbon')
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-start">{{ $Carbon::parse($log->in)->format('l, j F Y') }}</td>
                            <td>{{ $log->card_id }}</td>
                            <td>{{ $log->name }}</td>
                            <td>{{ $log->user->shift->start . ' - ' . $log->user->shift->end }}</td>
                            <td>{{ $Carbon::parse($log->in)->toTimeString() }}</td>
                            <td>{{ $Carbon::parse($log->out)->toTimeString() }}</td>
                            <td>{{ $Carbon::parse($log->in)->subMinutes(30)->format('His') <= $Carbon::parse($log->user->shift->start)->format('His')? 'Tepat Waktu': 'Terlambat' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $logs->links() }}
        </div>
    </div>
@endsection
