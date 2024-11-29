<x-layout>
    <h1 class="mb-8 text-center text-4xl font-bold">Login Form</h1>

    <x-forms.form method="POST">
        <x-forms.input name="email" label="Email" type="email" />
        <x-forms.input name="password" label="Password" type="password" />
        <x-forms.button type="submit">Login</x-forms.button>
    </x-forms.form>
</x-layout>
