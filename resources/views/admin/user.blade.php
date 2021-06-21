<x-template-layout>
    <h1 class="text-3xl text-black pb-6">Data User</h1>

    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg m-3">
            <table class="min-w-full divide-y divide-gray-200 p-2">
                <thead class="bg-gray-50">
                    <tr class="text-lg text-left">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $no=1; ?>
                    @foreach ($user as $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->level}}</td>
                        <td>
                            <form action="{{route('user.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-xs p-2 rounded bg-red-200 m-3 hover:bg-red-400 hover:to-red-900">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-template-layout>