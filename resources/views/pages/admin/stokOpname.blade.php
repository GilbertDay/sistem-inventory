<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Laporan<i
                    class="fa-solid fa-chevron-right"></i>Stok Opname</div>
        </div>
        <!-- <div class="flex justify-end">

            <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                data-bs-target="#tambahBarangKeluar">
                <i class="fa-regular fa-square-plus"></i>
                Tambah
            </button>
        </div> -->
        @if(Auth::user()->type != 0 )
        <div class="p-4 bg-[#90caf971] rounded-2xl  ">
            <div class="bg-[#283593] px-4 py-2 rounded-lg text-white mb-3">Tambah Laporan Stok Opname</div>
            <form action="{{route('tambahStokOpname')}}" method="POST" enctype="application/x-www-form-urlencoded">
                @csrf
                <div class="flex items-end w-full gap-11">
                    <div class="flex gap-4 text-black">
                        <div class="flex flex-col">
                            <label class="mb-2">Nama Barang</label>
                            <select name="barang_id" id="barang-select" required>
                                <option value="">Pilih Barang</option>
                                @foreach($barang as $b)
                                    <option value="{{$b->id}}"
                                            data-specs="{{ $b->spesifikasi_barang }}">
                                        {{$b->nama_barang}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-2">Jumlah Fisik</label>
                            <input type="number" name="jumlah_fisik" required>
                        </div>
                        <div class="flex flex-col">
                            <label class="mb-2">Tanggal</label>
                            <input type="date" name="tanggal" required>
                        </div>
                    </div>

                    <button type="submit" class="btn flex h-fit gap-2 bg-[#283593] text-white">Simpan</button>
                </div>

                <!-- Menampilkan Spesifikasi dan Stok Barang -->
                <div id="barang-details" class="hidden mt-4">
                    <p><strong>Spesifikasi:</strong> <span id="barang-specs"></span></p>
                </div>
            </form>
        </div>
        @endif

        @if($stok_opname->count() > 0 )
        <div class="card bg-[#90CAF9]">
            <div class="text-xl text-white bg-[#283593] card-header">Laporan Stok Opname</div>
            <div class="card-body" id="table-stok">

                <table class="table border-black table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle">No</th>
                            <th scope="col" class="text-center align-middle">Nama Barang</th>
                            <th scope="col" class="text-center align-middle">Spesifikasi Barang</th>
                            <th scope="col" class="text-center align-middle">Lokasi Barang</th>
                            <th scope="col" class="text-center align-middle">Tanggal</th>
                            <th scope="col" class="text-center align-middle">Jumlah Fisik</th>
                            @if(Auth::user()->type == 0)
                            <th scope="col" class="text-center align-middle">Jumlah Sistem</th>
                            <th scope="col" class="text-center align-middle">Selisih</th>
                            <th scope="col" class="text-center align-middle">Status</th>
                            @else
                            <th scope="col" class="text-center align-middle">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stok_opname as $so)
                        <tr>
                            <td class="text-center align-middle">{{$loop->iteration}}</td>
                            <td class="align-middle">{{$so->barang->nama_barang}}</td>
                            <td class="align-middle">{{$so->barang->spesifikasi_barang}}</td>
                            <td class="align-middle">{{$so->barang->lokasi_barang}}</td>
                            <td class="align-middle">{{Carbon::parse($so->tanggal)->format('d F Y')}}</td>
                            <td class="text-center align-middle">{{$so->jumlah_fisik}}</td>
                            @if(Auth::user()->type == 0)
                            <td class="text-center align-middle">{{$so->barang->stok}}</td>
                            <td class="text-center align-middle">{{$so->jumlah_fisik - $so->barang->stok}}</td>
                                @if($so->jumlah_fisik % $so->barang->stok == 0)
                                <td class="text-center align-middle">
                                    <div class="px-2.5 py-1 bg-green-500 rounded-xl text-center">Sesuai</d>
                                </td>
                                @else
                                <td class="flex justify-center gap-2 text-center text-white">
                                    <div class="px-2.5 py-1 bg-red-500 rounded-xl flex items-center">Tidak Sesuai</div>
                                    <button type="button" class="px-2.5 py-2   bg-blue-600 rounded-lg hover:bg-white hover:text-black"  data-bs-toggle="modal"
                                        data-bs-target="#sesuaikanStokOpname-{{ $so->id }}">
                                    Sesuaikan Stok </i>
                                        </button>
                                </td>
                                @endif
                            @else
                            <td class="text-center ">
                                <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg"><i
                                        class="text-white fa-solid fa-pen-to-square"></i></button>
                                <button type="submit" data-bs-toggle="modal"
                                data-bs-target="#hapusBarangMashapusStokOpname-{{ $so->id }}" class="px-2.5 py-2 text-black bg-red-600 rounded-lg"><i
                                        class="text-white fa-solid fa-trash-can"></i></button>
                            </td>
                            @endif
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="text-center">
            Tidak ada  Data Stok Opname
        </div>
        @endif

    </div>

    @foreach($stok_opname as $so)

    <div class="modal fade" id="sesuaikanStokOpname-{{ $so->id }}" tabindex="-1" aria-labelledby="deleteStokOpname"
        aria-hidden="false">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusStokOpname">Sesuaikan Stok Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('sesuaikanStokOpname') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" value="{{$so->barang_id}}" name="barang_id">
                        <input type="hidden" value="{{$so->jumlah_fisik}}" name="jumlah_fisik">
                        <div class="mb-7">
                            <div class="mb-10 font-semibold">
                                Pastikan Anda/Staff Anda tidak melakukan transaksi apapun, karena proses ini akan mempengaruhi riwayat tok barang anda!
                            </div>

                            <div class="text-gray-500 ">Apakah Anda yakin untuk menyesuaikan stok fisik dengan stok barang saat ini?</div>
                        </div>
                        <div></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="hapusBarangMashapusStokOpname-{{ $so->id }}" tabindex="-1" aria-labelledby="deleteStokOpname"
        aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusStokOpname">Hapus Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('hapusStokOpname') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" value="{{$so->id}}" name="id">
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
    <script>
                 document.getElementById('form-barang').addEventListener('submit', function(event) {
        const selectElement = document.getElementById('barang-select');
        const errorElement = document.getElementById('barang-error');

        // Check if the select value is empty
        if (selectElement.value === "") {
            errorElement.classList.remove('hidden');  // Show error message
            event.preventDefault();  // Prevent form submission
        } else {
            errorElement.classList.add('hidden');  // Hide error message
        }
    });
    </script>
    <script>


        document.getElementById('barang-select').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];

            const specs = selectedOption.getAttribute('data-specs');


            // Update tampilan detail barang
            document.getElementById('barang-specs').textContent = specs;


            // Tampilkan div detail barang
            document.getElementById('barang-details').classList.remove('hidden');
        });
    </script>
</x-app-layout>
