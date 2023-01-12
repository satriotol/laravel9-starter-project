<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .table,
        .td,
        .th {
            border: 1px solid;
        }

        table tbody tr td,
        table thead tr th {
            border-collapse: collapse;

        }

        table thead tr th {
            background: #858585;
            color: #fff;
        }

        * {
            font-family: times;
        }

        .w-100 {
            width: 100%;
        }
    </style>
</head>

<body>
    <table width="100%">
        <tbody>
            <tr>
                <td class="text-center">
                    <img src="https://sigelar.diskominfo.semarangkota.go.id/uploads/drive/20200818141926-2020-08-18drive141924.jpg"
                        alt="" width="74" height="105" class="text-center" />
                </td>
                <td class="text-center">
                    <h3 style="font-size:21.333px;font-family: Arial;">
                        <strong style="font-family: Arial;">PEJABAT PENGELOLA INFORMASI DAN DOKUMENTASI (PPID)
                            PEMBANTU</strong> <br>
                        <span style="font-size:24px;font-family: Arial;">INSPEKTORAT KOTA SEMARANG</span> <br>
                        <span style="font-size:16px;font-weight:400;font-family: Arial;">
                            Jl. Pemuda No. 148 Telp. (024) 3586680 Fax. (024) 3584064 Semarang - 50132
                        </span>
                    </h3>
                </td>
            </tr>

        </tbody>
    </table>
    <hr style="border-top: 2px double #8c8b8b;" />
    <br>
    <section style="margin-left: 4rem">
        <strong>
            FORMULIR PERMOHONAN INFORMASI
        </strong>
        <br>
        <table style="margin-top: 1rem; margin-bottom:1rem">
            <tr>
                <td>Nama Pemohon</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->user->name }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->user->user_detail?->gender }}</td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->user->user_detail?->phone }}</td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->user->user_detail?->instansi }}</td>
            </tr>
            <tr>
                <td>Alamat Lengkap</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->user->user_detail?->address }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->user->email }}</td>
            </tr>
            <tr>
                <td>Tanggal Kejadian</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->datetime }}</td>
            </tr>
            <tr>
                <td>Jenis Informasi</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->jenis_informasi }}</td>
            </tr>
            <tr>
                <td>Alasan Permohonan Informasi</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->alasan_permohonan }}</td>
            </tr>
            <tr>
                <th>Reponse Petugas</th>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->status }}</td>
            </tr>
            <tr>
                <td>Response</td>
                <td>:</td>
                <td>{{ $permohonanInformasi->response }}</td>
            </tr>
        </table>
        <br>
        <br><br>
        <table>
            <tr>
                <td style="text-align: center">
                    Pelapor
                </td>
                @for ($i = 0; $i < 50; $i++)
                    <td></td>
                @endfor
                <td style="text-align: center">
                    Telah Diterima Oleh
                </td>
            </tr>
            @for ($i = 0; $i < 50; $i++)
                <tr></tr>
            @endfor
            <tr>
                <td style="text-align: center">
                    ___________________________
                </td>
                @for ($i = 0; $i < 50; $i++)
                    <td></td>
                @endfor
                <td style="text-align: center">
                    ___________________________
                </td>
            </tr>
        </table>
    </section>
</body>

</html>
