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
                        <h4 class=".card-title">ADD STUDENT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('coordinator/student/store')}}" method="POST">
                            @csrf
                            <label for="user_id" class="form-label">Student</label>
                            <select class="form-select mb-3" name="user_id" id="user_id">
                                <option selected>Select Student</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">
                                            {{$user->role->name}}-{{$user->name}}-{{$user->id}}
                                        </option>
                                    @endforeach
                            </select>
                            @error('user_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror<br>

                            <label for="class_id" class="form-label">Class</label>
                            <select class="form-select mb-3" name="class_id" id="class_id">
                                <option selected>Select Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">
                                            {{$class->name}}
                                        </option>
                                    @endforeach
                            </select>
                            @error('class_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror<br>

                            <button type="submit" class="btn btn-primary">ADD</button>
                        </form>

                        <div class="form-group mt-3">
                            <label for="">MY CLASS</label><br>
                            @foreach($classes as $class)
                            <a href="#" class="class-link" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$class->id}}">{{$class->name}}</a><br>
                            @endforeach
                        </div>

                        @foreach($classes as $class)
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{$class->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">{{$class->name}}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Faculty: {{$class->faculty->name}}</p>
                                        <p>Coordinator: {{$class->user->name}}</p>
                                        <p>Semester: {{$class->semester->name}}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach   

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">STUDENT LIST</h4>
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
                                        <th>Class</th>
                                        <th>Faculty</th>
                                        <th>Semester</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($students as $student)
                                        <tr>
                                            <td scope="row">{{$i++}}</td>
                                            <td>{{$student->user->name}}</td>
                                            <td>{{$student->class->name}}</td>
                                            <td>{{$student->class->faculty->name}}</td>
                                            <td>{{$student->class->semester->name}}</td>
                                            <td>
                                                <a href="{{route('student/edit', $student->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                                <a href="{{route('student/delete', $student->id)}}" onclick="return confirm('Do you want to delete it???')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
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