<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('conversations.partials._header')
            <div class="row">
                <div class="col-md-4">
                    <livewire:conversations.conversation-list :conversations="$conversations" />
                </div>
                <div class="col-md-8">
               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>