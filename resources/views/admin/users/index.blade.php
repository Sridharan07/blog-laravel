@extends('template_admin/main')
@section('title_post', 'Users')
@section('sub1', 'Users')
@section('sub2', 'List Users')
@stack('script')
@section('content')
<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-sm">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Type</th>
			<th>Avatar</th>
			<th>Facebook</th>
			<th>Youtube</th>
		</tr>
	</thead>
	<tbody>
		@if($data->count() > 0)
		@foreach($data as $result => $Results)
		<tr>
			<td>{{ $result + $data->firstItem() }} </td>
			<td>{{ $Results->name }}</td>
			<td>{{ $Results->email }}</td>
			<td>
			@if(Auth::id() !== $Results->id)

				@if($Results->admin)
					<a href="{{ route('user.author',['id' => $Results->id ]) }}" class="btn btn-info btn-xs">Make Author</a>
					@else 
					<a href="{{ route('user.admin',['id' => $Results->id ]) }}" class="btn btn-success btn-xs">Make Admin</a>
				@endif
			@else
			<a href="#" class="btn btn-danger btn-xs">Administrator</a>
			@endif
			</td>
			<td><img class="img-fluid" style="width: 70px" src="{{ asset($Results->profile->avatar) }}"></td>
			<td>{{ $Results->profile->facebook }}</td>
			<td>{{ $Results->profile->youtube }}</td>
			<td>
			@if(Auth::id() !== $Results->id)
				<form action="{{ route('user.destroy', $Results->id )}}" method="POST">
					@method('delete')
					@csrf				
					<button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
				</form>
			@endif
			</td>
			

		</tr>
		@endforeach
		@else
		<tr>
			<td colspan="6" align="center">There is no data</td>
		</tr>
		
		@endif
	</tbody>
	
</table>
</div>
 {{$data->appends(Request::all())->links()}}


@endsection






