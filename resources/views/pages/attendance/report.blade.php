<x-app-layout>
    <x-slot name="header">
        {{ __('Attendance Report') }}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Generate Attendance Report by Date Range</h1>

                    <form method="GET" action="{{ route('attendance.report.range') }}">
                        @csrf
                        <div class="grid grid-cols-2 gap-6 mb-4">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border-gray-300 shadow-sm sm:text-sm rounded-md" required>
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border-gray-300 shadow-sm sm:text-sm rounded-md" required>
                            </div>
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded">Generate Report</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
