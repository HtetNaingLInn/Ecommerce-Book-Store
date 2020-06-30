@extends('admin.layouts.master')

@section('title','Category')
@section('content')

<div class="container-fluid">

    @if (session('status'))
    <p class="alert alert-success">{{session('status')}}</p>
        @endif
<div class="container-fluid">
   <div class="row">
        <div class="col-md-4 mb-3">
        <a href="{{url('admin/category/create')}}" ><button type="submit" class="btn btn-primary">
            <div class="fas fa-plus-circle"></div> &nbsp;  Create Category
            </button></a>
        </div>



    </div>
</div>


    <div class="card col-md-12">
        <div class="card-header">
            <h2 class="card-title text-primary">Category List</h2>
        </div>

        <div class="card-body">
        <table class="table table-bordered table-responsive-md">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>

                <th  colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>



               @foreach ($categories as $category)
               <tr>

                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>

                <td><a href="{{action('admin\CategoryController@edit',$category->id)}}" class="btn-sm btn-outline-info"><i class="fas fa-edit"></i></a></td>
                <td><a href="{{action('admin\CategoryController@destroy',$category->id)}}" class="btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a></td>

                </tr>

               @endforeach


            </tbody>

            <div class="col-md-12">
                {{$categories->links()}}
            </div>
          </table>
        </div>

</div>
</div>


@endsection

