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
      <table>
        <tbody>

      {{-- @php dd($services[0]); @endphp --}}

      @foreach($customers as $index => $customer)
            @php $obj = json_decode($customer->info, true); @endphp
            {{-- @if ($index == 0)
                <tr>
                    <th>No</th>
                    @foreach($obj as $key=>$value)
                        <th>{{ $key }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
            @endif --}}
            <tr>
                <td>{{ $index + 1 }}</td>
                @foreach($obj as $key=>$value)
                    <td>({{ $key }}) {{ $value }}</td>
                @endforeach
                <td>(Service){{ $services[$index]->service_name }}</td>
                <td>₹{{ $services[$index]->price }}</td>
            </tr>
      @endforeach
        </tbody>
    </table>

      {{-- <table>
        <thead>
            <tr>
              <th>No</th>
              <th>Customer</th>
              <th>Service</th>
              <th>Status</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
        @foreach ($customers as $index => $customer)
            <tr>
                <th>{{ $index + 1 }}</th>
                <th>{{ $customer->email }}</th>
                <th>{{ $customer->service }}</th>
                <th>{{ $customer->status === 1 ? 'In Progress' : 'Completed' }}</th>
                <th><a href="{{ route('show.orders', ['user_id' => $customer->user_id, 'status' => $customer->status]) }}"><Button class="btn btn-info btn-block ">View Order</Button></a></th>
            </tr>
      @endforeach
    </tbody>
    </table> --}}
    </div>
  </div>
</body>

</html>
