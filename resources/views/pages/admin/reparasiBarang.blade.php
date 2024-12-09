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


        <div class="mb-4">
            <label for="filterBarang" class="block mb-2 text-lg font-medium">Cari Berdasarkan Nama Barang:</label>
            <select id="filterBarang" class="w-full p-2 border border-gray-300 rounded-lg form-select">
                <option value="all">Semua Barang</option>
                @foreach($grouping as $reparasiBarang)
                <option value="{{ $reparasiBarang->barang?->nama_barang }}">{{ $reparasiBarang->barang?->nama_barang }}</option>
                @endforeach
            </select>
        </div>
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
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="">
                    <table class="table bg-transparent border-black table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Spesifikasi Barang</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Tanggal Reparasi</th>
                                <th scope="col">Tanggal Selesai</th>
                                <th scope="col">Status Reparasi</th>
                                @if(Auth::user()->type == 1)
                                <th scope="col">Aksi</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="reparasiTable">
                            @foreach($reparasiBarangs as $reparasiBarang)
                            <tr data-nama-barang="{{ $reparasiBarang->barang?->nama_barang }}">
                                <td>{{ $reparasiBarang->barang?->nama_barang ?? 'Data tidak tersedia' }}</td>
                                <td>{{$reparasiBarang->barang->spesifikasi_barang ?? 'Data tidak tersedia'}}</td>
                                <td>{{$reparasiBarang->keterangan ?? '-'}}</td>
                                <td>{{ Carbon::parse($reparasiBarang->tanggal_reparasi)->format('d F Y') ?? 'Data tidak tersedia' }}</td>
                                <td>{{ $reparasiBarang->tanggal_selesai ? Carbon::parse($reparasiBarang->tanggal_selesai)->format('d F Y') : '-' }}</td>
                                <td>{{$reparasiBarang->status == 0 ? 'Menunggu' : 'Selesai'}}</td>
                                @if(Auth::user()->type == 1)
                                <td>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg" data-bs-toggle="modal" data-bs-target="#editReparasi-{{$reparasiBarang->id}}"><i
                                            class="text-white fa-solid fa-pen-to-square"></i></button>
                                    <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg" data-bs-toggle="modal" data-bs-target="#hapusReparasi-{{$reparasiBarang->id}}"><i
                                            class="text-white fa-solid fa-trash-can"></i></button>
                                </td>
                                @endif
                            </tr>

                            <div class="modal fade" id="editReparasi-{{$reparasiBarang->id}}" tabindex="-1" aria-labelledby="editReparasiLabel-{{$reparasiBarang->id}}"
                                aria-hidden="false">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editReparasiLabel-{{$reparasiBarang->id}}">Edit Reparasi Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('editReparasiBarang', $reparasiBarang->id) }}" method="POST" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $reparasiBarang->id }}">

                                                <div class="mb-3">
                                                    <label for="barang" class="form-label">Barang</label>
                                                    <div>
                                                        <select name="barang" id="barang" class="form-control">
                                                            @foreach($barangs as $barang)
                                                                <option value="{{ $barang->id }}" {{ $barang->id == $reparasiBarang->barang_id ? 'selected' : '' }}>
                                                                    {{ $barang->nama_barang }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="keterangan" class="form-label">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan" id="keterangan" value="{{ $reparasiBarang->keterangan }}" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tanggal_reparasi" class="form-label">Tanggal Reparasi</label>
                                                    <input type="date" class="form-control" name="tanggal_reparasi" id="tanggal_reparasi" value="{{ $reparasiBarang->tanggal_reparasi }}" required/>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" value="{{ $reparasiBarang->tanggal_selesai }}" />
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

                            <div class="modal fade" id="hapusReparasi-{{$reparasiBarang->id}}" tabindex="-1" aria-labelledby="hapusReparasiLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="hapusReparasiLabel">Hapus Reparasi Barang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('hapusReparasiBarang') }}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                <input type="text" class="form-control" id="id" name="id" value="{{$reparasiBarang->id}}" hidden>
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


                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" rows="3" />
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_reparasi" class="form-label">Tanggal Reparasi</label>
                                <input type="date" class="form-control"  name="tanggal_reparasi" id="tanggal_reparasi"  required/>
                        </div>

                        <div>
                            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control"  name="tanggal_selesai" id="tanggal_selesai"  />
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

    <script>
        document.getElementById('filterBarang').addEventListener('change', function () {
            const selectedBarang = this.value.toLowerCase();
            const rows = document.querySelectorAll('#reparasiTable tr');

            rows.forEach(row => {
                const namaBarang = row.getAttribute('data-nama-barang')?.toLowerCase();

                if (selectedBarang === 'all' || namaBarang === selectedBarang) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>
