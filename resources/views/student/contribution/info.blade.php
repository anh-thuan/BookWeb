@extends('layouts/admin')
@section('connect-content')
<div class="row">
    <div class="col-sm-12">
        <div class="profile-bg-picture" style="text-align: center;">
            <img src="{{asset($contribution->thumbnail)}}" style="display: inline-block;" alt="">
        </div>
        <div class="p-sm-3 p-0 profile-user">
            <div class="row g-2">
                <div class="col-lg-3  d-none d-lg-block">
                    <div class="profile-user-img p-2 text-start">
                        <img src="{{asset('storage/' . $contribution->user->profile_photo_path) }}" alt="" class="img-thumbnail avatar-lg rounded">
                    </div>
                    <div class="text-start p-1 pt-2">
                        <h4 class=" fs-17 ellipsis">{{$contribution->user->name}}</h4>
                        <p class="font-13">{{$contribution->class->name}}</p>
                        {{-- <p class="text-muted mb-0"><small>California, United States</small></p> --}}

                        {{-- <div class="d-flex pt-3 align-items-center justify-content-center flex-xl-nowrap flex-lg-wrap justify-content-md-start">
                            <button type="button" class="btn btn-soft-danger me-sm-2 mt-1">
                                <i class="mdi mdi-cog align-text-bottom me-1 fs-16 lh-1"></i>
                                Edit Profile
                            </button>
                            <button class="btn btn-soft-info mt-1" href="#"> <i class="mdi mdi-check-all fs-18 me-1 lh-1"></i>Following</button>
                        </div> --}}


                    </div>
                    <div class="pt-3 ps-2">
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{$contribution->user->name}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Banner ID : </strong><span class="ms-2">{{$contribution->user->role->code}}-{{$contribution->user_id}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Faculty :</strong> <span class="ms-2">{{$contribution->class->faculty->name}}</span></p>

                        <p class="text-muted mb-1 font-13"><strong>Semester : </strong> <span class="ms-2">{{$contribution->semester->name}}</span></p>
                    </div>

                    {{-- <div class="text-start mt-4">
                        <h4 class="">Fllow On:</h4>
                        <div class="d-flex gap-2 mt-3">
                            <a href="javascript: void(0);" class="btn px-2 py-1 btn-soft-primary"><i class="mdi mdi-facebook"></i></a>
                            <a href="javascript: void(0);" class="btn px-2 py-1 btn-soft-danger"><i class="mdi mdi-google-plus"></i></a>
                            <a href="javascript: void(0);" class="btn px-2 py-1 btn-soft-info"><i class="mdi mdi-twitter"></i></a>
                            <a href="javascript: void(0);" class="btn px-2 py-1 btn-soft-dark"><i class="mdi mdi-github"></i></a>
                        </div>
                    </div> --}}
                </div>

                <div class="col-lg-9 bg-light-subtle">
                    <div class="profile-content">
                        <div class="nav nav-pills nav-justified gap-0 p-3 text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            </li>
                            <li class="nav-item mt-2"><a class="nav-link fs-5 p-2 active" data-bs-toggle="tab" data-bs-target="#aboutme" type="button" role="tab" aria-controls="home" aria-selected="true" href="#aboutme">About</a>
                            </li>
                            {{-- <li class="nav-item mt-2"><a class="nav-link fs-5 p-2" data-bs-toggle="tab" data-bs-target="#edit-profile" type="button" role="tab" aria-controls="home" aria-selected="true" href="#edit-profile">Settings</a></li> --}}
                        </div>

                        <div class="tab-content m-0 p-2 p-sm-4 " id="v-pills-tabContent">

                            <div class="tab-pane active" id="aboutme" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <div class="profile-desk">
                                    <h5 class="text-uppercase fs-17 text-dark">{{$contribution->name}}</h5>
                                    <div class="designation mb-3">Category: {{$contribution->category->name}}</div>
                                    <div class="designation mb-3">Submitted_Date: {{$contribution->created_at}}</div>
                                    <p class="text-muted fs-16">
                                        Content: {{$contribution->content}}
                                    </p>
                                    <p class="text-muted fs-16">
                                        <a href="{{route('studentinfo/showfile', ['contribution' => $contribution]) }}">{{ $contribution->upload_file }}</a>
                                    </p>

                                    <h5 class="mt-4 fs-17 text-dark">Coordinator</h5>
                                    <table class="table table-condensed table-bordered mb-0 border-top table-striped">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Name</th>
                                                <td>
                                                    {{$contribution->class->user->name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Comment Date</th>
                                                <td>
                                                    {{$contribution->updated_at}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Status</th>
                                                <td>
                                                    @if($contribution->status == 'approved')
                                                    <span class="badge bg-success">{{$contribution->status}}</span><br>
                                                    @elseif($contribution->status == 'rejected')
                                                    <span class="badge bg-danger">{{$contribution->status}}</span><br>
                                                    @else
                                                    <span class="badge bg-warning">{{$contribution->status}}</span><br>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Comment</th>
                                                <td>
                                                    {{$contribution->comment}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end profile-desk -->
                            </div> <!-- about-me -->

                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane">
                                <div class="user-profile-content">
                                    <form>
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <div class="mb-2">
                                                <label class="form-label" for="FullName">Full
                                                    Name</label>
                                                <input type="text" value="John Doe" id="FullName" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Email">Email</label>
                                                <input type="email" value="first.last@example.com" id="Email" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="web-url">Website</label>
                                                <input type="text" value="Enter website url" id="web-url" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Username">Username</label>
                                                <input type="text" value="john" id="Username" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="Password">Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="Password" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="RePassword">Re-Password</label>
                                                <input type="password" placeholder="6 - 15 Characters" id="RePassword" class="form-control">
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label class="form-label" for="AboutMe">About Me</label>
                                                <textarea style="height: 125px;" id="AboutMe" class="form-control">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-content-save-outline me-1 fs-16 lh-1"></i> Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection