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
            <form method="POST" action="/update-service/{{$service->id}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 col-lg-6 col-md-6">
                    <div class="form-group">
                        <label for="playername">Service Name</label>
                      <input type="text" class="form-control" id="service" placeholder="Enter Category Name" name="service" value="{{$service->service_name}}">
                      <label for="playername">Service Price</label>
                      <div class="inr">
                      <input type="number" class="form-control" id="price" placeholder="Enter Category Name" name="price" value="{{$service->price}}">
                      </div>
                      @if($errors->has('service'))
                      <p class="text-danger">{{$errors->first('service')}}</p>
                      @endif
                       </div>
                       <div class="form-group">
                        <label for="Category_list">Categories </label>
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
</div>




    <button type="submit" class="btn btn-primary">Update service</button>
  </form>

            </div>

    </div>
</div>

</body>
</html>
