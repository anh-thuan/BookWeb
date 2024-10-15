<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Dashboard | Techmin - Bootstrap 5 Admin & Dashboard Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
	<meta content="Techzaa" name="author" />

	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Font awesome-->
    <script src="https://kit.fontawesome.com/1954a5386a.js" crossorigin="anonymous"></script>
	<!-- App favicon -->
	<link rel="shortcut icon" href="{{asset('assets/images/greenwich-small.jpg')}}">
	<!-- Daterangepicker css -->
	<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
	<!-- Vector Map css -->
	<link rel="stylesheet" href="{{asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}">
	<!-- Theme Config Js -->
	<script src="{{asset('assets/js/config.js')}}"></script>
	<!-- App css -->
	<link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
	<!-- Icons css -->
	<link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
		<!--Mark as read-->
		<script>
			$(document).ready(function() {
				$('.mark-as-read').click(function(e) {
					e.preventDefault(); // Prevent default link behavior
					var notificationId = $(this).data('id');
		
					$.ajax({
						url: '/markasread',
						method: 'POST',
						data: { id: notificationId },
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						success: function() {
							// Assuming successful update, remove the notification from UI
							$(this).closest('.notify-item').remove();
							markNotificationAsReadPermanently(notificationId);
						}.bind(this), // bind 'this' to maintain correct context
						error: function(xhr, status, error) {
							console.error(error);
							// Handle error if needed
						}
					});
				});
		
				// Function to handle click event for marking all notifications as read
				$('#mark-all-dropdown').click(function(e) {
					e.preventDefault();
					
					$.ajax({
						url: '/markallasread',
						method: 'POST',
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						success: function() {
							// Assuming successful update, remove all notifications from UI
							$('.notify-item').remove();
							markAllNotificationsAsReadPermanently();
						},
						error: function(xhr, status, error) {
							console.error(error);
							// Handle error if needed
						}
					});
				});
		
				// Function to mark a single notification as read permanently
				function markNotificationAsReadPermanently(notificationId) {
					var permanentlyReadNotifications = JSON.parse(localStorage.getItem('permanently_read_notifications')) || [];
					permanentlyReadNotifications.push(notificationId);
					localStorage.setItem('permanently_read_notifications', JSON.stringify(permanentlyReadNotifications));
				}
		
				// Function to mark all notifications as read permanently
				function markAllNotificationsAsReadPermanently() {
					var allNotificationIds = $('.mark-as-read').map(function() {
						return $(this).data('id');
					}).get();
					localStorage.setItem('permanently_read_notifications', JSON.stringify(allNotificationIds));
				}
		
				// Check if notification is permanently read and remove from UI
				$('.mark-as-read').each(function() {
					var notificationId = $(this).data('id');
					if (isNotificationPermanentlyRead(notificationId)) {
						$(this).closest('.notify-item').remove();
					}
				});
		
				// Function to check if notification is permanently read
				function isNotificationPermanentlyRead(notificationId) {
					var permanentlyReadNotifications = JSON.parse(localStorage.getItem('permanently_read_notifications')) || [];
					return permanentlyReadNotifications.includes(notificationId);
				}
			});
		</script>
		
	<!--Mark as read 2-->
		<script>
			$(document).ready(function() {
				$('.mark-as-read').click(function(e) {
					e.preventDefault(); // Prevent default link behavior
					var notificationId = $(this).data('id');

					$.ajax({
						url: '/markasread',
						method: 'POST',
						data: { id: notificationId },
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						success: function() {
							// Assuming successful update, remove the notification from UI
							$(e.target).closest('.alert').remove();
							markNotificationAsReadPermanently(notificationId);
						},
						error: function(xhr, status, error) {
							console.error(error);
							// Handle error if needed
						}
					});
				});

				$('#mark-all').click(function() {
					let request = sendMarkAllRequest();
					request.done(() => {
						// Assuming successful update, remove all notifications from UI
						$('div.alert').remove();
						markAllNotificationsAsReadPermanently();
					});
				});

				// Function to mark a single notification as read permanently
				function markNotificationAsReadPermanently(notificationId) {
					var permanentlyReadNotifications = JSON.parse(localStorage.getItem('permanently_read_notifications')) || [];
					permanentlyReadNotifications.push(notificationId);
					localStorage.setItem('permanently_read_notifications', JSON.stringify(permanentlyReadNotifications));
				}

				// Function to mark all notifications as read permanently
				function markAllNotificationsAsReadPermanently() {
					var allNotificationIds = $('.mark-as-read').map(function() {
						return $(this).data('id');
					}).get();
					localStorage.setItem('permanently_read_notifications', JSON.stringify(allNotificationIds));
				}

				// Check if notification is permanently read and remove from UI
				$('.mark-as-read').each(function() {
					var notificationId = $(this).data('id');
					if (isNotificationPermanentlyRead(notificationId)) {
						$(this).closest('.alert').remove();
					}
				});

				// Function to check if notification is permanently read
				function isNotificationPermanentlyRead(notificationId) {
					var permanentlyReadNotifications = JSON.parse(localStorage.getItem('permanently_read_notifications')) || [];
					return permanentlyReadNotifications.includes(notificationId);
				}
			});
		</script>
    	<!-- Begin page -->
	<div class="wrapper">

		<!-- ========== Topbar Start ========== -->
        <div class="navbar-custom">
            <div class="topbar container-fluid">
                <div class="d-flex align-items-center gap-1">

                    <!-- Topbar Brand Logo -->
                    <div class="logo-topbar">
                        <!-- Logo light -->
                        <a href="" class="logo-light">
                            <span class="logo-lg">
                                <img src="assets/images/logo.png" alt="logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/greenwich-small(dark).png" alt="small logo">
                            </span>
                        </a>

                        <!-- Logo Dark -->
                        <a href="" class="logo-dark">
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="dark logo">
                            </span>
                            <span class="logo-sm">
                                <img src="assets/images/greenwich-small.jpg" alt="small logo">
                            </span>
                        </a>
                    </div>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="button-toggle-menu">
                        <i class="mdi mdi-menu"></i>
                    </button>

                    <!-- Page Title -->
                    <h4 class="page-title d-none d-sm-block">Dashboards</h4>
                </div>

                <ul class="topbar-menu d-flex align-items-center gap-3">
                    <li class="dropdown d-lg-none">
                        <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="mdi mdi-magnify fs-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                            <form class="p-3">
                                <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            </form>
                        </div>
                    </li>

					<li class="dropdown notification-list">
						<a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="ri-mail-line fs-22"></i>
							<span class="noti-icon-badge badge text-bg-purple">
									<?php
										// Filter and count unread notifications
										$unreadNotifications = auth()->user()->notifications->whereNull('read_at');
										$unreadCount = $unreadNotifications->count();
										echo $unreadCount;
									?>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
							<div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
								<div class="row align-items-center">
									<div class="col">
										<h6 class="m-0 fs-16 fw-semibold">Messages</h6>
									</div>
									<div class="col-auto">
										<a href="#" id="mark-all-dropdown" class="text-dark text-decoration-underline">
											<small>Mark All as Read</small>
										</a>
									</div>
								</div>
							</div>
							<div style="max-height: 300px;" data-simplebar>
								<!-- item-->
								@forelse(auth()->user()->notifications as $notification)
									<a href="javascript:void(0);" data-id="{{ $notification->id }}" class="mark-as-read dropdown-item p-0 notify-item read-noti card m-0 shadow-none">
										<div class="card-body">
											<div class="d-flex align-items-center">
												<div class="flex-shrink-0">
													{{-- <div class="notify-icon">
														<img src="{{ isset($notification->profile_photo_path) ? asset('storage/' . $notification->profile_photo_path) : asset('storage/' . 'None') }}" alt="" height="150" width="150" class="img-fluid rounded-circle" />
													</div> --}}
												</div>
												<div class="flex-grow-1 text-truncate ms-2">
													<h5 class="noti-item-title fw-semibold fs-14">{{ $notification->data['user_code'] }}-{{ $notification->data['user_id'] }}<small class="fw-normal text-muted float-end ms-1">{{ $notification->updated_at}}</small></h5>
													<small class="noti-item-subtitle text-muted">{{ $notification->data['user_name'] }}</small>
												</div>
											</div>
										</div>
									</a>
								@empty
									<div class="flex-grow-1 text-truncate ms-2">
										There are no messages
									</div>
								@endforelse
							</div>

							<!-- All-->
							<a href="javascript:void(0);" class="dropdown-item text-center text-primary text-decoration-underline fw-bold notify-item border-top border-light py-2">
								View All
							</a>
						</div>
					</li>

                    <li class="d-none d-sm-inline-block">
                        <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                            <span class="ri-settings-3-line fs-22"></span>
                        </a>
                    </li>

                    <li class="d-none d-sm-inline-block">
                        <div class="nav-link" id="light-dark-mode">
                            <i class="ri-moon-line fs-22"></i>
                        </div>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<span class="account-user-avatar">
								<img src="{{ Auth::user()->profile_photo_url }}" alt="" width="32" height="32" class="rounded-circle profile-photo">
							</span>							
                            <span class="d-lg-block d-none">
                                <h5 class="my-0 fw-normal"><span class="text-primary">{{Auth::user()->role->name ?? 'None'}}</span><span class="text-danger">-{{Auth::user()->name ?? 'None'}}</span><i class="ri-arrow-down-s-line fs-22 d-none d-sm-inline-block align-middle"></i></h5>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                            <!-- item-->
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="{{route('profile.show')}}" class="dropdown-item">
                                <i class="ri-account-pin-circle-line fs-16 align-middle me-1 "></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="pages-profile.html" class="dropdown-item">
                                <i class="ri-settings-4-line fs-16 align-middle me-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ri-logout-circle-r-line align-middle me-1"></i>
                                <span>Logout</span>
                            </a>
                            
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>
                            
                        </div>
                    </li>
                </ul>
            </div>
        </div>
