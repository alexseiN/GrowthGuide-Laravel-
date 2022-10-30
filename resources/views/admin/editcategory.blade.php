<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="main_content">
        <div class="header">Welcome!! Have a nice day.</div>  
        <div class="info">
            <div class="col-6 col-lg-6 col-md-6">
            @if(session()->has('success'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session()->get('success')}}</strong>
                </div>
                @endif
            <form method="POST" action="/update-category/{{$category->id}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="playername">Category Name</label>
                      <input type="text" class="form-control" id="category" placeholder="Enter Category Name" name="category" value="{{$category->category_name}}">
                      @if($errors->has('category'))
                      <p class="text-danger">{{$errors->first('category')}}</p>
                      @endif
                       </div>

                    </div>
</div>
                    
    
    
    
    <button type="submit" class="btn btn-primary">Update category</button>
  </form>

            </div>
            
    </div>
</div>

</body>
</html>