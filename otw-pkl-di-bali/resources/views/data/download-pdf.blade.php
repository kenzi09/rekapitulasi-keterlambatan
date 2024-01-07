<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Pernyataan</title>

  <style>
    body {
      font-family: sans-serif;
      font-size: 12px;
    }

    .container {
      width: 600px;
      margin: 0 auto;
    }

    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    /* .footer{
      float: left;
      clear: right;
    } */

    .title {
      font-size: 20px;
      font-weight: bold;
    }

    .pd{
      text-align: center;
      float: left;
    }

    .ortu{
      text-align: center;
      margin-left: 380px;
      clear: right;
    }

    .content {
      margin-bottom: 20px;
    }

    .signature {
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2 class="title">SURAT PERNYATAAN</h2>
      <h2 class="title">TIDAK AKAN DATANG TERLAMBAT SEKOLAH</h2>
    </div><br><br>

    <div class="content">
      <p>Yang bertanda tangan dibawah ini:</p><br>

      @forelse ($order as $data)
      <table>
        <tr>
          <td>NIS</td>
          <td>:</td>
          <td>{{  $data->nis }}</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td>{{  $data->name }}</td>
        </tr>
        <tr>
          <td>Rombel</td>
          <td>:</td>
          <td>{{  $data->rayon->rayon }}</td>
        </tr>
        <tr>
          <td>Rayon</td>
          <td>:</td>
          <td>{{  $data->rombel->rombel }}</td>
        </tr>
      </table><br><br><br>

      <p>Dengan ini menyatakan bahwa saya telah melakukan pelanggaran tata tertib sekolah, yaitu terlambat datang ke sekolah sebanyak 3 Kali yang mana hal tersebut termasuk kedalam pelanggaran kedisiplinan. Saya berjanji tidak akan terlambat datang ke sekolah lagi. Apabila saya terlambat datang ke sekolah lagi saya siap diberikan sanksi yang sesuai dengan peraturan sekolah</p><br><br>

      <p>Demikian surat pernyataan terlambat ini saya buat dengan penuh penyesalan</p><br>

    </div>

    {{-- <div class="signature">
      <p>Bogor, 24 November 2023</p>

      <table>
        <tr>
          <td>Peserta Didik</td>
          <td>:</td>
          <td>(Lintang Maharani)</td>
        </tr>
        <tr>
          <td>Orang Tua/Wali Peserta Didik</td>
          <td>:</td>
          <td>(Ayah/Ibu Lintang Maharani)</td>
        </tr>
        <tr>
          <td>Pembimbing Siswa</td>
          <td>:</td>
          <td>(UT)</td>
        </tr>
        <tr>
          <td>Kesiswaan</td>
          <td>:</td>
          <td>(PS Wikrama 1)</td>
        </tr>
      </table>
    </div> --}}
    <div class="footer">
      <div class="pd">

        <p>
          Peserta Didik,
        </p><br><br><br><br><br><br>
        <p>
         ( {{  $data->name }} )
        </p><br>
        <p>
          Pembimbing Siswa,
        </p><br><br><br><br><br>
        <p>
         ( PS {{  $data->rayon->rayon }} )
        </p>

      </div>

      <div class="ortu">

        <p>
          Bogor @php \Carbon\Carbon::setlocale('id_ID') @endphp 
          {{ \Carbon\Carbon::parse($data->created_at)->translatedFormat('d F Y') }}
        </p>
        <p>
          Orang Tua/Wali Peserta Didik
        </p><br><br><br><br>
        <p>
          (........................)
        </p><br>
        <p>
          Kesiswaan
        </p><br><br><br><br><br>
        <p>
          (........................)
        </p>
        
      </div>
      </div>
    @empty
      <div class="alert alert-danger">
          Data belum Tersedia.
      </div>
  @endforelse
  </div>
</body>
</html>
