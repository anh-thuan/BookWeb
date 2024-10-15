@extends('layouts/admin')
@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">ADD CONTRIBUTION</h4>
                        <a href="{{route('class/contribution', ['class' => $class])}}" class="btn btn-primary">BACK</a>
                        {{-- <p class="text-muted mb-0">
                            By adding <code>.row</code> & <code>.g-2</code>, you can have control over the
                            gutter width in as well the inline as block direction.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('class/contributionstore', ['class' => $class])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                                    placeholder="Please input Title">
                                @error('name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select mb-3" name="category_id" id="category_id">
                                <option selected>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                        </option>
                                    @endforeach
                            </select>
                                @error('category_id')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror<br>
                            
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content"
                                    rows="5">{{old('content')}}</textarea>
                                @error('content')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deadline</label>
                                <input type="text" class="form-control" disabled value="{{$class->semester->end_date}}">
                            </div>

                            <div class="mb-3">
                                <label for="upload_file" class="form-label">Upload file-Required file: Doc, Docx</label>
                                <input type="file" id="upload_file" name="upload_file" class="form-control">
                                @error('upload_file')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror<br>
                            </div>

                            <div class="mb-3">
                                <label for="upload_image" class="form-label">Upload image</label>
                                <input type="file" id="upload_image" name="upload_image" class="form-control">
                                @error('upload_image')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                @enderror<br>
                            </div>

                            <div class=" mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="status" class="form-check-input" id="checkmeout0" value="pending">
                                    <label class="form-check-label" for="checkmeout0">I Agree with Term and Condition</label><br>
                                    @error('status')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
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