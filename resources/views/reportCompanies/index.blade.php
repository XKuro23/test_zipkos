<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto">
            <div class="flex flex-col">
                <div class="w-full">

                    <div class="p-4 border-b border-gray-200 w-auto">
                        <!-- <table> -->
                            <table id="reportCompany" class="p-4 table-auto">
                                <thead class="bg-gray-500">
                                    <tr>

                                        <th class="p-8 text-xs text-white ">
                                            Company Name
                                        </th>
                                        <th class="p-8 text-xs text-white ">
                                            Number of Employees
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($companies as $company)
                                        <tr class="whitespace-nowrap">
                                            <td class="px-6 py-4 text-center">
                                                <div class="text-sm text-gray-900">
                                                    {{ $company->company_name }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-center text-gray-500">
                                                {{ count($company->employees) }}
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
