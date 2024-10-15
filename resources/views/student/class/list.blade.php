@extends('layouts/admin')
@section('connect-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session ('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <a href="" class="btn btn-primary">CLASS LIST</a>
                    <div class="responsive-table-plugin">
                        <div class="table-rep-plugin">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Num</th>
                                        <th data-priority="1">Class</th>
                                        <th data-priority="3">Semester</th>
                                        <th data-priority="1">Coordinator</th>
                                        <th data-priority="1">Faculty</th>
                                    </thead>
                                    <tbody>
                                        @php
                                        $t=1;
                                        @endphp
                                        @foreach ($classes as $class)
                                            <tr>
                                                <th scope="row">{{$t++}}</th>
                                                {{-- <td><a href="{{ route('student/login', ['class' => $class]) }}">{{$class->name ?? 'None'}}</a></td> --}}
                                                <td><a href="{{route('class/contribution', ['class' => $class])}}">{{$class->name ?? 'None'}}</a></td>
                                                <td>{{$class->semester->name}}</td>
                                                <td>{{$class->user->name}}</td>
                                                <td>{{$class->faculty->name}}</td>
                                            </tr>
                                        @endforeach  
                                    </tbody>
                                </table>
                            </div> <!-- end .table-responsive -->

                        </div> <!-- end .table-rep-plugin-->
                    </div> <!-- end .responsive-table-plugin-->
                </div>
                
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
</div>

@endsection