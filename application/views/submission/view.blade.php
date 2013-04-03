@layout('layouts.default')
@section('content')
<h2>{{$data->quest->name}}</h2>
@if($data->submission->revision == 0)
<span class="label label-info pull-right">No Revisions</span>
@else
<span class="label label-info pull-right">Revision #{{$data->submission->revision}}</span>
@endif
<?php
	$created_date = strtotime($data->submission->created_at);
 ?>
<h6>Submitted on {{date("F j, Y", $created_date);}}</h6>
@if($data->submission->filename)
	@foreach(explode(",",$data->submission->filename) as $file)
	<a class="btn btn-info btn-mini" href="{{$file}}">{{Filepicker::metadata($file)->filename}}</a>
	@endforeach
@else
{{$data->submission->submission}}
@endif
@endsection