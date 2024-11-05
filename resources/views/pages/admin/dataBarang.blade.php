<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Barang<i
                    class="fa-solid fa-chevron-right"></i>Data Barang</div>
        </div>
        @if(Auth::user()->type == 1)
            <div class="flex justify-end">
                <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                    data-bs-target="#tambahBarang">
                    <i class="fa-regular fa-square-plus"></i>
                    Tambah
                </button>
            </div>
        @endif
        <div class="flex items-center justify-end w-full gap-3">
            <div class="flex gap-2">
                <img src="{{asset('images/search.png') }}" alt="">
                Cari
            </div>
            <div>
                <input type="text" class="w-52" id="searchBarang">
            </div>
        </div>
        <div class="">
            <div class="card bg-[#90CAF9]" id="laporan-masuk">
                <div class="text-xl text-white bg-[#283593] card-header">Data Barang</div>
                <div class="card-body">
                    <table class="table border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">ID Barang</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <!-- <th scope="col">Label Barang</th> -->
                                <th scope="col">Lokasi Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang)
                            <tr>
                                <td>{{ $barang->id }}</td>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->jenis_barang->nama }}</td>
                                <!-- <td>{{ $barang->label_barang }}</td> -->
                                <td>{{ $barang->lokasi_barang }}</td>
                                <td>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></button>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg"><i
                                            class="text-white fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="tambahBarangLabel"
    aria-hidden="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahBarangLabel">Tambah Barang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tambahBarang') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="flex gap-3 mb-3">
                        <div>
                            <label for="nama-barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama-barang" id="nama-barang" rows="3" />
                        </div>
                        <div>
                            <label for="stok-min" class="form-label">Stok Minimum</label>
                            <input type="number" class="form-control" name="stok-min" id="stok-min" rows="3" />
                        </div>
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
                        <div> <label for="lokasi_barang" class="form-label">Lokasi Barang</label>
                        <input type="text" class="form-control" name="lokasi_barang" id="lokasi-barang" rows="3" />
                    </div>
                        <div>
                            <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" name="jumlah_barang" id="jumlah-barang" rows="3" />
                        </div>
                    </div>
                        <label for="foto" class="form-label">Foto Barang</label>
                        <div class="p-3 bg-slate-100 rounded-2xl">
                            <input type="file" class="form-control" name="foto" id="foto" rows="3" />
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
