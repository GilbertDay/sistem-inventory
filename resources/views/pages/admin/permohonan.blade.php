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
                                <th scope="col" class="text-center align-middle">No</th>
                                <th scope="col" class="text-center align-middle">Nama Barang</th>
                                <th scope="col" class="text-center align-middle">Tanggal Pengajuan</th>
                                <th scope="col" class="text-center align-middle">Jumlah Barang</th>
                                <th scope="col" class="text-center align-middle">Nama Pemohon</th>
                                <th scope="col" class="text-center align-middle">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengajuans as $pengajuan)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$pengajuan->nama_barang}}</td>
                                <td>{{Carbon::parse($pengajuan->created_at)->format('d F Y')}}</td>
                                <td class="text-center">{{$pengajuan->jumlah_barang}}</td>
                                <td>{{$pengajuan->user->name}}</td>
                                @if(Auth::user()->type == '1' || Auth::user()->type == '2')
                                    <td class="px-3 text-center bg-red-500">
                                    {{$pengajuan->keterangan == 0 ? 'Menunggu' : ($pengajuan->keterangan == 1 ? 'Diterima' : 'Ditolak')}}
                                    </td>
                                @elseif($pengajuan->keterangan == 0)
                                <td class="flex justify-center gap-2">
                                    <form action="{{ route('pengajuanAccept', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-2.5 py-2 text-white bg-green-600 rounded-lg">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('pengajuanReject', $pengajuan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="py-2 text-white bg-red-500 px-2.5 rounded-lg h-f">
                                            <i class=" fa-solid fa-circle-xmark"></i>
                                        </button>
                                    </form>
                                    <button type="button" class="px-2.5 py-2 text-white bg-blue-600 rounded-lg"  data-bs-toggle="modal"
                                    data-bs-target="#detailPermohonanan-{{ $pengajuan->id }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                                @else
                                <td>
                                    <div class="{{ $pengajuan->keterangan == 1 ? 'bg-green-500' : 'bg-red-500' }} px-3 text-center text-white rounded-2xl">
                                        {{ $pengajuan->keterangan == 1 ? 'Diterima' : 'Ditolak' }}
                                    </div>

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

    @foreach($pengajuans as $pengajuan)
        <div class="modal fade" id="detailPermohonanan-{{ $pengajuan->id }}" tabindex="-1" aria-labelledby="detailPermohonanan"
            aria-hidden="false">
        <div class=" modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailBarangLabel">Detail Pengajuan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="flex w-full gap-4">
                        <div>
                            <div>Nama</div>
                            <div>Jenis</div>
                            <div>Spesifikasi</div>
                            <div>Alasan</div>
                        </div>
                        <div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                            <div>:</div>
                        </div>
                        <div>
                            <div>{{$pengajuan->nama_barang}}</div>
                            <div>{{$pengajuan->jenis_barang->nama}}</div>
                            <div class="overflow-hidden text-ellipsis text-nowrap" style="max-width: 500px;">
                                {{$pengajuan->spesifikasi_barang}}
                            </div>
                            <div class="overflow-hidden text-ellipsis text-nowrap" style="max-width: 500px;">
                                {{$pengajuan->alasan}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

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
                        <div>
                            <label for="nama_pemohon" class="form-label">Nama Pemohon</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="nama_pemohon" id="nama_pemohon" rows="3" readonly />
                        </div>

                        <div>
                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" name="jumlah_barang" id="jumlah_barang" rows="3" />
                        </div>

                    </div>

                    <div>
                        <label for="spesifikasi_barang" class="form-label">Spesifikasi Barang</label>
                        <input type="text" class="form-control"  name="spesifikasi_barang" id="spesifikasi_barang" rows="3" />
                    </div>

                    <div>
                        <label for="alasan" class="form-label">Alasan Pengajuan</label>
                        <textarea class="form-control" name="alasan" id="alasan" rows="3"></textarea>
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
