<x-layout>
    <x-section-heading>Confabulate!</x-section-heading>

   <div class="mt-8">
        <x-forms.form method="POST" action="/tweets">
            <x-forms.textarea autofocus label="Message content" name="tweet" placeholder="converse here"></x-forms.textarea>
    
    
    
            <div class="mt-8 flex justify-center gap-x-6">
                <x-forms.danger-button buttonType="a" href="/tweets">Cancel</x-forms.danger-button>
                <x-forms.button>Post</x-forms.button>
            </div>
        </x-forms.form>
   </div>
</x-layout>
