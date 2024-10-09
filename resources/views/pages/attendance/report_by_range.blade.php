<x-app-layout>
    <x-slot name="header">
        {{ __('Attendance Report from ' . $startDate->toFormattedDateString() . ' to ' . $endDate->toFormattedDateString()) }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Attendance Records</h1>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time In</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time Out</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Hours</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->created_at->toDateString() }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->time_in }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $attendance->time_out }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($attendance->time_out)
                                            {{ \Carbon\Carbon::parse($attendance->time_in)->diffInHours($attendance->time_out) }} hours
                                        @else
                                           <span class="font-bold text-red-800 uppercase">No record found</span> 
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
