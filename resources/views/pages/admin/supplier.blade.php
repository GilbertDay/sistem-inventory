<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <!-- <div class="mb-3 card laporan-tabel" id="laporan-masuk">
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
        </div> -->

        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Pengajuan<i
                    class="fa-solid fa-chevron-right"></i>Supplier</div>
        </div>

        <div class="flex justify-end">
            <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                data-bs-target="#tambahSupplier">
                <i class="fa-regular fa-square-plus"></i>
                Tambah
            </button>
        </div>

        <div class="">
            <div class="card bg-[#90CAF9]">
                <div class="text-xl text-white bg-[#283593] card-header">Data Supplier</div>
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
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{$supplier->nama}}</td>
                                <td>{{$supplier->alamat}}</td>
                                <td>{{$supplier->no_telp}}</td>
                                <td>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></button>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg"  data-bs-toggle="modal"
                                    data-bs-target="#hapusSupplier-{{ $supplier->id }}"><i
                                            class="text-white fa-solid fa-trash-can"></i></button>
                                </td>
                            </tr>

                            <div class="modal fade" id="hapusSupplier-{{$supplier->id}}" tabindex="-1" aria-labelledby="hapusSuppliersLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusSuppliersLabel">Hapus Supplier</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('hapusSupplier') }}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="text" class="form-control" id="id" name="id" value="{{$supplier->id}}" hidden>
                                                <p>Apakah anda yakin ingin menghapus user ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
                    <h5 class="modal-title" id="tambahSupplierLabel">Tambah Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahSupplier') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat">
                            </div>

                            <div class="mb-3">
                                <label for="no_telp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" name="no_telp" id="no_telp">
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
