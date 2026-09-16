<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Tickets
            </h2>

            <a
                href="{{ route('user.tickets.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700"
            >
                + Create Ticket
            </a>

        </div>

    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))

                <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-800 rounded-md">

                    {{ session('success') }}

                </div>

            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="flex items-center justify-between mb-6">

                        <h3 class="text-lg font-semibold text-gray-900">
                            My Tickets
                        </h3>

                        <a
                            href="{{ route('user.tickets.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700"
                        >
                            + Create Ticket
                        </a>

                    </div>


                    @if($tickets->count() > 0)

                        <div class="overflow-x-auto">

                            <table class="min-w-full divide-y divide-gray-200">

                                <thead class="bg-gray-50">

                                    <tr>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Ticket #
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Subject
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Department
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Status
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Date
                                        </th>

                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody class="bg-white divide-y divide-gray-200">

                                    @foreach($tickets as $ticket)

                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">

                                                {{ $ticket->ticket_number }}

                                            </td>


                                            <td class="px-6 py-4 text-sm text-gray-700">

                                                {{ $ticket->subject }}

                                            </td>


                                            <td class="px-6 py-4 text-sm text-gray-700">

                                                {{ $ticket->department->name }}

                                            </td>


                                            <td class="px-6 py-4">

                                                @if($ticket->status === 'New')

                                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-700">
                                                        New
                                                    </span>

                                                @elseif($ticket->status === 'Open')

                                                    <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-700">
                                                        Open
                                                    </span>

                                                @elseif($ticket->status === 'Closed')

                                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                                        Closed
                                                    </span>

                                                @else

                                                    <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">
                                                        {{ $ticket->status }}
                                                    </span>

                                                @endif

                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">

                                                {{ $ticket->created_at->format('M d, Y') }}

                                            </td>


                                            <td class="px-6 py-4 whitespace-nowrap">

                                                <div class="flex items-center gap-3">

                                                    <a
                                                        href="{{ route('user.tickets.show', $ticket) }}"
                                                        class="text-blue-600 hover:text-blue-900"
                                                    >
                                                        View
                                                    </a>


                                                    @if($ticket->status !== 'Closed')

                                                        <a
                                                            href="{{ route('user.tickets.edit', $ticket) }}"
                                                            class="text-yellow-600 hover:text-yellow-900"
                                                        >
                                                            Edit
                                                        </a>

                                                    @endif


                                                    <form
                                                        method="POST"
                                                        action="{{ route('user.tickets.destroy', $ticket) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this ticket?');"
                                                    >

                                                        @csrf

                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="text-red-600 hover:text-red-900"
                                                        >
                                                            Delete
                                                        </button>

                                                    </form>

                                                </div>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>


                        <div class="mt-6">

                            {{ $tickets->links() }}

                        </div>

                    @else

                        <div class="text-center py-12">

                            <div class="text-gray-400 text-5xl mb-4">
                                🎫
                            </div>

                            <h4 class="text-lg font-semibold text-gray-800">
                                No Tickets Found
                            </h4>

                            <p class="mt-2 text-gray-500">
                                You don't have any tickets yet.
                            </p>


                            <a
                                href="{{ route('user.tickets.create') }}"
                                class="inline-flex items-center mt-6 px-5 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700"
                            >
                                + Create Your First Ticket
                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>