@extends('admin.layouts.master')

@section('title','Book')

@section('content')

<div class="container-fluid">

    @if (session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
          @endif
    <div class="container-fluid">
        <div class="row">
             <div class="col-md-4 mb-3">


                    <a href="{{url('admin/book/create')}}" ><button type="submit" class="btn btn-primary">
                        <div class="fas fa-plus-circle"></div> &nbsp;  Add Book
                        </button></a>

             </div>

             <div class="col-md-8">
                 <div class="col-md-12">
                     <form>
                         <div class="input-group mb-3">
                             <input type="text" name="search" class="form-control" placeholder="Search By Book Title">
                             <div class="input-group-append">
                                 <button class="btn btn-primary" type="submit" id="button-addon2">
                                     <i class="fas fa-search"></i>
                                 </button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>

        </div>
     </div>
     <div class="card col-md-12">
        <div class="card-header">
            <h2 class="card-title text-primary">Book List</h2>
        </div>

        <div class="card-body">
        <table class="table table-bordered table-responsive-md">
            <thead>
              <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th  colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>



               @forelse ($books as $book)
               <tr>

                <td>{{$book->id}}</td>
                <td class="w-25 h-20"><img src="{{asset('/book/'.$book->image)}}" class="img-thumbnail w-50 h-20" alt="image"></td>
                <td>{{$book->title}}</td>
               <td>{{Str::limit($book->description,'50')}}</td>
               <td>{{$book->price}}</td>
               <td>{{$book->qty}}</td>

                <td><a href="{{action('admin\BookController@edit',$book->id)}}" class="btn-sm btn-outline-success"><i class="fas fa-edit"></i></a></td>
                <td><a href="{{action('admin\BookController@destroy',$book->id)}}" class="btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a></td>

                </tr>
               @empty
               <div class="col-md-12">
                   <h3>No book you search</h3>
               </div>
               @endforelse


            </tbody>

            <div class="col-md-12">
                {{$books->links()}}
            </div>
          </table>
        </div>

</div>

</div>
@endsection
