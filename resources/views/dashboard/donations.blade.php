<x-app-layout>
    @push('css')
    <style>
        .processing{
            background:#3286e0;
        }
        .completed{
            background:#0cba4c;
        }
         .canceled{
            background:#b10d0d;
        }
          .stripe{
            background:#3286e0;
        }
        .hyperpay{
            background:#0cba4c;
        }
         .paypal{
            background:#f4ff1f;
        }
    </style>
    @endpush
    <x-slot name="header">
       <div class="flex items-center justify-between">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Donations') }}
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
                    Donner
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Cause
                </th>
                 <th scope="col" class="px-6 py-3 font-medium">
                    Amount
                </th>
                 <th scope="col" class="px-6 py-3 font-medium">
                    Status
                </th>
                 <th scope="col" class="px-6 py-3 font-medium">
                    Payed With
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Donated At
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($danations as $donation)
            <tr class="bg-neutral-primary border-b border-default">
                <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                    {{$donation->id}}
                </th>
                <td class="px-6 py-4">
                    {{$donation->donar->name}}
                </td>
                 <td class="px-6 py-4">
                    {{$donation->cause->title[app()->getLocale()]}}
                </td>
                <td class="px-6 py-4">
                    {{$donation->amount}}
                </td>
                 <td class="px-6 py-4">
                    <span class="capitalize {{$donation->status}} px-1 py-0.5 rounded">
                    {{$donation->status}} 
                    </span>
                </td>
                <td class="px-6 py-4">
                     <span class="capitalize {{$donation->payment_gateway}} px-1 py-0.5 rounded">
                    {{$donation->payment_gateway}} 
                    </span>
                </td>
                <td class="px-6 py-4">
                    {{$donation->created_at->format('d/m/Y')}}
                </td>
                <td class="px-6 py-4">
                    <form  action="{{ route('dashboard.delete_donations',$donation->id) }}" method="POST">
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

