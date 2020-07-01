@extends('admin.layouts.master')

@section('title','User')
@section('content')

<div class="container-fluid">




    <div class="card col-md-12">
        <div class="card-header">
            <h2 class="card-title text-primary">User List</h2>
        </div>

        <div class="card-body">
        <table class="table table-bordered table-responsive-md">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>

                <th  colspan="2">Role</th>

              </tr>
            </thead>
            <tbody>



               @foreach ($users as $user)
               <tr>

                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>

               <td>{{$user->role}}</td>

                </tr>

               @endforeach


            </tbody>

            <div class="col-md-12">
                {{$users->links()}}
            </div>
          </table>
        </div>

</div>
</div>


@endsection

