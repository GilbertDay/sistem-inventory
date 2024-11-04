<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Pengajuan<i
                    class="fa-solid fa-chevron-right"></i>Permohonan</div>
        </div>
        <div class="flex justify-end">

            <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                data-bs-target="#tambahPermohonan">
                <i class="fa-regular fa-square-plus"></i>
                Tambah
            </button>
        </div>
        <div class="">
            <div class="card bg-[#90CAF9]" id="laporan-masuk">
                <div class="text-xl text-white bg-[#283593] card-header">Data Pengajuan Permohonan Pengadaan Barang
                </div>
                <div class="card-body">
                    <table class="table border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Pengajuan</th>
                                <th scope="col">Tanggal Pengajuan</th>
                                <th scope="col">Nama Pemohon</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>PGJ-001</td>
                                <td>26 September 2024</td>
                                <td>{{Auth::user()->name}}</td>
                                <td>Laptop Asus</td>
                                <td>5</td>
                                <td>Elektronik</td>
                                <td>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></button>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg"><i
                                            class="text-white fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>

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
                        <h5 class="modal-title" id="tambahPermohonanLabel">Tambah Pengajuan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tambahPermohonan') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3">
                                <label for="nama-barang" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control" name="nama-barang" id="nama-barang" rows="3" />
                            </div>
                            <div class="mb-3">
                                <label for="jenis-barang" class="form-label">Jenis Barang</label>
                                <div>
                                    <select name="jenis-barang" id="" class="w-full">
                                        <option value="Elektronik">Elektronik</option>
                                        <option value="Furniture">Furniture</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                            </div>
                            <div class="mb-3">
                                <div>
                                    <label for="jumlah-barang" class="form-label">Jumlah Barang</label>
                                <input type="number" class="form-control" name="jumlah-barang" id="jumlah-barang" rows="3" />
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
