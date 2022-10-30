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
            <form method="POST" action="/add-category" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="playername">Category Name</label>
                      <input type="text" class="form-control" id="category" placeholder="Enter Category Name" name="category" value="{{old('category')}}">
                      @if($errors->has('category'))
                      <p class="text-danger">{{$errors->first('category')}}</p>
                      @endif
                       </div>

                    </div>
</div>
                    
    
    
    
    <button type="submit" class="btn btn-primary">Add category</button>
  </form>

            </div>
            <div class="col-6 col-lg-6 col-md-6">
            @if(session()->has('success1'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session()->get('success1')}}</strong>
                </div>
                @endif
            <form method="POST" action="/add-service" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="playername">Service Name</label>
                      <input type="text" class="form-control" id="service" placeholder="Enter Service Name" name="service" value="{{old('service')}}">
                      @if($errors->has('service'))
                      <p class="text-danger">{{$errors->first('service')}}</p>
                      @endif
                       </div>
                       <div class="form-group">
                        <label for="Category_list"> Select Category </label>
                        <select name="category_list" id="category_list" style="width:100%">
                        @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->category_name}}</option>
    @endforeach
  </select>
                      @if($errors->has('category_list'))
                      <p class="text-danger">{{$errors->first('category_list')}}</p>
                      @endif
                       </div>

                    </div>
                    
    
    
    
    <button type="submit" class="btn btn-primary">Add Service</button>
  </form>

            </div>


         </div>
    </div>
</div>

</body>
</html>