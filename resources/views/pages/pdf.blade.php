<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>

    @php
        $no = 1;
    @endphp

    <p><b>Jenis Data :</b> {{ $title }}</p>
    <p><b>Kurikulum :</b> {{ $kurikulum->nama_kurikulum }}</p>
    <p><b>Jumlah Data :</b> {{ count($data) }}</p>

    <table cclass="w3-table w3-bordered">
        {{ getThead($thead) }}
        @foreach ($data as $dt)
            <tr>
                @forelse ($fields as $field)
                    <td>{{ $field == 'loopNum' ? $no++ : $dt[$field] }}</td>
                @empty
                @endforelse
            </tr>
        @endforeach
    </table>
</body>

</html>
