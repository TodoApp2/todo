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
		</ul>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div id="links">
			<div class="col-md-4 col-md-offset-2">
				<div class="link">
					<a href="{{ url('allTask') }}"><i class="fa fa-search"> </i> View All Tasks</a>
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="link">
					<a href="{{ url('addTask') }}"><i class="fa fa-plus-circle"> </i> Add Task</a>
				</div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div id="links">
			<div class="col-md-4 col-md-offset-4 ">
				<div class="link">
					<a href="{{ url('Logout') }}"><i class="fa fa-home"></i> Log out</a>
				</div>
			</div>
		</div>
	</div>
</div>

@include('layouts.footer')