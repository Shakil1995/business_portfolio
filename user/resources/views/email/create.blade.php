<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail Send</title>
</head>
<body>
    
    <H1>send  mail</H1>
@if (Session::has('success'))
<label> {{Session::get('success')}}</label>
    
@endif

<form action="/sendEmail" method="POST">
    {{-- {{csrf_field}} --}}

    <div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				{{-- <form action="{{ route('userForm') }}" class="contact100-form validate-form" method="post"> --}}
                                        @csrf
					<span class="contact100-form-title">
						Contact Form
                                            </span>
                                            @if(session()->has('message'))
                                                <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif

					<div class="wrap-input100 validate-input" data-validate = "Name is required">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
                                            </span>
                                            @error('name')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                                            </div>
                                            <div class="wrap-input100 validate-input" data-validate = "Subject is required">
		        			<input class="input100" type="text" name="subject" placeholder="subject">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
                                                </span>
                                                @error('subject')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
    

					<div class="wrap-input100 validate-input" data-validate = "Message is required">
						<textarea class="input100" name="content" placeholder="Message"></textarea>
                                        <span class="focus-input100"></span>
                                        @error('content')
                                           <span class="text-danger"> {{ $message }} </span>
                                         @enderror
                                        </div>
                
					<div class="container-contact100-form-btn">
						<button type="submit" class="contact100-form-btn">
							Send
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>



</form>




</body>
</html>