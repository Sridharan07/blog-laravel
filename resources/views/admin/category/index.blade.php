@extends('template_admin/main')
@section('title_post', 'Category')
@section('sub1', 'Posts')
@section('sub2', 'List Category')

@section('content')

<table class="table table-striped table-bordered table-hover table-sm">
	<thead>
		<tr>
			<th>No</th>
			<th>Category Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@if($data->count() > 0)
		@foreach($data as $result => $Results)
		<tr>
			<td>{{ $result + $data->firstItem() }} </td>
			<td>{{ $Results->name_category }}</td>
			<td><a href="{{ route('category.edit', ['id' => $Results->id ]) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i> Edit</a>
			<a href="{{ route('category.destroy', ['id' => $Results->id ])}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a></td>
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