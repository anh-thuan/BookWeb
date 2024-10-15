@extends('layouts/admin')
@section('connect-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">My History List</h4>
                        {{-- <p class="text-muted mb-0">
                            Add <code>.table-bordered</code> & <code>.border-primary</code> can be added to
                            change colors.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-bordered border-primary table-centered mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th>Post_Name</th>
                                        <th>Post_Date</th>
                                        <th>Delete_Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $t=1;
                                    @endphp
                                    @foreach($histories as $history)
                                    <tr>
                                        <td scope="row">{{$t++}}</td>
                                        <td>{{$history->name}}</td>
                                        <td>{{$history->created_at}}</td>
                                        <td>{{$history->deleted_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>

@endsection