<x-layout>
    <x-layout.section-heading>Edit</x-layout.section-heading>

    <div class="mt-8">
        <x-forms.form method="POST" action="/tweets/{{ $tweet->id }}">
            @method('PATCH')
            <x-forms.textarea label="Message content" name="tweet">{{ $tweet->body }}</x-forms.textarea>



            <div class="mt-8 flex justify-center gap-x-6">
                <x-forms.danger-button buttonType="a" href="{{ $previousUrl !== $currentUrl ? $previousUrl : '/tweets/' . $tweet->id }}">Cancel</x-forms.danger-button>
                <x-forms.button>Update</x-forms.button>
            </div>
        </x-forms.form>
    </div>
</x-layout>
