<x-layout>
    <x-section-heading>Confabulate!</x-section-heading>
    <div class="mt-8">
        <x-forms.form method="POST">
            <x-forms.textarea label="Message content" name="tweet" placeholder="converse here"></x-forms.textarea>
            
        </x-forms.form>
    </div>
    <div class="mt-8 flex justify-center gap-x-6">
           <x-cancel-button href="#">Cancel</x-cancel-button>
            <x-forms.button>Post Twat</x-forms.button>
        </div>
</x-layout>