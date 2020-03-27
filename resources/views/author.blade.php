@extends('layouts.front')

@section('title')
    Author Page
@endsection 


@section('head-links')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/_profile.css') }}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection

@section('content')
    <div class="container">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="{{ asset('img/author/author.jpg') }}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Aleksa Stajčić (81/16)
					</div>
					<div class="profile-usertitle-job">
						Author
					</div>
                </div>
                
			</div>
		</div>
    </div>
    <div class="col-md-9">
        <div class="profile-content" id="profile-content">
            The author of this site is Aleksa Stajčić. He was born in Belgrade, Serbia and is studying IT at ICT Collage of Vocational Studies.
        </div>
    </div>
</div>
@endsection