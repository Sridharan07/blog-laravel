@extends('template_admin/main')
@section('title_post', 'Tags')
@section('sub1', 'Tags')
@section('sub2', 'List Tags')

@section('content')

<table class="table table-striped table-bordered table-hover table-sm">
	<thead>
		<tr>
			<th>No</th>
			<th>Tags Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@if($data->count() > 0)
		@foreach($data as $result => $Results)
		<tr>
			<td>{{ $result + $data->firstItem() }} </td>
			<td>{{ $Results->tag }}</td>
			<td>
			<form action="{{ route('tag.destroy', $Results->id )}}" method="POST">
			@method('delete')
			@csrf
			<a href="{{ route('tag.edit', $Results->id ) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</a>
			<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>

			</form></td>
		</tr>
		@endforeach
		@else
		<tr>
			<td colspan="3" align="center">There is no data</td>
		</tr>
		
		@endif
	</tbody>
	
</table>
{{ $data->links() }}

@endsection