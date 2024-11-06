<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Pengajuan<i
                    class="fa-solid fa-chevron-right"></i>Permohonan</div>
        </div>

        @if(Auth::user()->type == 1 || Auth::user()->type == 2)
            <div class="flex justify-end">
                <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                    data-bs-target="#tambahPermohonan">
                    <i class="fa-regular fa-square-plus"></i>
                    Tambah
                </button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="">
            <div class="card bg-[#90caf980]" id="laporan-masuk">
                <div class="text-xl text-white bg-[#283593] card-header">Data Pengajuan Permohonan Pengadaan Barang
                </div>
                <div class="card-body">
                    <table class="table border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Pengajuan</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuans as $pengajuan)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pengajuan->id}}</td>
                                <td>{{Carbon::parse($pengajuan->created_at)->format('d F Y')}}</td>
                                <td>{{$pengajuan->nama_barang}}</td>
                                <td>{{$pengajuan->jumlah_barang}}</td>
                                <td>{{$pengajuan->jenis_barang->nama}}</td>
                                @if(Auth::user()->type == '1' || Auth::user()->type == '2')
                                    <td>
                                    {{$pengajuan->keterangan == 0 ? 'Menunggu' : ($pengajuan->keterangan == 1 ? 'Diterima' : 'Ditolak')}}
                                    </td>
                                @elseif($pengajuan->keterangan == 0)
                                <td class="flex justify-center gap-6">
                                    <form action="{{ route('pengajuanAccept', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="flex items-center w-4 gap-1 text-3xl text-green-600 rounded-lg">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('pengajuanReject', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="flex items-center w-4 gap-1 text-3xl text-red-600 rounded-lg">
                                            <i class="fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                </td>
                                @else
                                <td>
                                    {{$pengajuan->keterangan == 1 ? 'Diterima' : 'Ditolak'}}
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambahPermohonan" tabindex="-1" aria-labelledby="tambahPermohonanLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPermohonanLabel">Tambah Permohonan Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tambahPermohonan') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3 ">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" rows="3" />
                    </div >

                    <div class="mb-3">
                        <label for="jenis-barang" class="form-label">Jenis Barang</label>
                        <div>
                            <select name="jenis_barang" id="jenis_barang" class="w-full">
                                @foreach($jenis_barangs as $jenis_barang)
                                    <option value="{{ $jenis_barang->id }}">{{ $jenis_barang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-3 mb-3">
                        <div> <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama_pemohon" id="nama_pemohon" rows="3" readonly />
                    </div>
                        <div>
                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" rows="3" />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-app-layout>
