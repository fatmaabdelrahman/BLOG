@component('mail::message')
# Introduction


Hello To our Blog
To visit us click button
<hr/>
{{$message}}
@component('mail::button', ['url' => url('/posts')])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
