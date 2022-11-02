<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

<div class="wrapper">
    @include('layouts.sidebar')
    <div class="main_content">
        <div class="header">Welcome!! Have a nice day.</div>
        <div class="info">
            <h1>Categories</h1>
            <div class="col-12 col-lg-12 col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session()->get('success')}}</strong>
                </div>
                @endif
            <table style="width:100%">
            <tr>
                <th>Sr no</th>
                <th>Category Name</th>

            </tr>
            @foreach($categories as $category)
            <tr>
                <td>{{$loop->index}}</td>

                <td>{{$category->category_name}}</td>

                <td>
                    <a href="/category-edit/{{$category->id}}" class="btn btn-info">Edit</a>
                    <a href="/category-delete/{{$category->id}}" class="btn btn-danger">Delete</a>


                </td>
            </tr>
            @endforeach

            </table>


            </div>


         </div>
         <div class="info">
            <h1>Services</h1>
            <div class="col-12 col-lg-12 col-md-12">
                @if(session()->has('success'))
                <div class="alert alert-info" role="alert">
                    <strong>{{session()->get('success')}}</strong>
                </div>
                @endif
            <table style="width:100%">
            <tr>
                <th>Sr no</th>
                <th>Service Name</th>
                <th>Service Price</th>
                <th>Service Category</th>

            </tr>
            @foreach($services as $service)
            <tr>
                <td>{{$loop->index}}</td>

                <td>{{$service->service_name}}</td>
                <td>₹ {{$service->price}}</td>
                @foreach($categories as $category)
                @if($category->id==$service->category_id)
                <td>{{$category->category_name}}</td>
                @elseif($service->category_id==null)
                <td>Category Deleted</td>
                @endif
                @endforeach
                <td>
                    <a href="/service-edit/{{$service->id}}" class="btn btn-info">Edit</a>
                    <a href="/service-delete/{{$service->id}}" class="btn btn-danger">Delete</a>


                </td>
            </tr>
            @endforeach

            </table>


            </div>


         </div>
    </div>
</div>

</body>
</html>
