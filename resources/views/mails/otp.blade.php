<x-mail::message>
    # Introduction

    # Magic Spell for Password Reset

    A magical spell has been generated for you to reset your password.

    Your Magic Spell (OTP): **{{ $magicSpell }}**

    Please recite the spell to reset your password.

    Thanks,<br>
    {{ config('app.motherly_momment') }}

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.motherly_momment') }}
</x-mail::message>
