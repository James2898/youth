<x-app-layout>
<div class="overflow-x-auto">
@if(session()->get('success'))
    <div class="alert alert-success">
    {{ session()->get('success') }}  
    </div><br />
@endif
<div class="min-w-screen flex items-center justify-center font-sans overflow-hidden">
<div class="w-full lg:w-5/6">
    @if ($message = Session::get('alert'))
        <x-alert  />
    @endif
    <div class="mx-auto">
    <h1 class="text-5xl font-bold leading-tight">Users</h1>
    </div>
    <a href="{{ route('shuffle') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'">Shuffle</a>
    <div class=" overflow-x-auto bg-white shadow-md rounded my-6">
    <table class="min-w-max w-full table-fixed">
        <thead>
            <tr class="bg-green-500 text-white uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Code</th>
                <th class="py-3 px-6 text-left">Wishlist</th>
                <th class="py-3 px-6 text-left">Partner</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($users as $user)
            <tr class="border-b border-gray-200 hover:bg-green-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    {{$user->name}}
                </td>
                <td class="py-3 px-6 text-left">
                    {{$user->code_name}}
                </td>
                <td class="py-3 px-6 text-left">
                    {{$user->wishlist}}
                </td>
                <td class="py-3 px-6 text-left">
                    @if($user->partner_id)
                        @if($user->partner_id != $user->id)
                            <span class="bg-green-200 text-black-600 py-1 px-3 rounded-full text-xs">
                        @else
                            <span class="bg-red-200 text-blacks-600 py-1 px-3 rounded-full text-xs">
                        @endif
                            {{$user->partner_id}}
                            </span>
                    @else
                    No partner yet
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