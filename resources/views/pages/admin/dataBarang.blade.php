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
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jenis Barang</th>
                                <th scope="col">Label Barang</th>
                                <th scope="col">Spesifikasi Barang</th>
                                <th scope="col">Lokasi Barang</th>
                                @if(Auth::user()->type != '2')
                                <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barangs as $barang)
                            <tr>
                                <td>{{ $barang->nama_barang }}</td>
                                <td>{{ $barang->jenis_barang->nama }}</td>
                                <td>{{ $barang->label_barang }}</td>
                                <td>{{ $barang->spesifikasi_barang }}</td>
                                <td>{{ $barang->lokasi_barang }}</td>
                                @if(Auth::user()->type != '2')
                                <td>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg" data-bs-toggle="modal"
                                    data-bs-target="#editBarang-{{ $barang->id }}"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></button>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg" data-bs-toggle="modal"
                                    data-bs-target="#hapusBarang-{{ $barang->id }}"><i
                                            class="text-white fa-solid fa-trash-can"></i></button>
                                    <button type="button" class="px-2.5 py-2 text-black bg-blue-600 rounded-lg"  data-bs-toggle="modal"
                                    data-bs-target="#detailBarang-{{ $barang->id }}">
                                        <i class="text-white fa-solid fa-eye"></i>
                                    </button>
                                </td>
                                @endif

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @foreach($barangs as $brg)
        <div class="modal fade" clas id="detailBarang-{{ $brg->id }}" tabindex="-1" aria-labelledby="detailBarangLabel">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailBarangLabel">Detail Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body w">
                        <div class="flex items-center justify-center mb-10">
                            <img class="" src="{{asset('images/laptop.jpg') }}" alt="" width="200">
                        </div>
                        <div class="flex gap-4">
                            <div>
                                <div>ID Barang</div>
                                <div>Nama Barang</div>
                                <div>Jenis Barang</div>
                                <div>Label Barang</div>
                                <div>Spesifikasi Barang</div>
                                <div>Lokasi Barang</div>
                            </div>
                            <div>
                                <div>:</div>
                                <div>:</div>
                                <div>:</div>
                                <div>:</div>
                                <div>:</div>
                                <div>:</div>
                            </div>
                            <div>
                                <div class="font-semibold ">{{ $brg->id }}</div>
                                <div class="font-semibold ">{{ $brg->nama_barang ? $brg->nama_barang : '-' }}</div>
                                <div class="font-semibold ">{{ $brg->jenis_barang->nama ? $brg->jenis_barang->nama : '-' }}</div>
                                <div class="font-semibold ">{{ $brg->label_barang ? $brg->label_barang : '-' }}</div>
                                <div class="font-semibold ">{{ $brg->spesifikasi_barang ? $brg->spesifikasi_barang : '-'}}</div>
                                <div class="font-semibold ">{{ $brg->lokasi_barang ? $brg->lokasi_barang : '-' }}</div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editBarang-{{ $brg->id }}" tabindex="-1" aria-labelledby="editBarangLabel" aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBarangLabel">Edit Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('editBarang') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{$brg->id}}" name="id">
                            <div class="flex gap-3 mb-3">
                                <div>
                                    <label for="nama-barang-{{ $brg->id }}" class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama-barang" id="nama-barang-{{ $brg->id }}" value="{{ $brg->nama_barang }}" />
                                </div>
                                <div>
                                    <label for="stok-min-{{ $brg->id }}" class="form-label">Stok Minimum</label>
                                    <input type="number" class="form-control" name="stok-min" id="stok-min-{{ $brg->id }}" value="{{ $brg->min_stok }}" />
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="jenis-barang-{{ $brg->id }}" class="form-label">Jenis Barang</label>
                                <div>
                                    <select name="jenis_barang" id="jenis-barang-{{ $brg->id }}" class="w-full">
                                        @foreach($jenis_barangs as $jenis_barang)
                                            <option value="{{ $jenis_barang->id }}" {{ $jenis_barang->id == $brg->jenis_barang_id ? 'selected' : '' }}>{{ $jenis_barang->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="spesifikasi-barang-{{ $brg->id }}" class="form-label">Spesifikasi Barang</label>
                                <input type="text" class="form-control" name="spesifikasi_barang" id="spesifikasi-barang-{{ $brg->id }}" value="{{ $brg->spesifikasi_barang }}" />
                            </div>
                            <div class="mb-3">
                                <label for="label-barang-{{ $brg->id }}" class="form-label">Label Barang</label>
                                <input type="text" class="form-control" name="spesifikasi_barang" id="label-barang-{{ $brg->id }}" value="{{ $brg->label_barang }}" />
                            </div>
                            <div class="flex gap-3 mb-3">
                                <div>
                                    <label for="lokasi-barang-{{ $brg->id }}" class="form-label">Lokasi Barang</label>
                                    <input type="text" class="form-control" name="lokasi_barang" id="lokasi-barang-{{ $brg->id }}" value="{{ $brg->lokasi_barang }}" />
                                </div>
                                <div>
                                    <label for="jumlah-barang-{{ $brg->id }}" class="form-label">Jumlah Barang</label>
                                    <input type="number" class="form-control" name="jumlah_barang" id="jumlah-barang-{{ $brg->id }}" value="{{ $brg->stok }}" />
                                </div>
                            </div>
                            <label for="foto-{{ $brg->id }}" class="form-label">Foto Barang</label>
                            <div class="p-3 bg-slate-100 rounded-2xl">
                                <input type="file" class="form-control" name="foto" id="foto-{{ $brg->id }}" />
                                @if($brg->foto_barang)
                                    <small>Foto saat ini: {{ $brg->foto_barang }}</small>
                                @endif
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

        <div class="modal fade" id="hapusBarang-{{ $brg->id }}" tabindex="-1" aria-labelledby="deleteBarangMasukLabel"
            aria-hidden="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusBarang">Hapus Barang</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('hapusBarang') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" value="{{$brg->id}}" name="id">
                            <p>Apakah anda yakin ingin menghapus data ini ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="tambahBarangLabel" aria-hidden="false">
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
                        <div class="mb-3">
                            <label for="spesifikasi_barang" class="form-label">Spesifikasi Barang</label>
                            <input type="text" class="form-control" name="spesifikasi_barang" id="spesifikasi_barang"  />
                        </div>
                        <div class="mb-3">
                            <label for="label_barang" class="form-label">Label Barang</label>
                            <input type="text" class="form-control" name="label_barang" id="label_barang"  />
                        </div>
                        <div class="flex gap-3 mb-3">
                            <div>
                                <label for="lokasi_barang" class="form-label">Lokasi Barang</label>
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
