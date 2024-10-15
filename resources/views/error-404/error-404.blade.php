@extends('layouts/admin')
@section('connect-content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="d-flex flex-column align-items-center justify-content-center h-100 my-auto">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center">
                        <img src="{{asset('assets/images/svg/404.svg')}}" alt="" class="img-fluid h-100 w-100">
                        <h1 class="my-3 fs-48">404 Alt</h1>
                        <h3 class="fs-22">Page not found</h3>
                        <p class="text-muted mb-3 fs-16"> It's looking like you may have taken a wrong turn. Don't worry... it happens to the best of us.</p>

                        <a class="btn btn-soft-primary mt-3 w-100" href="{{url('dashboard')}}"><i class="ri-home-4-line me-1"></i> Back to Home</a>
                    </div> <!-- end /.text-center-->
                </div> <!-- end col-->
            </div>
        </div>
    </div> <!-- container -->
@endsection