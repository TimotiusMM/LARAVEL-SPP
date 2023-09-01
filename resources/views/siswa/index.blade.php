@extends('template.main')

@section('konten')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-900">Data Siswa</h1>
        <p class="mb-4">Sekolah Prestasi Prima</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Data Pembayaran </h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-xm table-hover " id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pembayaran as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->tgl_bayar }}</td>
                                    <td>Rp.{{ $row->jumlah }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
