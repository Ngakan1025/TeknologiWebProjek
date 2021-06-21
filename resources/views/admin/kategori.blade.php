<x-template-layout>
    <h1 class="text-3xl text-black pb-6">Data Kategori</h1>

    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <div class="grid grid-cols-12">
            <div class="col-span-6 p-4">
                <a href="{{route('kategori.create')}}"><button
                        class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none">Tambah</button></a>
            </div>
        </div>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg m-3">
            <table class="min-w-full divide-y divide-gray-200 p-2">
                <thead class="bg-gray-50">
                    <tr class="text-lg text-left">
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $no=1; ?>
                    @foreach ($kategori as $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>
                            <form action="{{route('kategori.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('kategori.edit', $item->id)}}"
                                    class="btn btn-xs p-2 rounded bg-blue-200 m-3 hover:bg-blue-400 hover:to-blue-900">Edit</a>
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