<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Laporan<i
                    class="fa-solid fa-chevron-right"></i>Barang Keluar</div>
        </div>

        <div class="card bg-[#90caf96c]">
            <div class="text-xl text-white bg-[#283593] card-header">Laporan Data Barang Keluar</div>
            <div class="card-body" id="table-stok">
                <form action="{{ route('laporanBarangKeluar') }}" method="GET">

                    <div class="flex flex-wrap items-end gap-3 mb-3 text-black">
                        <div>
                            <div>Tanggal Awal</div>
                            <input
                                class="rounded-lg shadow-lg"
                                type="date"
                                name="tanggal_awal"
                                value="{{ request('tanggal_awal', optional($barangKeluar->first())->tanggal ?? '') }}"
                                required>

                        </div>
                        <div>
                            <div>Tanggal Akhir</div>
                            <input
                                class="rounded-lg shadow-lg"
                                type="date"
                                name="tanggal_akhir"
                                value="{{ request('tanggal_akhir', optional($barangKeluar->last())->tanggal ?? '') }}"
                                required>
                        </div>

                        <div class="flex gap-3 text-white">
                            <button type="submit" class="btn flex gap-2 lg:ml-6 text-white bg-[#283593] h-fit ">
                                Tampilkan
                            </button>
                            @if($barangKeluar->isNotEmpty())
                            <button type="submit" class="flex gap-2 text-white bg-green-500 btn h-fit">
                                Cetak
                            </button>

                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabel Hasil -->
        @if($barangKeluar->isNotEmpty())
        <div class="card bg-[#90caf96c]">
            <div class="text-base text-white bg-[#283593] card-header">Laporan Data Barang Masuk Periode Tanggal
                {{ Carbon::parse($tanggalAwal)->format('d/m/Y') }} s.d
                {{ Carbon::parse($tanggalAkhir)->format('d/m/Y') }}</div>

                <div class="card-body" id="table-stok">
                    <table class="table border-black table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Lokasi Barang</th>
                                <th scope="col">Label Barang</th>
                                <!-- <th scope="col">Spesifikasi Barang</th> -->
                                <th scope="col">Jumlah Masuk</th>

                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                                @foreach($barangKeluar as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>{{ $item->barang->lokasi_barang }}</td>
                                        <!-- <td class="overflow-hidden text-ellipsis text-nowrap" style="max-width: 200px;">{{ $item->barang->spesifikasi_barang }}</td> -->
                                        <td >{{ $item->barang->label_barang }}</td>
                                        <td>{{ $item->jumlah }}</td>


                                        <td>
                                            <button type="button" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg">
                                                <i class="text-white fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="px-2.5 py-2 text-black bg-red-600 rounded-lg">
                                                <i class="text-white fa-solid fa-trash-can"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                        </tbody>
                    </table>
                </div>

        </div>
        @else
        <p>Belum ada data untuk ditampilkan. Silakan pilih rentang tanggal.</p>
        @endif

        </div>
    </div>



</x-app-layout>
