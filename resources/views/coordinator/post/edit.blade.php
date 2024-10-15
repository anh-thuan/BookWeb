@extends('layouts/admin')
@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">ADD COMMMENT AND STATUS</h4>
                        <a href="{{url('coordinator/post/list')}}" class="btn btn-primary">BACK</a>
                        {{-- <p class="text-muted mb-0">
                            By adding <code>.row</code> & <code>.g-2</code>, you can have control over the
                            gutter width in as well the inline as block direction.
                        </p> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{route('post/update', $post->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control" id="comment" name="comment" rows="5">{{$post->comment}}</textarea>
                            </div>

                            <label for="category_id" class="form-label">Status</label>
                            <select class="form-select mb-3" name="status" id="category_id">
                                <option selected>Select Status</option>
                                    @foreach(['pending', 'approved', 'rejected'] as $status)
                                        <option value="{{ $status }}" >
                                            {{ ucfirst($status) }}
                                        </option>
                                    @endforeach
                            </select>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="popular" name="popular" value="1">
                                <label class="form-check-label" for="popular">Popular</label>
                            </div>
                            <br>
                            
                            <button type="submit" class="btn btn-primary">EDIT</button>
                        </form>

                    </div>
                </div> 
            </div> 
        </div>


    </div>
@endsection