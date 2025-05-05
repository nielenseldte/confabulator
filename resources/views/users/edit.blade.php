<x-layout>
    <x-section-heading>Edit your public profile, {{ $user->name }}</x-section-heading>
    <div class="mt-8">
        <x-forms.form action="/users/{{ $user->id }}" method="POST">
            @method('PATCH')
            <x-forms.input name="user_name" label="Username" value="{{ $user->user_name }}">
            </x-forms.input>
            <x-forms.textarea name="about" label="Bio">{{ $user->about }}</x-forms.textarea>
            <div class="flex justify-end space-x-3">
                <x-forms.danger-button buttonType="a" href="/users/{{ $user->id }}">Cancel</x-forms.danger-button>
                <x-forms.button>Update</x-forms.button>
            </div>
        </x-forms.form>
    </div>
</x-layout>