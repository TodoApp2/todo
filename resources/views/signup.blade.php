@include('layouts.header')
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		{!! Html::link('/','Todo App',array('class'=>'navbar-brand')) !!}
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li>{!! Html::link('Login','Login') !!}</li>
			<li>{!! Html::link('about','About') !!}</li>
		</ul>
	</div>
</nav>
<div class="container">
	<div id="signUpForm">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title">
							Signup Form
						</h2>
					</div>
					<br>
					@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					@if(Session::has('success'))
					<div class="alert alert-success">
						{{Session::get('success') }}
					</div>
					@endif

					@if(Session::has('error'))
					<div class="alert alert-danger">
						{{Session::get('error') }}
					</div>
					
					@endif

					<div class="panel-body">
						{!! Form::open(array('url'=>'Signup','class'=>'form form-horizontal')) !!}
						{!! Form::label('name', 'Name')!!}
						{!! Form::text('name',null,array('class'=>'form-control'))!!}

						{!! Form::label('email', 'Email')!!}
						{!! Form::email('email',null,array('class'=>'form-control'))!!}

						{!! Form::label('password', ' Choose any Password')!!}
						{!! Form::password('password',array('class'=>'form-control'))!!}

						{!! Form::label('profession', ' Choose Your Profession')!!}
						{!! Form::select('profession',array('Student'=>'Student','Govt.Employee'=>'Govt.Employee','Pvt.Employee'=>'Pvt.Employee','Others'=>'Others'),null,['class'=>'form-control'])!!}

						<br>	
						{!! Form::submit('Submit',array('class'=>'btn btn-primary center-block'))!!}
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@include('layouts.footer')