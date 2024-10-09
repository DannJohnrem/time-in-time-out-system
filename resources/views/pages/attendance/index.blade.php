<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Attendance</h1>

                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @elseif(session('error'))
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif

                    @if ($attendance && !$attendance->time_out)
                        <p class="text-lg font-semibold mb-4">
                            You clocked in at: 
                            <span class="text-blue-600">{{ $attendance->time_in }}</span>
                        </p>
                        <form method="POST" action="{{ route('attendance.timeOut') }}" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-red-600 text-white font-bold py-2 px-4 rounded hover:bg-red-700">
                                Time Out
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('attendance.timeIn') }}" class="mt-4">
                            @csrf
                            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">
                                Time In
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
