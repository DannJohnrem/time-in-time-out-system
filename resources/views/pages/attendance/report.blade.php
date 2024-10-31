<x-app-layout>
    <x-slot name="header">
        {{ __('Attendance Report') }}
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4 text-2xl font-bold">Generate Attendance Report by Date Range</h1>

                    <form method="GET" action="{{ route('attendance.report.range') }}">
                        @csrf
                        <div class="grid gap-6 mb-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" required>
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm sm:text-sm" required>
                            </div>
                        </div>
                        <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
