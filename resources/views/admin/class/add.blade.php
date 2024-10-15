@extends('layouts/admin')
@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">ADD CLASS</h4>
                        <a href="{{url('admin/class/list')}}" class="btn btn-primary">BACK</a>
                        {{-- <p class="text-muted mb-0">
                            By adding <code>.row</code> & <code>.g-2</code>, you can have control over the
                            gutter width in as well the inline as block direction.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/class/store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                    placeholder="Please input name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <label for="user_id" class="form-label">Coordinator</label>
                            <select class="form-select mb-3" name="user_id" id="user_id">
                                <option selected>Select Coordinator</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">
                                            {{$user->name ?? 'None'}}
                                        </option>
                                    @endforeach
                            </select>
                            {{-- @error('user_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                            @enderror<br> --}}

                            
                            <label for="faculty_id" class="form-label">Faculty</label>
                            <select class="form-select mb-3" name="faculty_id" id="faculty_id">
                                <option selected>Select Faculty</option>
                                    @foreach($faculties as $faculty)
                                        <option value="{{$faculty->id}}">
                                            {{$faculty->name}}
                                        </option>
                                    @endforeach
                            </select>
                            {{-- @error('faculty_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror<br> --}}

                            <label for="semester_id" class="form-label">Semester</label>
                            <select class="form-select mb-3" name="semester_id" id="semester_id">
                                    @foreach($semesters as $semester)
                                        <option value="{{ $semester->id }}">
                                            {{$semester->name}}
                                        </option>
                                    @endforeach
                            </select>
                            {{-- @error('semester_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror<br> --}}

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="5">{{old('description')}}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">ADD</button>
                        </form>

                    </div>
                </div> 
            </div> 
        </div>


    </div>
@endsection