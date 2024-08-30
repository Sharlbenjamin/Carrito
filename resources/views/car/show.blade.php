<x-app-layout>
    <x-slot name="header">
        {{$car->name}} Details
    </x-slot>
    <div class="grid grid-cols-12 divide-y divide-gray-200 space-y-4">
        <div class="col-span-4 m-4">
            <div class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow border">
                <div class="flex w-full items-center justify-between space-x-6 p-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="truncate text-lg font-medium text-gray-900">{{$car->name}}</h3>
                            <span class="inline-flex flex-shrink-0 items-center rounded-full bg-green-50 px-1.5 py-0.5 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{$car->year}}</span>
                        </div>
                        <p class="mt-1 truncate text-sm text-gray-500">License Expiry Date: {{$car->license_date}} </p>
                    </div>
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="flex w-0 flex-1">
                            <a class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                {{$car->brand->name}}
                            </a>
                        </div>
                        <div class="-ml-px flex w-0 flex-1">
                            <a class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                {{$car->type->name}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="-mx-4 mt-4 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Part</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Last Repair Date</th>
                        <th scope="col" class="hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell">Next Repair Date</th>
                      </tr>
                    </thead>
                    <tbody class="min-w-full divide-y divide-gray-300">
                        @foreach ($parts as $part)
                        <tr>
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                <div class="font-medium text-gray-900">{{$part->name}}</div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{isset($part->repairs->first()->id) ? $part->lrd($car->id) : 'NA'}}</td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{isset($part->repairs->first()->id) ? $part->nrd($car->id) : 'NA'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>  
        </div>
        <div class="col-span-12 pt-4">
            <x-table subject="Maintenance for {{$car->name}}" description="All of the maintenance done for the {{$car->name}} Car" button="Add Maintenance" route="{{route('repairs.create', ['car' => $car])}}">
                <x-slot name="tableHeader">
                    <x-table-header>Agency Name</x-table-header>
                    <x-table-header>Maintenance Date</x-table-header>
                    <x-table-header>Total Invoice</x-table-header>
                    <x-table-edit-header></x-table-edit-header>
                </x-slot>
                @if (isset($car->repairs->first()->id))
                    @foreach ($car->repairs as $repair)
                    <tr>
                        <x-table-column>{{$repair->agency->name}}</x-table-column>
                        <x-table-column>{{$repair->date->format('d-m-Y')}}</x-table-column>
                        <x-table-column>{{$repair->invoice}}</x-table-column>
                        <x-table-edit-column route="{{route('repairs.edit', $repair)}}">Edit</x-table-edit-column>
                    </tr>
                    @endforeach
                @endif
            </x-table>
        </div>
    </div>
</x-app-layout>