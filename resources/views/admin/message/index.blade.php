<div class="col-md-12">
    @foreach ($errors->all() as $error)
<p class=" alert alert-danger">{{$error}}</p>
    @endforeach
</div>
