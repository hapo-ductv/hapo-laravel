@extends('teacher_user.index')
@section('content')
<div class="panel panel-default col-md-8 col-md-offset-1" style="padding: 0;margin-top: 1%;">
	<div class="panel-heading">List course</div>
	<div class="panel-body">
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
		    <thead>
		        <tr align="center">
		            <th>ID</th>
		            <th>Name</th>
		            <th>course code</th>
		            <th>show</th>
		            <th>Register</th>
		        </tr>
		    </thead>
		   <tbody>
		        <?php $stt = 0 ?>
		        @foreach ($data as $item)
		        <?php $stt = $stt + 1 ?>
		        <tr class="odd gradeX" align="center">
		            <td>{!! $stt !!}</td>
		            <td>{!! $item->subject->name !!}</td>
		            <td>{!! $item->course_code !!}</td>
		            <td><a href="{{ route('teacher.course.show',$item->id) }}">show</a></td>
		            <td>
		            	<form action="{{ route('teacher.course.post_register')}}" method="POST" accept-charset="utf-8">
		            		{{csrf_field()}}
		            		<input type="hidden" name="course" value="{{ $item->id }}">
		            		<button type="submit" style="border: none;background:none;color: #337ab7;">Register</button> 
		            	</form>
		            </td>
		        </tr>
		        @endforeach
		    </tbody>
		</table>
	</div>
</div>
@endsection()