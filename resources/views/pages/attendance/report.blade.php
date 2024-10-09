<x-app-layout>
    <x-slot name="header">
        {{ __('Attendance Report') }}
    </x-slot>

    <div class="sm:px-6 md:px-0 lg:px-0 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h1>Attendance Report</h1>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Time In</th>
                            <th class="px-4 py-2">Time Out</th>
                            <th class="px-4 py-2">Total Hours</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                            <tr>
                                <td class="border px-4 py-2">{{ $attendance->created_at->toDateString() }}</td>
                                <td class="border px-4 py-2">{{ $attendance->time_in }}</td>
                                <td class="border px-4 py-2">{{ $attendance->time_out }}</td>
                                <td class="border px-4 py-2">
                                    @if ($attendance->time_out)
                                        {{ \Carbon\Carbon::parse($attendance->time_in)->diffInHours($attendance->time_out) }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
