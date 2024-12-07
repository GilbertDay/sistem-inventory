<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Barang<i
                    class="fa-solid fa-chevron-right"></i>Reparasi Barang</div>
        </div>
        @if(Auth::user()->type == 1)
            <div class="flex justify-end">
                <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                    data-bs-target="#tambahReparasiBarang">
                    <i class="fa-regular fa-square-plus"></i>
                    Tambah
                </button>
            </div>
        @endif
        <!-- <div class="flex items-center justify-end w-full gap-3">
            <div class="flex gap-2">
                <img src="{{asset('images/search.png') }}" alt="">
                Cari
            </div>
            <div>
                <input type="text" class="w-52" id="searchBarang">
            </div>
        </div> -->
        <div class="p-4 bg-[#90caf971] rounded-2xl  ">
            <div class="" id="laporan-masuk">
                <div class="text-xl text-white bg-[#283593] card-header mb-4">Data Reparasi Barang</div>
                <div class="">
                    <table class="table bg-transparent border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <!-- <th scope="col">Jumlah Barang</th> -->
                                <th scope="col">Spesifikasi Barang</th>
                                <th scope="col">Tanggal Reparasi</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Status Reparasi</th>
                                @if(Auth::user()->type == 1)
                                <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reparasiBarangs as $reparasiBarang)
                            <tr>
                                <td>{{$reparasiBarang->barang->nama_barang}}</td>
                                <!-- <td>{{$reparasiBarang->jumlah_barang}}</td> -->
                                <td>{{$reparasiBarang->barang->spesifikasi_barang}}</td>
                                <td>{{ Carbon::parse($reparasiBarang->tanggal_reparasi)->format('d F Y') }}
                                    <td>{{ $reparasiBarang->tanggal_selesai ? Carbon::parse($reparasiBarang->tanggal_selesai)->format('d F Y') : '-' }}
                                </td>
                                <td>{{$reparasiBarang->status == 0 ? 'Menunggu' : 'Selesai'}}</td>
                                @if(Auth::user()->type == 1)
                                <td>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></button>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg"><i
                                            class="text-white fa-solid fa-trash-can"></i></button>
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

    <div class="modal fade" id="tambahReparasiBarang" tabindex="-1" aria-labelledby="tambahReparasiBarangLabel"
    aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahReparasiBarangLabel">Tambah Reparasi Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahReparasiBarang') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf


                        <div class="mb-3">
                            <label for="barang" class="form-label">Barang</label>
                            <div>
                                <select name="barang" id="" class="w-full">
                                    @foreach($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="jml_reparasi" class="form-label">Stok Minimum</label>
                            <input type="number" class="form-control" name="jml_reparasi" id="jml_reparasi" rows="3" />
                        </div> -->

                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" rows="3" />

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
