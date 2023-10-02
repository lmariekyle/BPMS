@component('mail::message')

Your Account has been created!
Here are your account details:

Account Email: {{ $user->email}}
<br>
Default Account Password: poblacion+[yourlastname]
<br>
For first time login, you are advised to change the default account password to your own desired password.
<br>
To do this you may click on the button below 
<br>

@component('mail::button', ['url' => 'http://127.0.0.1:8000/forgot-password'])
Change Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent