@extends('layouts/admin')
@section('connect-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=".card-title">Message List</h4>
                    {{-- <p class="text-muted fs-14 mb-0">
        
                    </p> --}}
                </div>
                <div class="card-body">
                    @forelse(auth()->user()->notifications as $notification)
                        <div class="alert alert-primary d-flex justify-content-between align-items-center" role="alert">
                            <i class="mdi mdi-alert-circle-outline me-1 fs-16"></i>
                            <span>[{{ $notification->updated_at }}] ({{ $notification->data['user_email']}}) {{ $notification->data['user_code'] }}-{{ $notification->data['user_id'] }}: {{ $notification->data['user_name'] }} </span>
                            <a href="#" class="mark-as-read" data-id="{{ $notification->id }}"><p class="mb-0 text-danger">Mark As Read</p></a>
                        </div>
                        @if($loop->last)
                            <a href="#" id="mark-all"> 
                                <p class="text-center">Mark all as read</p>
                            </a>
                        @endif
                    @empty
                        <div class="flex-grow-1 text-truncate ms-2">
                            There are no messages
                        </div>
                    @endforelse
                </div> <!-- end card-body-->                
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> <!-- end row-->


    

</div> <!-- container -->
@endsection