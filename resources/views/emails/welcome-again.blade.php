@component('mail::message')
# Introduction

Thank you so much for registering!

@component('mail::button', ['url' => 'https://google.com'])
Start browsing
@endcomponent

@component('mail::panel', ['url' => ''])
    Flm apet
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
