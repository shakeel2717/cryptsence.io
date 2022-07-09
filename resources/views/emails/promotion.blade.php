@component('mail::message')
# {{ $subject }}

{{ $message }}

@component('mail::button', ['url' => route('user.index.index')])
Sign in to {{ env('APP_NAME') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
