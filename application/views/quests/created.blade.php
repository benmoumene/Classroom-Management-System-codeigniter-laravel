@layout('layouts.default')
@section('content')
<h2>Quest Created!</h2>
@if ($quest->category)
<span class="label label-info pull-right">{{$quest->category}}</span>
@endif
<h3>{{ $quest->name }}</h3> 
<p class="lead">{{ $quest->instructions }}</p>
<div class="pull-right">
<a class="btn btn-success" href="{{ URL::to('admin/quest/create');}}">Create Another Quest</a> 
</div>
@endsection