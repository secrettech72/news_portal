@component('mail::message')
# Welcome To Sanju Awal's News Portal Website

Thanks For Signing up. 

@component('mail::button', ['url' => 'http::localhost/news_portal/public/news'])
Site Url
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
