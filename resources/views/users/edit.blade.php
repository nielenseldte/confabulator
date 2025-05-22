@php
    $hasProfilePicError = $errors->has('profile_pic');
@endphp
<x-layout>
    <x-layout.section-heading>Edit your public profile, {{ $user->name }}</x-layout.section-heading>
    <div class="mt-8">
        <div x-data="{ open: {{ $hasProfilePicError ? 'true' : 'false' }} }" class="flex justify-start space-x-5 items-center max-w-2xl mx-auto mb-5">
            <div>
                <x-profile-picture src="{{ asset('storage/' . $user->profile_pic) }}" />
            </div>
            <div>
                <x-buttons.js-button x-on:click="open = true" class="border-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-pencil-icon lucide-pencil">
                        <path
                            d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                        <path d="m15 5 4 4" />
                    </svg>
                </x-buttons.js-button>
            </div>
            <x-modals.form-modal>
                <x-slot:heading>Edit Your Profile Picture</x-slot>

                <x-slot:form>
                    <form id="updateForm" action="/users/{{ $user->id }}/profile-picture" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-forms.input label="Profile Picture" name="profile_pic" type="file" />
                    </form>
                </x-slot>
                <button x-on:click="open = false" type="button"
                    class="w-full px-4 py-2 text-sm cursor-pointer rounded-lg border border-red-600 bg-black/20 text-white hover:border-black/20 hover:text-red-600 transition-all duration-300">Cancel</button>
                <button  type="submit" form="updateForm" type="button"
                    class="w-full px-4 py-2 text-sm cursor-pointer rounded-lg border border-blue-700 bg-black/20 text-white hover:border-black/20 hover:text-blue-700 transition-all duration-300">Submit</button>
            </x-modals.form-modal>

        </div>
        <x-forms.form action="/users/{{ $user->id }}" method="POST">
            @method('PATCH')

            <x-forms.input name="user_name" label="Username" value="{{ $user->user_name }}">
            </x-forms.input>
            <x-forms.textarea name="about" label="Bio(optional)">{{ $user->about }}</x-forms.textarea>
            <div class="flex justify-end space-x-3">
                <x-forms.danger-button buttonType="a" href="/users/{{ $user->id }}">Cancel</x-forms.danger-button>
                <x-forms.button>Update</x-forms.button>
            </div>
        </x-forms.form>
    </div>
</x-layout>
