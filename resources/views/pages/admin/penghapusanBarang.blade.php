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
                    data-bs-target="#tambahPenghapusanBarang">
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
        <div class="card bg-[#90CAF9]" id="penghapusanBarang">
            <div class="text-xl text-white bg-[#283593] card-header">Data Barang Penghapusan</div>
            <div class="card-body">
                <table class="table border-black table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Tanggal Penghapusan</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="barangTableBody">
                        @foreach($penghapusanBarangs as $penghapusanBarang)
                        <tr>
                            <td>{{$penghapusanBarang->barang->nama_barang}}</td>
                            <td>{{Carbon::parse($penghapusanBarang->tanggal_hapus)->format('d F Y')}}</td>
                            <td>{{$penghapusanBarang->jumlah}}</td>
                            <td>{{$penghapusanBarang->keterangan}}</td>
                            <td>
                                <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg">
                                    <i class="text-white fa-solid fa-pen-to-square"></i>
                                </button>
                                <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg">
                                    <i class="text-white fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="modal fade" id="tambahPenghapusanBarang" tabindex="-1" aria-labelledby="tambahPenghapusanBarangLabel"
    aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahPenghapusanBarangLabel">Tambah Penghapusan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahPenghapusanBarang') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="flex flex-col mb-3" >
                            <label for="nama-barang" class="form-label">Nama Barang</label>
                            @if(isset($barangs) && $barangs->count() > 0)
                                <select name="barang_id" class="w-full">
                                    @foreach($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" value="Tidak ada barang" readonly/>
                            @endif

                        </div>

                        <div class="flex gap-3">
                            <div>
                                <label for=" ">Tanggal</label>
                                <input type="date" name="tanggal" class="w-full">
                            </div>
                            <div>
                                <label for=" ">Jumlah</label>
                                <input type="number" name="jumlah" class="w-full">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ket-hapus" class="form-label">Keterangan</label>
                            <div>
                                <select name="keterangan" id="" class="w-full">
                                    <option value="Rusak Total">Rusak Total</option>
                                    <option value="Dihibahkan">Dihibahkan</option>
                                </select>
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

    <script>
        document.getElementById('searchBarang').addEventListener('input', function() {
        var searchTerm = this.value.toLowerCase(); // Mengambil nilai pencarian
        var rows = document.querySelectorAll('#barangTableBody tr'); // Mengambil semua baris tabel
            rows.forEach(function(row) {
                var namaBarang = row.querySelector('td:nth-child(1)').textContent.toLowerCase(); // Mendapatkan nama barang pada kolom pertama
                if (namaBarang.includes(searchTerm)) {
                    row.style.display = ''; // Menampilkan baris yang sesuai
                } else {
                    row.style.display = 'none'; // Menyembunyikan baris yang tidak sesuai
                }
            });
        });
    </script>
</x-app-layout>
