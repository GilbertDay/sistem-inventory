<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Transaksi<i
                    class="fa-solid fa-chevron-right"></i>Barang Masuk</div>
        </div>
        <div class="flex justify-end">

            <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                data-bs-target="#tambahBarangMasuk">
                <i class="fa-regular fa-square-plus"></i>
                Tambah
            </button>
        </div>
        <div class="">
            <div class="card bg-[#90CAF9]" id="laporan-masuk">
                <div class="text-xl text-white bg-[#283593] card-header">Data Barang Masuk</div>
                <div class="card-body">
                    <table class="table border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ID Transaksi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Masuk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BRG-001</td>
                                <td>26 September 2024</td>
                                <td>Laptop Asus</td>
                                <td>5</td>
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

    <div class="modal fade" id="tambahBarangMasuk" tabindex="-1" aria-labelledby="tambahBarangMasukLabel"
    aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahBarangMasukLabel">Tambah Baarang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahJenisBarang') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="flex w-full gap-3 mb-3">
                            <div class="w-1/2">
                                <label for="nama-barang" class="form-label">Nama Barang</label>
                                <div >
                                    <select name="nama-barang" id="" class="w-full" >
                                        <option value="Elektronik">Laptop Asus</option>
                                        <option value="Furniture">Laptop Lenovo</option>
                                        <option value="Lainnya">Printer HP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <label for="nama-supplier" class="form-label">Nama Supplier</label>
                                <div>
                                    <select name="nama-supplier" id="" class="w-full" >
                                        <option value="Elektronik">CV Senja</option>
                                        <option value="Furniture">PT Black</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex w-full gap-3 mb-3">
                            <div class="w-1/2">
                                <label for="tanggal" class="form-label">Nama Barang</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal">
                            </div>
                            <div class="w-1/2">
                                <label for="jumlah" class="form-label">Jumlah Masuk</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah">
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
