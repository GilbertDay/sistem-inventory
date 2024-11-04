<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-3 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="flex items-center gap-3 text-lg"><i class="fa-solid fa-chevron-right"></i>Laporan<i
                    class="fa-solid fa-chevron-right"></i>Barang Keluar</div>
        </div>

        <div class="flex justify-end">

            <button type="button" class="btn flex gap-2 bg-[#283593] text-white" data-bs-toggle="modal"
                data-bs-target="#tambahLaporanBarangKeluar">
                <i class="fa-regular fa-square-plus"></i>
                Tambah
            </button>
        </div>

        <div class="flex flex-col gap-4">
            <div class="card bg-[#90caf96c]">
                <div class="text-xl text-white bg-[#283593] card-header">Laporan Data Barang Keluar</div>
                <div class="card-body" id="table-stok">
                    <div class="flex flex-wrap items-end gap-3 mb-3 text-black">
                        <div>
                            <div>Tanggal Awal</div>
                            <input class="rounded-lg shadow-lg" type="text" id="from" name="from">

                        </div>
                        <div>
                            <div>Tanggal Akhir</div>
                            <input class="rounded-lg shadow-lg" type="text" id="to" name="to">
                        </div>
                        <div class="flex gap-2.5">
                            <button type="button" class="btn flex gap-2 lg:ml-6 bg-[#283593] h-fit  text-white">
                                Tampilkan
                            </button>
                            <button type="button" class="btn flex gap-2 bg-[#F57C00] h-fit  text-white">
                                Cetak
                            </button>
                            <button type="button" class="btn flex gap-2 bg-[#43A047] h-fit  text-white">
                                Export
                            </button>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>

            <!-- Tabel Hasil -->
            <div class="card bg-[#90caf96c]">
                <div class="text-base text-white bg-[#283593] card-header">Laporan Data Barang Masuk Periode Tanggal
                    01-08-2024 s.d 14-08-2024</div>

                <div class="card-body" id="table-stok">
                    <table class="table border-black table-bordered">
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
                                <td>3</td>
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


    <div class="modal fade" id="tambahLaporanBarangKeluar" tabindex="-1" aria-labelledby="tambahLaporanBarangKeluarLabel"
    aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahLaporanBarangKeluarLabel">Tambah Laporan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahJenisBarang') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div>
                            <label for="nama-barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" name="nama-barang" id="nama-barang" rows="3" />
                        </div>
                        <div class="mb-3">
                            <label for="nama-barang" class="form-label">Nama Barang</label>
                            <div>
                                <select name="nama-barang" id="" class="w-full">
                                    <option value="Elektronik">Laptop Asus</option>
                                    <option value="Furniture">Laptop Lenovo</option>
                                    <option value="Lainnya">Printer HP</option>
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
        $(function () {
            var dateFormat = "mm/dd/yy",
                from = $("#from")
                .datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    to.datepicker("option", "minDate", getDate(this));
                }),
                to = $("#to").datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                .on("change", function () {
                    from.datepicker("option", "maxDate", getDate(this));
                });

            function getDate(element) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value);
                } catch (error) {
                    date = null;
                }

                return date;
            }
        });

    </script>

</x-app-layout>
