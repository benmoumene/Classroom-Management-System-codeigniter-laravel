@if($info)
		@if($info->is_instructor)
			@if(!$info->setup_complete)
				<h5>Course Setup</h5>
				<h6>
					@if (!$info->skills)
					@else
						<i class="icon-ok"></i>
					@endif
					<a href='{{URL::to("admin/skills")}}'>Skills</a>
				</h6>

				<h6>
					@if(!$info->current_level)
					@else 
						<i class="icon-ok"></i>
					@endif
				<a href='{{URL::to("admin/levels")}}'>Levels</a>
				</h6>
				<h6>
				@if(!$info->has_quests)
					@else 
						<i class="icon-ok"></i>
					@endif
				<a href='{{URL::to("admin/quest/create")}}'>Quests</a>
				</h6>

				<h6>
					@if(!$info->has_posts)
					@else 
						<i class="icon-ok"></i>
					@endif
				<a href='{{URL::to("admin/post/create")}}'>Posts</a>
				</h6>

			@endif
			@if($info && $info->setup_complete)
				@if($info->notices > 0)
				@endif
				    <ul class="nav nav-stacked">
                        <li><h6>Grade</h6></li>
                        <li><a href="{{ URL::to('admin/submissions');}}">Submissions <span class="badge badge-important pull-right">{{$info->ungraded}}</span></a></li>
				  		<li><a href="{{ URL::to('admin/grade');}}">In Class Work</a></li>
                        <li><h6>List</h6></li>
				  		<li><a href="{{ URL::to('admin/students');}}">Students</a></li>
				  		<li><a href="{{ URL::to('admin/quests');}}">Quests</a></li>
				  		<li><a href="{{ URL::to('admin/posts');}}">Posts</a></li>
                        <li><h6>Create</h6></li>    
				  		<li><a href="{{ URL::to('admin/quest/create');}}">Quest</a></li>
				  		<li><a href="{{ URL::to('admin/post/create');}}">Post</a></li>
				  	</ul>

            @endif

		@else

			@if($info)
				@if($info->current_level)
					<h5>{{$info->current_level->label}} 
					@if($info->notices > 0)
						<a href="{{URL::to('notices')}}" class="btn btn-inverse btn-danger pull-right">
							{{$info->notices}} <i class="glyphicon glyphicon-envelope icon-white"></i>
						</a>
					@endif
	</h5>
				@else
					<h5><span class="label label-important">No Levels Created Yet</span></h5>
				@endif
				@if ($info->skills)
					@foreach($info->skills as $skill)
					
					<h6 class="muted">{{$skill['name']}}</h6>
					<div class="progress">
						@if($info->next_level == 0)
						<div class="bar bar-success" style="width: {{$skill['amount']/.1*100}}%;"></div>
						@else
						<div class="bar bar-success" style="width: {{$skill['amount']/$info->next_level*100}}%;"></div>
						@endif
					</div>
					@endforeach
				@endif
				<h5>Quests</h5>
				@if($info->completed_quests)
					<p><span class="badge badge-success">{{$info->completed_quests}}</span> Completed</p>
				@endif
				@if($info->pending_quests)
					<p><span class="badge badge-warning">{{$info->pending_quests}}</span> Pending</p>
				@endif
				@if ($info->available_quests)
					<p><span class="badge badge-default">{{$info->available_quests}}</span> Available</p>
				@endif
			@endif
		@endif
	@endif