<!-- ========== Topbar End ========== -->

		<!-- Left Sidebar Start -->
		<div class="leftside-menu">

		    <!-- Logo Light -->
		    <a href="{{url('dashboard')}}" class="logo logo-light">
		        <span class="logo-lg">
		            <img src="{{asset('assets/images/greenwich(dark).png')}}" style="width:200px; height:auto;" alt="logo">
		        </span>
		        <span class="logo-sm">
		            <img src="{{asset('assets/images/greenwich-small(dark).png')}}" alt="small logo">
		        </span>
		    </a>

		    <!-- Logo Dark -->
		    <a href="{{url('dashboard')}}" class="logo logo-dark">
		        <span class="logo-lg">
		            <img src="{{asset('assets/images/greenwich.jpg')}}" style="width:200px; height:auto;" alt="dark logo">
		        </span>
		        <span class="logo-sm">
		            <img src="{{asset('assets/images/greenwich-small.jpg')}}" alt="small logo">
		        </span>
		    </a>

		    <!-- Sidebar -->
		    <div data-simplebar>
		        <ul class="side-nav">
		            <li class="side-nav-title">{{Auth::user()->role->name ?? 'None'}}</li>

		            <li class="side-nav-item">
		                <a href="{{url('dashboard')}}" class="side-nav-link">
		                    <i class="ri-dashboard-2-line"></i>
		                    <span> Dashboard </span>
		                    {{-- <span class="badge bg-success float-end">9+</span> --}}
		                </a>
		            </li>

                    <!--User-->
					@canany(['user/list', 'user/add']) 
		            <li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
		                    <i class="mdi mdi-account-lock-open"></i>
		                    <span>User</span>
		                    <span class="menu-arrow"></span>
		                </a>
		                <div class="collapse" id="sidebarCharts">
		                    <ul class="side-nav-second-level">
								@can('user/list')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/user/list')}}">User List</a>
		                        </li>
								@endcan

								@can('user/add')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/user/add')}}">User Add</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

                    <!--Role-Permission-->
					@canany(['role/list', 'role/add', 'permission/add']) 
		            <li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
		                    <i class="ri-table-line"></i>
		                    <span>Role & Permission</span>
		                    <span class="menu-arrow"></span>

		                </a>
		                <div class="collapse" id="sidebarBaseUI">
		                    <ul class="side-nav-second-level">
								@can('role/list')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/role/list')}}">Role List</a>
		                        </li>
								@endcan

								@can('role/add')
                                <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/role/add')}}">Role Add</a>
		                        </li>
								@endcan

								@can('permission/add')
                                <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/permission/add')}}">Permission List</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

                    <!--Semester-->
					@canany(['semester/add']) 
                    <li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarPagesinvoice" aria-expanded="false" aria-controls="sidebarPagesinvoice" class="side-nav-link">
		                    <i class="ri-calendar-line"></i>
		                    <span>Semester</span>
		                    <span class="menu-arrow"></span>

		                </a>
		                <div class="collapse" id="sidebarPagesinvoice">
		                    <ul class="side-nav-second-level">
		                        {{-- <li class="side-nav-item">
		                            <a class="side-nav-link" href="apps-invoice-report.html">Semester List</a>
		                        </li> --}}
								@can('semester/add')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/semester/add')}}">Semester List</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

					<!--Category-->
					@canany(['category/add'])
					<li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
		                    <i class="ri-stack-line"></i>
		                    <span> Category </span>
		                    <span class="menu-arrow"></span>
		                </a>
		                <div class="collapse" id="sidebarPages">
		                    <ul class="side-nav-second-level">

								@can('category/add')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/category/add')}}">Category List</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

					<!--Faculty-->
					@canany(['faculty/add'])
		            <li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
		                    <i class="ri-account-circle-line"></i>
		                    <span>Faculty</span>
		                    <span class="menu-arrow"></span>

		                </a>
		                <div class="collapse" id="sidebarPagesAuth">
		                    <ul class="side-nav-second-level">

								@can('faculty/add')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/faculty/add')}}">Faculty List</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

					<!--Class-->
					@canany(['class/list', 'class/add'])
		            <li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
		                    <i class="ri-compass-3-line"></i>
		                    <span>Class</span>
		                    <span class="menu-arrow"></span>

		                </a>
		                <div class="collapse" id="sidebarExtendedUI">
		                    <ul class="side-nav-second-level">

								@can('class/list')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/class/list')}}">Class List</a>
		                        </li>
								@endcan

								@can('class/add')
								<li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('admin/class/add')}}">Class Add</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

