<x-layout>
    <div class="ml-3 flex justify-start"><x-buttons.back-button
             href="{{ $previousUrl !== $currentUrl ? $previousUrl : '/tweets' }}">Back</x-buttons.back-button></div>
    <x-tweets.tweet-card-big :$tweet />
    <div class="mt-8">
        <x-forms.form method="POST" action="/tweets/{{ $tweet->id }}/comments">
            <x-forms.textarea autofocus label="Comment" name="comment" placeholder="comment here"></x-forms.textarea>
    
    
    
            <div class="mt-8 flex justify-center gap-x-6">
                <x-forms.danger-button buttonType="a" href="/tweets/{{ $tweet->id }}">Cancel</x-forms.danger-button>
                <x-forms.button>Comment</x-forms.button>
            </div>
        </x-forms.form>
   </div>
</x-layout>