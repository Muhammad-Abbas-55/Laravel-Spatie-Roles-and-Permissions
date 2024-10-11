<x-app-layout>


    <form style="background:white">
        <div class="form-group" >
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group" >
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        @can('delete post')
        <button type="submit" class="btn btn-primary">Submit</button>
        @endcan


@role('admin')
    <p>Admin access granted.</p>
        @elsecan('delete post')
            <p>You are not an admin, but you can edit posts.</p>
        @else
    <p>You do not have the necessary permissions to view this content.</p>
@endrole



@role('admin') 
	<p>You are an editor.</p> 
	@can('delete post')
		<p>You can also publish posts.</p> 
	@endcan 
@endrole



@role('admin')
    <p>This content is only for users with the "admin" role.</p>
@endrole



@role('admin')
        <p>Admin access granted.</p>
    @elsecan('edit posts')
        <p>You are not an admin, but you can edit posts.</p>
    @else
        <p>You do not have the necessary permissions to view this content.</p>
@endrole

    </form>


</x-app-layout>
