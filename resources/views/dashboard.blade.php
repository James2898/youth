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
        <h1 class="text-5xl font-bold leading-tight">
            Hi, may partner ka na, ang code name nya ay <span class="bg-red-200 text-blacks-600 py-0 px-3 rounded-full">{{$partner->code_name}}</span> at gusto nya ng <span class="bg-red-200 text-blacks-600 py-1 px-3 rounded-full">{{$partner->wishlist}}</span>, btw <span class="bg-red-200 text-blacks-600 py-1 px-3 rounded-full">@if($partner->gender == 1) boy siya @elseif($partner->gender == 2) girl siya @else secret daw gender nya @endif </span>
        </h1>
        <table class="table table-fixed">
            <thead>
                <th>Code Name</th>
                <th>Gender</th>
                <th>Wishlist</th>
            </thead>
            <tbody>
                <tr></tr>
            </tbody>
        </table>

        @else
        <h1 class="text-5xl font-bold leading-tight">Hi, wala ka pang partner, wag kang atat</h1>
        @endif
    </div>
</div>
</div>
</div>
</x-app-layout>