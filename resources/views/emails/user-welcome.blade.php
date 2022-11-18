@component('mail::message')
Dear {{$user->fname}},
Welcome to St Augustine Choral Society of Tanzania. We hope that your experience with us will be a memorable one.
You can click on this button to proceed to login.

@component('mail::button', ['url' => 'https://saftz.org/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent