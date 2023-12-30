@extends('admin.main.default')
@section('main-content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                Ticket History
            </h4>
            <div class="text-center">
                @if(Session::has('deleted'))
                <div class="alert alert-danger">
                    {{ Session::get('deleted') }}
                </div>
                @endif
            </div>
            <div class="table-responsive">


                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>Problem Category</th>
                            <th>Message</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            @if ($d->user_id == Session::get('user_id'))
                            <td>{{ $d->category }}</td>
                            <td>{{ $d->ticket_message }}</td>
                            <td>
                                @if ($d->ticket_status == '0')
                                <span class="badge rounded-pill bg-info text-light fw-bold">Pending</span>
                                @else
                                <span class="badge rounded-pill bg-success text-light fw-bold">Accepted</span>
                                @endif
                            </td>
                            @endif
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- Details Modal Start-->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="exampleModalLabel">Admin Response</h4>
            </div>
            <div class="modal-body">
                @foreach ($response as $r)
                @if ($r->client_id == Session::get('user_id'))
                <h6>
                    <div class="text-center">
                        <span>--------- {{ $r->response_created_at }} ---------</span>
                    </div>
                    <img style="width: 30px;" class="rounded-circle border border-3"
                        src="{{ asset('admin/images/admin.gif') }}" alt="img">
                    {{ $r->admin_name }}<img style="width: 20px;" class="mt-3"
                        src="{{ asset('admin/images/arrow.png') }}" alt="img">
                </h6>
                <p style="margin-left: 130px">{{ $r->response_messages }}</p>
                @endif
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Details Modal End-->
