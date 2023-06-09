<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.reservations.create') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Create a new reservation</a>
        </div>

        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            First name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Last name
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Phone
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Reservation date
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Guest number
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Table
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ( $reservations as $reservation )
                    <tr class="bg-white border-b">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $reservation->first_name }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $reservation->last_name }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $reservation->email }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $reservation->tel_number }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $reservation->res_date }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $reservation->guest_number }}
                        </td>
                        <td class="py-4 px-6">
                            {{ $reservation->table->name }}
                        </td>
                        <td class="py-4 px-6 flex items-center">
                            <a href="{{ route('admin.reservations.edit', $reservation) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Edit</a>
                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" class="bg-red-500 text-white font-bold py-2 px-4 rounded-full" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        </div>
    </div>
</x-admin-layout>
