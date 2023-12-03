@extends('template.template')

@section('content')
    @include('template.sub-menu-dosen')

    <div class="col-lg-10">
        <div class="card animate__animated animate__fadeInRight">
            <div class="card-body">
                <h3 class="page-title mb-3">Profile Dosen</h3>

                <table class="table table-striped table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Closed items</th>
                            <th>Open Items</th>
                            <th>process</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>IOS</td>
                            <td>5 <i class="fa fa-arrow-up text-success me-1 font-size-10"></i><small
                                    class=" font-size-10">60%</small> </td>
                            <td>3 <i class="fa fa-arrow-down text-danger me-1 font-size-10"></i><small
                                    class=" font-size-10">40%</small> </td>
                            <td>
                                <div class="progress" style="height:8px;">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="38"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 38%;"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
