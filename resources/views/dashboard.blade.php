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
        @if($user->partner_id)
        <h1 class="text-3xl font-bold leading-tight">
            {{-- Hi, may partner ka na, ang code name nya ay <span class="bg-red-200 text-blacks-600 py-0 px-3 rounded-full">{{$partner->code_name}}</span> at gusto nya ng <span class="bg-red-200 text-blacks-600 py-1 px-3 rounded-full">{{$partner->wishlist}}</span>, btw <span class="bg-red-200 text-blacks-600 py-1 px-3 rounded-full">@if($partner->gender == 1) boy siya @elseif($partner->gender == 2) girl siya @else secret daw gender nya @endif </span> --}}
            Hi {{$user->name}}, eto partner mo
        </h1>
        <div class="overflow-x-auto bg-white shadow-md rounded my-6">
        <table class="w-full table-fixed">
            <thead>
                <tr class="bg-green-500 text-white uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-center">Codename</th>
                    <th class="py-3 px-6 text-center">Gender</th>
                    <th class="py-3 px-6 text-center">Wish</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-green-100">
                    <td class="py-3 px-6 text-center">
                        {{$partner->code_name}}
                    </td>
                    <td class="py-3 px-6 text-center">
                        @if($partner->gender == 1)
                            Male
                        @elseif($partner->gender == 2)
                            Female
                        @else
                            Secret
                        @endif
                    </td>
                    <td class="py-3 px-6 text-center">
                        {{$partner->wishlist}}
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
        @else
        <h1 class="text-5xl font-bold leading-tight">Hi, wala ka pang partner, wag kang atat</h1>
        @endif
    </div>
</div>
</div>
</div>
</x-app-layout>