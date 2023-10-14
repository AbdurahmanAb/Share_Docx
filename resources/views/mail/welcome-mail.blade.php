@component('mail::message')
    # Welcome To Share Docx

    @component('mail::button', ['url' => 'fb.com'])
        Verify Account
    @endcomponent
    @component('mail::panel')
        This is Panel
    @endcomponent
    @component('mail::footer')
        This is a footer
    @endcomponent
