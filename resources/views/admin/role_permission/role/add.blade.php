@extends('layouts/admin')
@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">ADD ROLE</h4>
                        <a href="{{url('admin/role/list')}}" class="btn btn-primary">BACK</a>
                        {{-- <p class="text-muted mb-0">
                            By adding <code>.row</code> & <code>.g-2</code>, you can have control over the
                            gutter width in as well the inline as block direction.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('admin/role/store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}"
                                    placeholder="Please input code">
                                @error('code')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                    placeholder="Please input name">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="5">{{old('description')}}</textarea>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h4 class=".card-title mt-5 mt-lg-0">Permission</h4>
                                    {{-- <p class="text-muted mb-0">
                                        Each checkbox and radio <code>&lt;input&gt;</code> and
                                        <code>&lt;label&gt;</code> pairing is wrapped in a <code>&lt;div&gt;</code> to
                                        create our custom control. Structurally, this is the same approach as our
                                        default <code>.form-check</code>.
                                    </p> --}}
                                </div>
                                <div class="card-body">
                                    @foreach($permissions as $moduleName => $modulePermission)
                                    <h6 class="fs-15 mt-3"><strong>Module {{ucfirst($moduleName)}}</strong></h6>
                                        @foreach($modulePermission as $permission)
                                        <div class="mt-2">
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" class="form-check-input" id="" value="{{$permission->id}}" name="permission_id[]" id="{{$permission->slug}}">
                                                <label class="form-check-label" for="{{$permission->slug}}">{{$permission->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endforeach
                                </div> 
                            </div>


                            <button type="submit" class="btn btn-primary">ADD</button>
                        </form>

                    </div>
                </div> 
            </div> 
        </div>


    </div>
@endsection