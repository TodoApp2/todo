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
			<li>{!! Html::link('home','Home') !!}</li>
			<li>{!! Html::link('addTask','Add Task') !!}</li>
			<li>{!! Html::link('Logout','Logout') !!}</li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class="row">
		<div id="allTask">
			@if(count($tasks) == 0)
			<div class="col-md-4 col-md-offset-4">
				<div class="alert alert-success">
					No any Task To do !
				</div>
			</div>
			@endif

			@foreach($tasks as $task)
			<div class="col-md-4 col-md-offset-3">
				<div class="panel panel-primary taskPanel table-responsive">
					<div class="panel-heading">
						<h3 class="panel-title text-center text-uppercase">
							{{ $task->task_title }}
						</h3>
					</div>
					<div class="panel-body">
						@if(Session::has('message'))
						<div class="alert alert-success">
							{{Session::get('message') }}
						</div>
						@endif
						{!! Form::open(array('url'=>'deleteTask/' .$task->id,'class'=>'form form-horizontal')) !!}
						<table class="table table-hover">
							<tr class="success">
								<td><h2 class="label label-danger">To Do:</h2></td>
								<td>{{ $task->task }}</td>
							</tr>
							<tr class="info">
								<td><h2 class="label label-danger">Time :</h2></td>
								<td>{{ $task->created_at }}</td>
							</tr>
							<br><br>
						</table>
						<input type="hidden" name="_method" value="DELETE">
						{!! Form::submit('Delete Task',array('class'=>'btn btn-danger center-block'))!!}
						{!! Form::close() !!}
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4">
			{!! $tasks->render()!!}
		</div>
	</div>
</div>
@include('layouts.footer')