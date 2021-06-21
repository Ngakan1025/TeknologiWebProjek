<x-template-layout>
    <h1 class="text-3xl text-black pb-6">{{$title}}</h1>
    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <form action="{{(isset($pinjam))?route('pinjam.update', $pinjam->id):route('pinjam.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($pinjam))
            @method('PATCH')
            @endif
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Nama
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="nama" value="{{(isset($pinjam))?$pinjam->nama:old('nama')}}"
                                    class="@error('nama') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukkan nama">
                            </div>
                            <div class="text-xs text-red-600">@error('nama') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Alamat
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="alamat"
                                    value="{{(isset($pinjam))?$pinjam->alamat:old('alamat')}}"
                                    class="@error('alamat') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukkan alamat">
                            </div>
                            <div class="text-xs text-red-600">@error('alamat') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Telephone
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="telephone"
                                    value="{{(isset($pinjam))?$pinjam->telephone:old('telephone')}}"
                                    class="@error('telephone') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukan nomor telephone">
                            </div>
                            <div class="text-xs text-red-600">@error('telephone') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Tanggal Pinjam
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="tanggal"
                                    value="{{(isset($pinjam))?$pinjam->tanggal:old('tanggal')}}"
                                    class="@error('tanggal') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukkan tanggal pinjaman">
                            </div>
                            <div class="text-xs text-red-600">@error('tanggal') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="title" class="block text-sm font-medium text-gray-700">Buku</label>
                        <select class="form-control select2" style="width : 100%" name="buku_id" id="buku_id">
                            <option disabled value="">Pilih Buku</option>

                            @foreach ($buku as $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <a href="{{ route('pinjam.index') }}"><button
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kembali</button></a>
                </div>
            </div>
        </form>
    </div>
</x-template-layout>