<!--COORDINATOR-->
					<!--Student-->
					@canany(['student/add'])
		            <li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarIcons" aria-expanded="false" aria-controls="sidebarIcons" class="side-nav-link">
		                    <i class="ri-user-add-fill"></i>
		                    <span>Student</span>
		                    <span class="menu-arrow"></span>

		                </a>
		                <div class="collapse" id="sidebarIcons">
		                    <ul class="side-nav-second-level">

								@can('student/add')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('coordinator/student/add')}}">Student List</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

					<!--Post-->
					@canany(['post/list'])
					<li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarCharts" aria-expanded="false" aria-controls="sidebarCharts" class="side-nav-link">
		                    <i class="ri-pie-chart-2-line"></i>
		                    <span> My Post </span>
		                    <span class="menu-arrow"></span>
		                </a>
		                <div class="collapse" id="sidebarCharts">
		                    <ul class="side-nav-second-level">

								@can('post/list')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('coordinator/post/list')}}">Post List</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany
<!--STUDENT-->
					<!--Contribution-->
					@canany(['class/show'])
					<li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarForms" aria-expanded="false" aria-controls="sidebarForms" class="side-nav-link">
		                    <i class="ri-survey-line"></i>
		                    <span>My Contribution</span>
		                    <span class="menu-arrow"></span>

		                </a>
		                <div class="collapse" id="sidebarForms">
		                    <ul class="side-nav-second-level">

								@can('class/show')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('student/class/show')}}">Contribution List</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany

					<!--History-->
					{{-- @canany(['semester/add'])  --}}
		            {{-- <li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
		                    <i class="ri-global-fill"></i>
		                    <span>History</span>
		                    <span class="menu-arrow"></span>


		                </a>
		                <div class="collapse" id="sidebarTables">
		                    <ul class="side-nav-second-level">
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{route('history/historylist', 'class')}}">History List</a>
		                        </li>
		                    </ul>
		                </div>
		            </li> --}}
					{{-- @endcanany --}}

