@extends('layouts.front')

@section('title')
    {{ $user->Username }}
@endsection

@section('head-links')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/_profile.css') }}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection

@section('content')

{{-- @php
    var_dump($user)
@endphp --}}
    
<div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="{{ asset('img/'. $user->ProfileImage) }}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $user->Username }}
					</div>
					<div class="profile-usertitle-job">
						{{ $user->RoleName }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   <ul class=""> 
                   @foreach ($user->Posts as $p)
                        @php
                            $datum = explode(' ', $p->DateAdded)[0];
                        @endphp
                       
                        <div class="well well-small">
                            <li>
                           <div class="single-articles-area d-flex flex-wrap ">
                                <div class="article-content">
                                    <a href="http://127.0.0.1:8000/posts/{{ $p->Id }}" class="post-title">{{ $p->Title }}</a>
                                    <div class="post-meta">
                                        <p  class="post-date">{{ $datum }}</p>
                                    </div>
                                </div>
                            </div>
                            
                        </li>
                        <li class="divider"></li>
                        </div>
                   @endforeach
                       {{ $user->Posts->links() }}

               </ul>
            </div>
		</div>
	</div>
</div>
@endsection