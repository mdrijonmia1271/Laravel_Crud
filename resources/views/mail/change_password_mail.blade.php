<x-mail::message>
# Change Password Confirmation - {{ Auth::user()->name }}
 
Your password has been changed!
 
{{-- <x-mail::button :url="">
View Order
</x-mail::button> --}}
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>