<!--GUEST-->
                    <!--Post-->
					@canany(['allpost/list'])
					<li class="side-nav-item">
		                <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false" aria-controls="sidebarTables" class="side-nav-link">
		                    <i class="ri-inbox-unarchive-fill"></i>
		                    <span>Download</span>
		                    <span class="menu-arrow"></span>
		                </a>
		                <div class="collapse" id="sidebarTables">
		                    <ul class="side-nav-second-level">

								@can('allpost/list')
		                        <li class="side-nav-item">
		                            <a class="side-nav-link" href="{{url('manager/allpost/list')}}">My Post</a>
		                        </li>
								@endcan
		                    </ul>
		                </div>
		            </li>
					@endcanany
		        </ul>
		    </div>
		</div>

        <!-- Content page -->
        <div class="content-page">
			<div class="content">

				<!-- Start Content-->
                @yield('connect-content')
				<!-- end container -->

				<!-- Footer Start -->
				<footer class="footer">
				    <div class="container-fluid">
				        <div class="row">
				            <div class="col-12 text-center">
				                <script>document.write(new Date().getFullYear())</script>-GreenWich<b></b>
				            </div>
				        </div>
				    </div>
				</footer>
				<!-- end Footer -->

			</div>
			<!-- content -->
		</div>


	</div>

    <div id="wp-content">
        @yield('content')
    </div>

    

    <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
	    <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
	        <h5 class="text-white m-0">Theme Settings</h5>
	        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	    </div>

	    <div class="offcanvas-body p-0">
	        <div data-simplebar class="h-100">
	            <div class="p-3">
	                <h5 class="mb-3 fs-16 fw-semibold">Color Scheme</h5>

	                <div class="row">
	                    <div class="col-6">
	                        <div class="form-check mb-1">
	                            <input class="form-check-input border-secondary" type="radio" name="data-bs-theme" id="layout-color-light" value="light">
	                            <label class="form-check-label" for="layout-color-light">Light</label>
	                        </div>
	                    </div>

	                    <div class="col-6">
	                        <div class="form-check mb-1">
	                            <input class="form-check-input border-secondary" type="radio" name="data-bs-theme" id="layout-color-dark" value="dark">
	                            <label class="form-check-label" for="layout-color-dark">Dark</label>
	                        </div>
	                    </div>
	                </div>

	                <div id="layout-width">
	                    <h5 class="my-3 fs-16 fw-semibold">Layout Mode</h5>

	                    <div class="row">
	                        <div class="col-6">
	                            <div class="form-check mb-1">
	                                <input class="form-check-input border-secondary" type="radio" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
	                                <label class="form-check-label" for="layout-mode-fluid">Fluid</label>
	                            </div>
	                        </div>

	                        <div class="col-6">
	                            <div id="layout-boxed">
	                                <div class="form-check mb-1">
	                                    <input class="form-check-input border-secondary" type="radio" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
	                                    <label class="form-check-label" for="layout-mode-boxed">Boxed</label>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <h5 class="my-3 fs-16 fw-semibold">Topbar Color</h5>

	                <div class="row">
	                    <div class="col-6">
	                        <div class="form-check mb-1">
	                            <input class="form-check-input border-secondary" type="radio" name="data-topbar-color" id="topbar-color-light" value="light">
	                            <label class="form-check-label" for="topbar-color-light">Light</label>
	                        </div>
	                    </div>

	                    <div class="col-6">
	                        <div class="form-check mb-1">
	                            <input class="form-check-input border-secondary" type="radio" name="data-topbar-color" id="topbar-color-dark" value="dark">
	                            <label class="form-check-label" for="topbar-color-dark">Dark</label>
	                        </div>
	                    </div>
	                </div>

	                <div>
	                    <h5 class="my-3 fs-16 fw-semibold">Menu Color</h5>

	                    <div class="row">
	                        <div class="col-6">
	                            <div class="form-check mb-1">
	                                <input class="form-check-input border-secondary" type="radio" name="data-menu-color" id="leftbar-color-light" value="light">
	                                <label class="form-check-label" for="leftbar-color-light">Light</label>
	                            </div>
	                        </div>

	                        <div class="col-6">
	                            <div class="form-check mb-1">
	                                <input class="form-check-input border-secondary" type="radio" name="data-menu-color" id="leftbar-color-dark" value="dark">
	                                <label class="form-check-label" for="leftbar-color-dark">Dark</label>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div id="sidebar-size">
	                    <h5 class="my-3 fs-16 fw-semibold">Sidebar Size</h5>

	                    <div class="row gap-2">
	                        <div class="col-12">
	                            <div class="form-check mb-1">
	                                <input class="form-check-input border-secondary" type="radio" name="data-sidenav-size" id="leftbar-size-default" value="default">
	                                <label class="form-check-label" for="leftbar-size-default">Default</label>
	                            </div>
	                        </div>

	                        <div class="col-12">
	                            <div class="form-check mb-1">
	                                <input class="form-check-input border-secondary" type="radio" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
	                                <label class="form-check-label" for="leftbar-size-compact">Compact</label>
	                            </div>
	                        </div>

	                        <div class="col-12">
	                            <div class="form-check mb-1">
	                                <input class="form-check-input border-secondary" type="radio" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
	                                <label class="form-check-label" for="leftbar-size-small">Condensed</label>
	                            </div>
	                        </div>


	                        <div class="col-12">
	                            <div class="form-check mb-1">
	                                <input class="form-check-input border-secondary" type="radio" name="data-sidenav-size" id="leftbar-size-full" value="full">
	                                <label class="form-check-label" for="leftbar-size-full">Full Layout</label>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div id="layout-position">
	                    <h5 class="my-3 fs-16 fw-semibold">Layout Position</h5>

	                    <div class="row">
	                        <div class="col-6">
	                            <div class="form-check">
	                                <input type="radio" class="form-check-input" name="data-layout-position" id="layout-position-fixed" value="fixed">
	                                <label class="form-check-label" for="layout-position-fixed">Fixed</label>
	                            </div>
	                        </div>
	                        <div class="col-6">
	                            <div class="form-check">
	                                <input type="radio" class="form-check-input" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
	                                <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="offcanvas-footer border-top p-3 text-center">
	        <div class="row">
	            <div class="col-6">
	                <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
	            </div>
	            <div class="col-6">
	                <a href="#" role="button" class="btn btn-primary w-100">Buy Now</a>
	            </div>
	        </div>
	    </div>
	</div>
	
	<!-- JavaScript to handle "Select All" functionality -->
	<script>
		// Get the "Select All" checkbox element
		var checkallCheckbox = document.getElementById('checkall');

		// Get all the checkboxes in the table body
		var checkboxes = document.querySelectorAll('.list_check');

		// Add event listener to "Select All" checkbox
		checkallCheckbox.addEventListener('change', function() {
			checkboxes.forEach(function(checkbox) {
				checkbox.checked = checkallCheckbox.checked;
			});
		});
	</script>


    <!-- Vendor js -->
	<script src="{{asset('assets/js/vendor.min.js')}}"></script>
	<script src="{{asset('assets/vendor/lucide/umd/lucide.min.js')}}"></script>
	<!-- Apex Charts js -->
	<script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
	<!-- Vector Map js -->
	<script src="{{asset('assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
	<script src="{{asset('assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>
	<!-- Dashboard App js -->
	<script src="{{asset('assets/js/pages/dashboard.js')}}"></script>
	<!-- App js -->
	<script src="{{asset('assets/js/app.min.js')}}"></script>
</body>

</html>