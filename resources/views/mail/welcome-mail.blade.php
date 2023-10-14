@component('mail::message')
    ## Hello

    @component('vendor.mail.html.panel')
        {{ config('app.name') }}
    @endcomponent
@endcomponent
