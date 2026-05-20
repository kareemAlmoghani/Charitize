<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }} ({{Auth::user()->unreadNotifications()->count()}})
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
                    Content
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Received At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Mark As Read
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($notifications as $notification)
            <tr class="bg-neutral-primary border-b border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{$notification->data['msg']}}
                </th>
                <td class="px-6 py-4">
                    {{$notification->created_at->diffForHumans()}}
                </td>
                <td class="px-6 py-4">
                @if(!$notification->read_at)
                   <a class="bg-green-500 p-1 text-white" href="{{ route('dashboard.notifications_read',$notification->id) }}">Mark As Read</a>
                   @endif
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

