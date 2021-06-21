<x-template-layout>
    <h1 class="text-3xl text-black pb-6">Data Buku</h1>

    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <div class="grid grid-cols-12">
            <div class="col-span-6 p-4">
                <a href="{{route('buku.create')}}"><button
                        class="px-4 py-1 text-sm rounded text-purple-600 font-semibold border border-purple-200 hover:text-white hover:bg-purple-600 hover:border-transparent focus:outline-none">Tambah</button></a>
            </div>
            <div class="col-span-6 p-4 flex justify-end">
                <form action="/cari" method="GET">
                    <input placeholder="search" type="search" name="search"
                        class="px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500 rounded-none rounded-l-md sm:text-sm border-gray-300">
                    <button type="submit"
                        class="rounded-r-md border border-l-0 px-4 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover:text-white hover:bg-blue-600">Cari</button>
                </form>
            </div>
        </div>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg m-3">
            <table class="min-w-full divide-y divide-gray-200 p-2">
                <thead class="bg-gray-50">
                    <tr class="text-lg text-left">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penuis</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Cover</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $no=1; ?>
                    @foreach ($buku as $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->penulis}}</td>
                        <td>{{$item->penerbit}}</td>
                        <td>{{$item->kategori->kategori}}</td>
                        <td class=""><img src="{{asset('storage/'.$item->cover)}}" class="w-6" alt=""></td>
                        <td>
                            <form action="{{route('buku.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('buku.edit', $item->id)}}"
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