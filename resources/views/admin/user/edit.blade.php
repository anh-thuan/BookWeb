@extends('layouts/admin')
@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">EDIT USER</h4>
                        <a href="{{url('admin/user/list')}}" class="btn btn-primary">BACK</a>
                        {{-- <p class="text-muted mb-0">
                            By adding <code>.row</code> & <code>.g-2</code>, you can have control over the
                            gutter width in as well the inline as block direction.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('user/update', $user->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"
                                    placeholder="Please input name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                {{-- <input type="password" class="form-control" id="password" name="password" value="{{$user->password}}"
                                    placeholder="Please input password"> --}}
                                <input type="password" class="form-control" id="password" name="password" 
                                placeholder="Please input password">
                                @error('password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}"
                                    placeholder="Please input email">
                                @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}"
                                    placeholder="Please input phone">
                                @error('phone')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <label for="role_id" class="form-label">Roles</label>
                            <select class="form-select form-select-lg mb-3" name="role_id" id="role_id">
                                <option selected>Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">
                                            {{$role->code}}-{{ $role->name }}
                                        </option>
                                    @endforeach
                            </select>
                                @error('role_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            


                            <button type="submit" class="btn btn-primary">EDIT</button>
                        </form>

                    </div>
                </div> 
            </div> 
        </div>


    </div>
@endsection