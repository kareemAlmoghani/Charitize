<x-app-layout>
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin.messages') }}
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
                    Name
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Subject
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Sended At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
            <tr class="bg-neutral-primary border-b border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{$message->id}}
                </th>
                <td class="px-6 py-4">
                    {{$message->name}}
                </td>
                <td class="px-6 py-4">
                    <a class="text-blue-500 underline" href="mailto:{{ $message->email }}">
                        {{$message->email}}
                    </a>
                </td>
                <td class="px-6 py-4">
                    {{$message->subject}}
                </td>
                <td class="px-6 py-4">
                    {{$message->created_at->format('d/m/Y')}}
                </td>
                <td class="px-6 py-4">
                    <x-primary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'show-message-{{$message->id}}')"
    >{{ __('Show Message') }}</x-primary-button>

    <form action="{{route('dashboard.delete_messages',$message->id)}}" method="POST"class="inline">
        @csrf
        @method('delete')
        <x-danger-button onclick="return confirm('ARE you shure??')">{{ __('Delete Message') }}</x-danger-button>

    </form>

    <x-modal name="show-message-{{$message->id}}" focusable>
    <div class="p-4">
         {{$message->message}}
    </div>
    </x-modal>
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

