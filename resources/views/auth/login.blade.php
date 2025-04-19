<x-layout :nav="false">
    <div class="mt-11">
        
        <x-forms.form method="POST" action="/login">
            <div class="flex justify-center space-x-2 items-center">
                <h1 class="text-2xl">Welcome back to </h1>
                <h1 class="text-blue-700 text-2xl font-ibm-plex-mono italic border-4 py-1 px-2 border-blue-700 rounded-xl">
                    Confabulator
                </h1>
            </div>
            <x-forms.divider />
            <x-forms.input label="Email" name="email" type="email" />
            <x-forms.input label="Password" name="password" type="password" />
            <x-forms.divider />
            <div class="flex justify-between">
                <x-forms.danger-button buttonType="a" href="/tweets">Cancel</x-forms.danger-button>
                <x-forms.button>Log In</x-forms.button>
            </div>
            
            {{-- <x-forms.input label="Profile Picture" name="profile_picture" type="file" /> --}}
        </x-forms.form>
    </div>
</x-layout>