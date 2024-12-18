<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Barang<i
                    class="fa-solid fa-chevron-right"></i>Jenis Barang</div>
        </div>
        <div class="flex justify-end">

            <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                data-bs-target="#tambahJenisBarang">
                <i class="fa-regular fa-square-plus"></i>
                Tambah
            </button>
        </div>
        <div class="">
            <div class="card bg-[#90CAF9]" id="laporan-masuk">
                <div class="text-xl text-white bg-[#283593] card-header">Data Jenis Barang</div>
                <div class="card-body">
                    <table class="table border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jenis_barangs as $jenis_barang)
                            <tr>
                                <td>{{$jenis_barang->nama}}</td>
                                <td>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg" data-bs-toggle="modal"
                                    data-bs-target="#editJenisBarang-{{ $jenis_barang->id }}"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></button>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg" data-bs-toggle="modal"
                                    data-bs-target="#hapusJenisBarang-{{ $jenis_barang->id }}"><i
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
    @foreach($jenis_barangs as $jenis_barang)
    <div class="modal fade" id="editJenisBarang-{{$jenis_barang->id}}" tabindex="-1" aria-labelledby="editJenisBarangLabel"
    aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJenisBarangLabel">Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('editJenisBarang') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="id" value="{{$jenis_barang->id}}">
                        <div>
                            <label for="nama" class="form-label">Nama Jenis Barang</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{$jenis_barang->nama}}" rows="3" />
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

    <div class="modal fade" id="hapusJenisBarang-{{$jenis_barang->id}}" tabindex="-1" aria-labelledby="hapusJenisBarangLabel"
        aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusJenisBarangLabel">Hapus Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('hapusJenisBarang') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="id" value="{{$jenis_barang->id}}">
                            <p>Apakah anda yakin ingin menghapus data ini ?</p>
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
    <div class="modal fade" id="tambahJenisBarang" tabindex="-1" aria-labelledby="tambahJenisBarangLabel"
    aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahJenisBarangLabel">Tambah Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahJenisBarang') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div>
                            <label for="nama" class="form-label">Nama Jenis Barang</label>
                        <input type="text" class="form-control" name="nama" id="nama" rows="3" />
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
