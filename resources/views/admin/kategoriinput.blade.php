<x-template-layout>
    <h1 class="text-3xl text-black pb-6">{{$title}}</h1>
    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <form action="{{(isset($kategori))?route('kategori.update', $kategori->id):route('kategori.store')}}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($kategori))
            @method('PUT')
            @endif
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Kategori
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="kategori"
                                    value="{{(isset($kategori))?$kategori->kategori:old('kategori')}}"
                                    class="@error('kategori') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Judul kategori max 255">
                            </div>
                            <div class="text-xs text-red-600">@error('kategori') {{$message}} @enderror</div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <a href="{{ route('kategori.index') }}"><button
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kembali</button></a>
                </div>
            </div>
        </form>
    </div>
</x-template-layout>