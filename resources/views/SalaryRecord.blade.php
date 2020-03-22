<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top">
            LOGO Perusahaan
            {{-- <img src="https://sgo.co.id/wp-content/uploads/2019/08/SGO-horizontal.png" alt="" width="150"/> --}}
        </td>
        <td align="right">
            <h3>Nama Perusahaan</h3>
            <pre>
                Perkantoran The Prominence 56-57, 
                Jl. Jalur Sutera Kav.38D, 
                Panunggangan Timur, Serpong Utara, 
                RT.003/RW.006, Panunggangan Tim., K
                ec. Pinang, Kota Tangerang Selatan, 
                Banten 15325
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Financial Team Management</td>
        <td><strong>To:</strong> {{ $user[$increment]->name }} - {{ $user[$increment]->posisi }}</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Date</th>
        <th>Raw</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Monthly Salary</td>
        <td align="right">{{ $salary[$increment]->tanggal }}</td>
        <td align="right">{{ $salary[$increment]->nominal }}</td>
        <td align="right">{{ $salary[$increment]->nominal }}</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal Rp.</td>
            <td align="right">{{ $salary[$increment]->nominal }}</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax Rp.</td>
            <td align="right">0</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total Rp.</td>
            <td align="right" class="gray">Rp. {{ $salary[$increment]->nominal }}</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>