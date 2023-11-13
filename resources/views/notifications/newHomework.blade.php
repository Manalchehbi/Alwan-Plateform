@component('mail::message')
# Introduction
Hi {{$user->name}}
You have new homework notification.

@component('mail::button', ['url' => route('archieve-detail',$homework->id)])
Click here to see
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
