<x-app-layout>
    <x-slot name="header">
        {{$car->name}} Details
    </x-slot>
    <div class="grid grid-cols-12 space-y-4">
        <div class="col-span-4 m-4">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="-mx-4 mt-4 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th colspan="2" class="py-3.5 text-center pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{$car->name}} Car Details</th>
                      </tr>
                    </thead>
                    <tbody class="min-w-full divide-y divide-gray-300 ">
                        <tr class="divide-gray-300 divide-x">
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6 ">
                                <div class="flex space-x-2 stroke-2">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                      </svg>                                     
                                    <div class="font-medium text-gray-900">Brand</div>
                                </div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{$car->brand->name}}</td>
                        </tr>
                        <tr class="divide-gray-300 divide-x">
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6 ">
                                <div class="flex space-x-2 stroke-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                                      </svg>                                                                                                               
                                  <div class="font-medium text-gray-900">Model</div>
                              </div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{$car->type->name}}</td>
                        </tr>
                        <tr class="divide-gray-300 divide-x">
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6 ">
                                <div class="flex space-x-2 stroke-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                      </svg>                                                                                                             
                                  <div class="font-medium text-gray-900">Year</div>
                              </div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{$car->year}}</td>
                        </tr>
                        <tr class="divide-gray-300 divide-x">
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6 ">
                                <div class="flex space-x-2 stroke-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75V18m-7.5-6.75h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V13.5Zm0 2.25h.008v.008H8.25v-.008Zm0 2.25h.008v.008H8.25V18Zm2.498-6.75h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V13.5Zm0 2.25h.007v.008h-.007v-.008Zm0 2.25h.007v.008h-.007V18Zm2.504-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5Zm0 2.25h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V18Zm2.498-6.75h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V13.5ZM8.25 6h7.5v2.25h-7.5V6ZM12 2.25c-1.892 0-3.758.11-5.593.322C5.307 2.7 4.5 3.65 4.5 4.757V19.5a2.25 2.25 0 0 0 2.25 2.25h10.5a2.25 2.25 0 0 0 2.25-2.25V4.757c0-1.108-.806-2.057-1.907-2.185A48.507 48.507 0 0 0 12 2.25Z" />
                                      </svg>                                                                                                               
                                  <div class="font-medium text-gray-900">Kilometers</div>
                              </div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{$car->kilometers}}</td>
                        </tr>
                        <tr class="divide-gray-300 divide-x">
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6 ">
                                <div class="flex space-x-2 stroke-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                                      </svg>                                                                                                          
                                  <div class="font-medium text-gray-900">License Date</div>
                              </div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{$car->license_date}}</td>
                        </tr>
                        <tr class="divide-gray-300 divide-x">
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6 ">
                                <div class="flex space-x-2 stroke-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
                                      </svg>                                                                                                             
                                  <div class="font-medium text-gray-900">License Expiry</div>
                              </div>
                            </td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{$car->l_r_t}}</td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>  
        </div>
        <div class="col-span-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="-mx-4 mt-4 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
                    @if ($car->hasPartsNeedRepairing() == 'true')
                        <div class="w-full border-2 border-red-600 rounded-t-lg bg-red-800">
                            <h2 class="text-center text-white font-bold">The Parts Highligted Red Needs to be Repaired</h2>
                        </div>
                    @else
                        <div class="w-full border-2 border-green-600 rounded-t-lg bg-green-800">
                            <h2 class="text-center text-white font-bold">No Maintenance Needed !!</h2>
                        </div>
                    @endif
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
                        @if ($part->needsRepairing($car))
                        <tr>
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6 bg-red-800 border-red-700 border-y-4">
                                <div class="font-medium text-white">{{$part->name}}</div>
                            </td> {{-- bg-red-800 text-white border-red-700 border-4 --}} 
                            <td class="hidden px-3 py-3.5 text-sm bg-red-800 text-white border-red-700 border-y-4 lg:table-cell">{{isset($part->repairs->first()->id) ? $part->lrd($car->id) : 'NA'}}</td>
                            <td class="hidden px-3 py-3.5 text-sm bg-red-800 text-white border-red-700 border-y-4 lg:table-cell">{{isset($part->repairs->first()->id) ? $part->nrd($car->id) : 'NA'}}</td>
                        </tr>
                        @else    
                        <tr>
                            <td class="relative py-4 pl-4 pr-3 text-sm sm:pl-6">
                                <div class="font-medium text-gray-900">{{$part->name}}</div>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{isset($part->repairs->first()->id) ? $part->lrd($car->id) : 'NA'}}</td>
                            <td class="hidden px-3 py-3.5 text-sm text-gray-500 lg:table-cell">{{isset($part->repairs->first()->id) ? $part->nrd($car->id) : 'NA'}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>  
        </div>
        <div class="col-span-12 pt-4 border-t">
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