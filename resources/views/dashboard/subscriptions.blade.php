<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.subscriptions') }}
        </h2>
       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Subscripe At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($subscriptions as $subscription)
            <tr class="bg-neutral-primary border-b border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{$subscription->id}}
                </th>
                <td class="px-6 py-4">
                    <a class="text-blue-500 underline" href="mailto:{{ $subscription->email }}">
                        {{$subscription->email}}
                    </a>
                </td>
                <td class="px-6 py-4">
                    {{$subscription->created_at->format('d/m/Y')}}
                </td>
                <td class="px-6 py-4">
                    <form  action="{{ route('dashboard.delete_subscriptions',$subscription->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="bg-red-600 p-1 px-8 rounded text-white hover:bg-red-700 duration-200" onclick="return confirm('Are You Shure')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
             <tr class="bg-neutral-primary border-b border-default">
                <td colspan="4" class="px-6 py-4">
                    There Is No Data
                </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{--  {{ $sliders->links() }}  --}}
</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

