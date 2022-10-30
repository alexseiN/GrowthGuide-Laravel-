<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<style>
table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

<body>
  <div class="wrapper">
    @include('layouts.sidebar')
    <div class="main_content">
      <div class="header">Welcome!! Have a nice day.</div>
      @foreach ($responses as $index => $response)
      <h1>Form {{ ++$index }}</h1>
      <table>
        <thead>
          <tr>
            @foreach (array_keys((array)json_decode($response->response)) as $headItem)
            <th>{{ explode(";", $headItem)[0] }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
            <tr>
              @foreach (array_values((array)json_decode($response->response)) as $item)
              <td>{{ $item }}</td>
              @endforeach
            </tr>
        </tbody>
      </table>      
      @endforeach
    </div>
  </div>
</body>

</html>