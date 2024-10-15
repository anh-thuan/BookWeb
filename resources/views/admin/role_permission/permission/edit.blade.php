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
                        <h4 class=".card-title">EDIT PERMISSION</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('permission/update', $permission->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name"
                                    class="form-control form-control-sm" placeholder="" value="{{$permission->name}}">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-control form-control-sm" placeholder="" value="{{$permission->slug}}">
                                @error('slug')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description"
                                    rows="5">{{$permission->description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">EDIT</button>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">PERMISSION LIST</h4>
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
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach($permissions as $key => $permission)
                                        <tr>
                                            <td scope="row"></td>
                                            <td><strong>Module {{ucfirst($key)}}</strong></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach($permission as $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>|---{{$item->name}}</td>
                                            <td>{{$item->slug}}</td>
                                            <td>
                                                <a href="{{route('permission/edit', $item->id)}}" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                                
                                                <a href="{{route('permission/delete', $item->id)}}" onclick="return confirm('Do you want to delete it???')" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
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