@extends('layouts/admin')
@section('connect-content')
<div class="container-fluid">
    <div class="row">
        @foreach($studentdashboard as $student)
            <div class="col-xl-4 col-lg-4 col-md-6">
                <a href="{{route('student/info', $student->id)}}">
                <div class="card">
                    <div class="position-relative img-overlay">
                        <img src="{{asset($student->thumbnail)}}" alt="" height="150" width="100%" class="object-fit-cover">
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <div class="mx-auto position-absolute z-3 start-50  translate-middle border border-5 border-white" style="top: 40%;">
                                <img src="{{asset('storage/' . $student->user->profile_photo_path) }}" alt="" class="avatar-md img-fluid">
                            </div>

                            <div class="pt-4">
                                <h4 class="mb-1">{{$student->user->name}}</h4>
                                <p class="mb-2">{{$student->name}}</p>
                                @if($student->status == 'approved')
                                <span class="badge bg-success">{{$student->status}}</span><br>
                                @elseif($student->status == 'rejected')
                                <span class="badge bg-danger">{{$student->status}}</span><br>
                                @else
                                <span class="badge bg-warning">{{$student->status}}</span><br>
                                @endif
                                <p class="mb-2">{{$student->class->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</div> <!-- container -->
@endsection