<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data Alumni</title>
    <style>
        @media print and (orientation: landscape) {

            /* Gaya untuk body */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
            }

            h1 {
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }
        }
    </style>
</head>

<body>
    <h1>Data Alumni Tahun {{ $alumni[0]->angkatan }}</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Angkatan</th>
                <th>Agama</th>
                <th>Prodi</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>Tahun Masuk</th>
                <th>Tahun Lulus</th>
                <th>IPK</th>
                <th>Pekerjaan</th>
                <th>Awal Bekerja</th>
                <th>Domisili Tempat Kerja</th>
                <th>Foto</th>
                <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($alumni as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->angkatan }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->program_studi }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>{{ $item->tahun_lulus }}</td>
                    <td>{{ $item->ipk }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                    <td>{{ $item->awal_bekerja }}</td>
                    <td>{{ $item->domisili_tempat_kerja }}</td>
                    <td>
                        @if ($item->foto)
                            <img src="{{ url('images/' . $item->foto) }}"
                                style="width: 40px; height: 60px;object-fit: cover; display: block;">
                        @else
                            <img src="{{ asset('assets/images/profile/small/pic1.jpg') }}" class="rounded-circle"
                                width="35" alt="img">
                        @endif
                    </td>
                    <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Jumlah Data: {{ $jumlahData }}</p>
</body>

</html>
