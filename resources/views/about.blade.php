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
		<div class="col-md-8 col-md-offset-2">
			<div id="about">
				<p>Todo is useful when you have a deadline, need to focus, prioritize and get things done quickly like home or school projects or dozens of detailed work tasks. Todo is loaded with features like View all task,Add new Task,Delete Task,profile-edit and much more.
				</p>
				{!! Html::link('Signup','Join Now',array('class'=>'btn btn-primary btn-lg')) !!}
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
