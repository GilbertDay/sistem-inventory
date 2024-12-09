<x-app-layout>
    <div class="flex flex-col w-full gap-4 px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="text-white flex gap-2 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <a href="{{route('dashboard')}}">
                <i class="fa-solid fa-house"></i>
            </a>
            <div class="text-lg">Dashboard</div>
        </div>
        <div class="bg-[#90CAF9] rounded-xl text-black px-6 py-5">
            <div class="grid grid-cols-3 justify-items-center">
                <div class="flex gap-3">
                    <img src="{{asset('images/dashboard-admin/data-barang.png') }}" alt="" width="60">
                    <div>
                        <div>Data Barang</div>
                        <div class="text-2xl">{{$dataBarang}}</div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <img src="{{asset('images/dashboard-admin/barang-masuk.png') }}" alt="" width="50">
                    <div>
                        <div>Barang Masuk</div>
                        <div class="text-2xl">{{$barangMasuk}}</div>
                    </div>
                </div>
                <div class="flex gap-3">
                    <img src="{{asset('images/dashboard-admin/barang-keluar.png') }}" alt="" width="50">
                    <div>
                        <div>Barang Keluar</div>
                        <div class="text-2xl">{{$barangKeluar}}</div>
                    </div>
                </div>

            </div>
        </div>
        <div class="text-white flex gap-2 py-2 px-3 bg-[#283593] items-center w-fit rounded-xl">
            <i class="fa-solid fa-circle-info"></i>
            <div class="text-sm">Stok barang telah mencapai batas minimum</div>
        </div>
        <div class="">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jenis Barang</th>
                        <th scope="col">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($minBarang as $mb)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$mb->nama_barang}}</td>
                        <td>{{$mb->jenis_barang->nama}}</td>
                        <td>{{$mb->stok}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>




</x-app-layout>
