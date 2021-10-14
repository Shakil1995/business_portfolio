@extends('Layout.app')


@section('content')


<div class="p-5">
	<div class="row">

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalVisitor}}</h3>
					<h3 class="count-card-text">Total Visitor</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalServices}}</h3>
					<h3 class="count-card-text">Total Services</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalProject}}</h3>
					<h3 class="count-card-text">Total Projects</h3>
				</div>
			</div>
		</div>

		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalCourse}}</h3>
					<h3 class="count-card-text">Total Courses</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalContact}}</h3>
					<h3 class="count-card-text">Total Contacts</h3>
				</div>
			</div>
		</div>
		<div class="col-md-3 p-2">
			<div class="card">
				<div class="card-body">
					<h3 class="count-card-title">{{$totalReview}}</h3>
					<h3 class="count-card-text">Total Reviews</h3>
				</div>
			</div>
		</div>

        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="count-card-title">{{$totalPhoto}}</h3>
                    <h3 class="count-card-text">Total Photo</h3>
                </div>
            </div>
        </div>

	</div>
</div>

@endsection


