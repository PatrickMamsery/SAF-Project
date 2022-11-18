@component('mail::message')
Tumsifu Yesu Kristo {{$user->fname}}
{{ $info->title }}

{!! $info->content !!}


@component('mail::button', ['url' => 'https://saftz.org'])
View Information
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent