@extends('admin.main.default')
@section('main-content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ticket History</h4>
            <div class="text-center">
                @if(Session::has('deleted'))
                <div class="alert alert-danger">
                    {{ Session::get('deleted') }}
                </div>
                @endif
            </div>
            <div class="text-center">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    <img style="width: 40px;" class="rounded-circle" src="{{ asset('admin/images/done.gif') }}"
                        alt="img">
                    {{ Session::get('success') }}
                </div>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>User Number</th>
                            <th>Problem Category</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            @if ($d->ticket_status == '1')
                            <td>{{ $d->user_name }}</td>
                            <td>{{ $d->user_number }}</td>
                            <td>{{ $d->category }}</td>
                            <td>
                                <span class="badge rounded-pill bg-success text-light fw-bold">Accepted</span>
                            </td>
                            <td>
                                <a class="btn btn-danger text-light fw-bold"
                                    href="{{ url('ticket/make-pending').'/'.$d->ticket_id }}">Make Pending</a>
                                <button type="button" class="btn btn-info text-light fw-bold" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">See Details</button>
                            </td>
                            @else
                            <td colspan="5" class="text-center">Check Pending Request</td>
                            @endif
                        </tr>
                        <!-- Details Modal Start-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title fs-5" id="exampleModalLabel">Complain Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h5>User Name: {{ $d->user_name }}</h5> <br>
                                        <h5>User Number: {{ $d->user_number }}</h5> <br>
                                        <h5>User Status:
                                            @if ($d->ticket_status == '0')
                                            <span class="badge rounded-pill bg-info text-light fw-bold">Pending</span>
                                            @else
                                            <span
                                                class="badge rounded-pill bg-success text-light fw-bold">Accepted</span>
                                            @endif
                                        </h5> <br>
                                        <h5>User Address: {{ $d->user_address }}</h5> <br>
                                        <h5 class="text-center mt-2">Complaint Details</h5>
                                        <p>{{ $d->ticket_message }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Details Modal End-->
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
