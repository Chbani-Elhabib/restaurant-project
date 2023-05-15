@component('mail::message')
<h1 style="text-align: center;">Your email confirmation</h1>
<h2>Hello {{$body['name']}},</h2>

<p style="text-align: center;">To help us confirm your identity , we need to verify your email address</p>
<p style="text-align: center;"> Never share this code with anyone else.</p><br>
 
<p> @component('mail::button', ['url' => $body['url']]) Verify @endcomponent </p><br>
 
 
Happy coding!<br><br>
 
Thanks,<br>
Chbani
@endcomponent