<x-mail::message>
# Welcome to Unique Academy
Hi {{$user->name}},

Welcome to Unique Academy

<x-mail::button :url="url('')">
Go to Unique Academy
</x-mail::button>

Thanks,<br>
Unique Academy
</x-mail::message>
