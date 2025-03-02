<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('URLs') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('urls.update', $url) }}">
            @csrf
            @method('patch')
            <input type="text"
                name="title"
                required
                maxlength="255"
                placeholder="{{ __('Title') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('title', $url->title) }}"
            />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <input type="text"
                name="original_url"
                required
                maxlength="255"
                placeholder="{{ __('Original Url') }}"
                class="block w-full border-gray-300 mt-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('original_url', $url->original_url) }}"
            />
            <x-input-error :messages="$errors->get('original_url')" class="mt-2" />
            <input type="text"
                name="shortener_url"
                maxlength="255"
                placeholder="{{ __('Alias') }}"
                class="block w-full border-gray-300 mt-2 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ old('shortener_url', $url->shortener_url) }}"
            />
            <x-input-error :messages="$errors->get('shortener_url')" class="mt-2" />
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('urls.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>