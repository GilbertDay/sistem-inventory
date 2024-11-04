<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="mb-3 card laporan-tabel" id="laporan-masuk">
            <div class="text-xl text-white bg-gray-400 card-header">Daftar User</div>
            <div class="card-body">
                <div class="flex items-center justify-between w-full gap-4 mb-3">
                    <div class="w-1/2">
                        <label for="roleFilter" class="form-label">Filter by Role</label>
                        <select id="roleFilter" class="form-select">
                            <option value="all">All</option>
                            <option value="User">User</option>
                            <option value="Dosen">Dosen</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahSupplier"
                        class="p-2 mb-4 text-black bg-blue-400 rounded-lg hover:bg-slate-300">Tambah
                        User</button>
                </div>
            </div>
        </div>

        <div class="">
            <div class="card bg-[#90CAF9]">
                <div class="text-xl text-white bg-[#283593] card-header">Data Barang Keluar</div>
                <div class="card-body">
                    <table class="table border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Belinda</td>
                                <td>Jl.Tata Bumi No.A3</td>
                                <td>082146653428</td>
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
    <div class="modal fade" id="tambahSupplier" tabindex="-1" aria-labelledby="tambahSupplierLabel"
    aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahSupplierLabel">Tambah Baarang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahJenisBarang') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                            <div class="mb-3">
                                <label for="nama-supplier" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" name="nama-supplier" id="nama-supplier">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat">
                            </div>

                            <div class="mb-3">
                                <label for="no-telp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" name="no-telp" id="no-telp">
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
