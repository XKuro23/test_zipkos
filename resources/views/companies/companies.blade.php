<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto">
            <div class="flex flex-col">
                <div class="w-full">
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p class="font-bold">Success</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <div class="p-12">
                        <a href="{{ route('companies.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right">
                            Tambah Data
                          </a>
                    </div>
                    <div class="p-4 border-b border-gray-200 w-auto">
                        <!-- <table> -->
                        <table id="dataTable" class="p-4 table-auto">
                            <thead class="bg-gray-500">
                                <tr>
                                    <th class="p-8 text-xs text-white">
                                        No
                                    </th>
                                    <th class="p-8 text-xs text-white ">
                                        Company Name
                                    </th>
                                    <th class="p-8 text-xs text-white ">
                                        Email
                                    </th>
                                    <th class="p-8 text-xs text-white ">
                                        Adress
                                    </th>
                                    <th class="p-8 text-xs text-white ">
                                        Phone
                                    </th>
                                    <th class="px-6 py-2 text-xs text-white ">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                @foreach ($companies as $company)
                                    <tr class="whitespace-nowrap">
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="text-sm text-gray-900">
                                                {{ $company->company_name }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{ $company->company_email }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $company->company_address }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            {{ $company->company_phone }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <form action="{{ route('companies.destroy',$company->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('companies.edit',$company->id) }}" class="px-4 py-1 text-sm text-black bg-yellow-300 rounded">Edit</a>
                                                <button type="submit" onclick="return confirm('Apakah Anda Yakin untuk menghapusnya ?')" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
