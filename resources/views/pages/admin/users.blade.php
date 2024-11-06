<x-app-layout>
    <div class="w-full px-4 py-8 mx-auto sm:px-6 lg:px-8 max-w-9xl">
        <div class="card laporan-tabel" id="laporan-masuk">
            <div class="text-xl text-white bg-gray-400 card-header">Daftar User</div>
            <div class="card-body">
                <div class="flex items-center justify-between w-full gap-4 mb-3">
                    <div class="w-1/2">
                        <label for="roleFilter" class="form-label">Filter by Role</label>
                        <select id="roleFilter" class="form-select">
                            <option value="all">All</option>
                            <option value="User">Staff</option>
                            <option value="Dosen">Kepala Dept IT</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahUsers"
                        class="p-2 mb-4 text-black bg-blue-400 rounded-lg hover:bg-slate-300">Tambah
                        User</button>

                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Terakhir Diubah</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                            <td>{{$user->role == 0 ? 'Staff' : ($user->role == 1 ? 'Kepala Dept IT' : 'Admin')}}</td>
                            <td>
                                <button type="submit" class="px-2.5 py-2 text-black bg-yellow-600 rounded-lg"><i
                                        class="text-white fa-solid fa-pen-to-square"></i></button>
                                <button type="submit" class="px-2.5 py-2 text-black bg-red-600 rounded-lg"><i
                                        class="text-white fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="tambahUsers" tabindex="-1" aria-labelledby="tambahUsersLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahUsersLabel">Tambah Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tambahUser') }}" method="POST">
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Jenis User</label>
                            <select class="form-select" id="role" name="type">
                                <option value="2">Staff</option>
                                <option value="0">Kepala Dept IT</option>
                                <option value="1">Admin</option>
                            </select>
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
        document.getElementById('roleFilter').addEventListener('change', function () {
            const selectedRole = this.value;
            const rows = document.querySelectorAll('table tbody tr');
            let rowCount = 0; // Initialize row count

            rows.forEach(row => {
                const role = row.getAttribute('data-role');

                if (selectedRole === 'all' || role === selectedRole) {
                    row.style.display = '';
                    rowCount++;
                    row.querySelector('td:first-child').textContent = rowCount; // Update "No" column
                } else {
                    row.style.display = 'none';
                }
            });
        });

    </script>

</x-app-layout>
