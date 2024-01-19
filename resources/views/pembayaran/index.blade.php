@extends('template.main')

@section('konten')
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
        <p class="mb-4">Sekolah Prestasi Prima</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Data Pembayaran
                    <button class="btn btn-sm btn-info float-right" data-toggle="modal" data-target="#tambahData">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                </h4>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-xm  table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID Pembayaran</th>
                                <th>ID Petugas</th>
                                <th>NISN</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Bulan Dibayar</th>
                                <th>Tahun Dibayar</th>
                                <th>ID SPP</th>
                                <th>Jumlah Bayar</th>
                                <th>Aksi</th>

                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pembayaran as $row)
                                <tr>
                                    <td>{{ $row->id_pembayaran }}</td>
                                    <td>{{ $row->id_petugas }}</td>
                                    <td>{{ $row->nisn }}</td>
                                    <td>{{ $row->tgl_bayar }}</td>
                                    <td>{{ $row->bulan_dibayar }}</td>
                                    <td>{{ $row->tahun_dibayar }}</td>
                                    <td>{{ $row->id_spp }}</td>
                                    <td>Rp.{{ $row->jumlah_bayar }}</td>

                                    <td>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#editModal{{ $row->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('tpembayaran.delete', $row->id_pembayaran) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteModal{{ $row->id }}">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="deleteModalLabel{{ $row->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel{{ $row->id }}">Konfirmasi Hapus
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" role="dialog"
                                    aria-label="editModalLabel{{ $row->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $row->id }}">Edit Data
                                                    Siswa</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('tpembayaran.update', $row->id_pembayaran) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="nama">Nama Siswa</label>
                                                        <input type="text" class="form-control" id="nama"
                                                            name="nama" value="{{ $row->nama }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tgl_bayar">Tanggal Pembayaran</label>
                                                        <input type="date" class="form-control" id="tgl_bayar"
                                                            name="tgl_bayar" value="{{ $row->tgl_bayar }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah">Jumlah</label>
                                                        <input type="number" class="form-control" id="jumlah"
                                                            name="jumlah" value="{{ $row->jumlah }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="#" data-toggle="modal" data-target="#importModal">
                        <button type="button" class="btn btn-sm btn-success">
                            <i class="fas fa-save" style="color: #ffffff;"></i> Import Data
                        </button>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="importModal" tabindex="-1" role="dialog"
                        aria-labelledby="importModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importModalLabel">Konfirmasi Import</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Apakah anda mau mengimport?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="button" class="btn btn-success" id="importButton">Ya, Import</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Fungsi untuk mengarahkan ke halaman "/excel-export" saat tombol "Ya, Import" diklik
                        document.getElementById("importButton").addEventListener("click", function() {
                            window.location.href = "/excel-export";
                        });
                    </script>


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form action="{{ url('tpembayaran/save') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="nama"
                                name="nama">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah </label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah">
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if ($message = Session::get('dataTambah'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 300,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Data Barang Berhasil Ditambah'
            })
        @endif
    </script>
@endsection
