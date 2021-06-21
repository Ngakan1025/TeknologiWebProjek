<x-template-layout>
    <h1 class="text-3xl text-black pb-6">{{$title}}</h1>
    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <form action="{{(isset($user))?route('user.update', $user->id):route('user.store')}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($user))
            @method('PUT')
            @endif
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Nama
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="name" value="{{(isset($user))?$user->name:old('name')}}"
                                    class="@error('name') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukkan nama">
                            </div>
                            <div class="text-xs text-red-600">@error('name') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Email
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="email" name="email" value="{{(isset($user))?$user->email:old('email')}}"
                                    class="@error('email') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukkan email">
                            </div>
                            <div class="text-xs text-red-600">@error('email') {{$message}} @enderror</div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label for="company_website" class="block text-sm font-medium text-gray-700">
                                Level
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="number" name="level" value="{{(isset($user))?$user->level:old('level')}}"
                                    class="@error('level') border-red-500 @enderror focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="masukkan level user">
                            </div>
                            <div class="text-xs text-red-600">@error('level') {{$message}} @enderror</div>
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
                    <a href="{{ route('user.index') }}"><button
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Kembali</button></a>
                </div>
            </div>
        </form>
    </div>
</x-template-layout>