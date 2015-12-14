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
			<li>{!! Html::link('Signup','Signup') !!}</li>
			<li>{!! Html::link('Login','Login') !!}</li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2 table-responsive">
			@foreach($users as $user)
			{!! Form::open(array('url'=>'edit-profile','class'=>'form form-horizontal')) !!}
			<table class="table table-hover">
				<tr>
					<th>Name:</th>
					
					<td>
						{!! Form::text('name',$user->name ,array('class'=>'form-control'))!!} 

					</td>
				</tr>
				<tr>
					<th>Email:</th>
					
					<td>
						{!! Form::label($user->email)!!} 

					</td>
				</tr>
				<tr>
					<th>Profession:</th>
					
					<td>
						{!! Form::text('profession',$user->profession ,array('class'=>'form-control'))!!} 

					</td>
				</tr>
				<tr>
					<th>Address:</th>
					
					<td>
						{!! Form::text('address',$user->address ,array('class'=>'form-control'))!!} 

					</td>
				</tr>
				<tr>
					<th>Contact:</th>

					<td>
						{!! Form::text('contact',$user->contact ,array('class'=>'form-control'))!!} 

					</td>
				</tr>
				<tr>
					<th>Registration Time:</th>

					<td>
						{!! Form::label($user->created_at) !!} 

					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						{!! Form::submit('Save Change',array('class'=>'btn btn-danger center-block')) !!}
					</td>
				</tr>

			</table>
			{!! Form::close() !!}

			@endforeach
			@if(Session::has('message'))
			<div class="alert alert-success">
				{{Session::get('message') }}
			</div>
			@endif
		</div>
	</div>
</div>
@include('layouts.footer')
