@extends('layouts/admin')

@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    @if (session ('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h4 class=".card-title">EDIT SEMESTER</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('semester/update', $semester->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control form-control-sm" placeholder="" value="{{$semester->name}}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="5">{{$semester->description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start_Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{$semester->start_date}}">
                                @error('start_date')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">End_Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{$semester->end_date}}">
                                @error('end_date')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">EDIT</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">SEMESTER LIST</h4>
                        {{-- <p class="text-muted mb-0">
                            Use <code>.table-striped</code> to add zebra-striping to any table row
                            within the <code>&lt;tbody&gt;</code>.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-sm">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th>Name</th>
                                        {{-- <th>Description</th> --}}
                                        <th>Start_Date</th>
                                        <th>End_Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($semesters as $key => $semester)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$semester->name}}</td>
                                            <td>{{$semester->start_date}}</td>
                                            <td>{{$semester->end_date}}</td>
                                            <td>
                                                <a href="{{route('semester/edit', $semester->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                <a href="{{route('semester/delete', $semester->id)}}" onclick="return confirm('Do you want to delete it???')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
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