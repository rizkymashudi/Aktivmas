<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>


<h1>Masjid raya batam</h1>
<h2>Laporan keuangan {{  date('l, j \\ F Y', strtotime(now()->toDateString())) }}</h2>


<table id="customers">
  <tr>
    <th>#</th>
    <th>Tanggal</th>
    <th>Keterangan</th>
    <th>Debet</th>
    <th>Kredit</th>
    <th>Saldo</th>
  </tr>

      @php
          $no = 1;
      @endphp
      @foreach($data as $kas)
        <tr>
            <td>{{$no}}</td>
            <td>{{ date('l, j \\ F Y', strtotime($kas->created_at)) }}</td>
            <td>{!! $kas->description !!}</td>
            <td>{{ number_format($kas->debet) }}</td>
            <td>{{ number_format($kas->credit) }}</td>
            <td>{{ number_format($kas->balance) }}</td>
        </tr>
      @endforeach
      <tr>
          <td colspan="2"></td>
          <td style="font-weight: bold">Saldo akhir</td>
          <td style="font-weight: bold">{{ number_format($data->sum('debet')) }}</td>
          <td style="font-weight: bold">{{ number_format($data->sum('credit')) }}</td>
          <td style="font-weight: bold">{{ number_format($latestBalance->balance) }}</td>
      </tr>
      @php
            $no++;
      @endphp

</table>

</body>
</html>