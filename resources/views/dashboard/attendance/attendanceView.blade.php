@extends('dashboard.layout.layoutdashboard')

@section('content')

    <h3 class="text-center mt-5">Attendance Log</h3>

    <div class="row justify-content-center align-items-center" style="height: 100%">
        <div class="col-lg-6">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Card ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">In</th>
                    <th scope="col">Out</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Monday, 20 Oct 2023</td>
                    <td>1234</td>
                    <td>Otto</td>
                    <td>8:00</td>
                    <td>10:00</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Monday, 20 Oct 2023</td>
                    <td>1234</td>
                    <td>Otto</td>
                    <td>8:00</td>
                    <td>10:00</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>Monday, 20 Oct 2023</td>
                    <td>1234</td>
                    <td>Otto</td>
                    <td>8:00</td>
                    <td>10:00</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
@endsection
