@extends('layouts/admin')
@section('connect-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session ('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <a href="{{url('admin/user/add')}}" class="btn btn-primary">ADD USER</a>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th data-priority="1">ID</th>
                                        <th data-priority="3">Username</th>
                                        <th data-priority="1">Phone</th>
                                        <th data-priority="1">Email</th>
                                        <th data-priority="3">Role</th>
                                        <th data-priority="3">Action</th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $t=1;
                                        @endphp
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{$t++}}</td>
                                                <td>{{$user->role->code ?? 'None'}}-{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if($user->count() > 0)
                                                        <span class="badge bg-success">{{$user->role->name ?? 'None'}}</span>
                                                    @else
                                                        <span class="badge bg-primary">Not yet!!!</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('user/edit', $user->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                    @if(Auth::id() != $user->id)
                                                    <a href="{{route('user/delete', $user->id)}}" onclick="return confirm('Do you want to delete it???')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive -->

                        </div> <!-- end .table-rep-plugin-->
                    </div> <!-- end .responsive-table-plugin-->
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
</div>

@endsection