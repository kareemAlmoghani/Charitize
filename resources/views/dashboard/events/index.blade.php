<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.events') }}
        </h2>
        <a class="bg-green-600 p-1 px-8 rounded text-white hover:bg-green-700 duration-200" href="{{route('dashboard.events.create')}}">{{__('ADD Event')}}</a>
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
                    Image
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Updated AT
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr class="bg-neutral-primary border-b border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{$event->id}}
                </th>
                <td class="px-6 py-4">
                    <img width="200" src='{{asset($event->image->path)}}'>
                </td>
                <td class="px-6 py-4">
                    {{$event->title[app()->getLocale()]}}
                </td>
                <td class="px-6 py-4">
                    {{$event->created_at->format('d/m/Y')}}
                </td>
                <td class="px-6 py-4">
                    {{$event->updated_at->diffForHumans()}}
                </td>
                <td class="px-6 py-4">
                    <a class="bg-blue-600 p-1 px-8 rounded text-white hover:bg-blue-700 duration-200" href="{{ route('dashboard.events.edit',$event->id) }}">Edit</a>
                    <form class="inline" action="{{ route('dashboard.events.destroy',$event->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="bg-red-600 p-1 px-8 rounded text-white hover:bg-red-700 duration-200" onclick="return confirm('Are You Shure')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
             <tr class="bg-neutral-primary border-b border-default">
                <td colspan="6" class="px-6 py-4">
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

