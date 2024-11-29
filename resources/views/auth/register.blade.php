<x-layout>
    <h1 class="text-center text-4xl">Registration Form</h1>

    <x-forms.form method="POST" enctype="multipart/form-data">
        <x-forms.input name="name" label="Name" />
        <x-forms.input name="email" label="Email" type="email" />
        <x-forms.input name="password" label="Password" type="password" />
        <x-forms.input name="password_confirmation" label="Confirm Password" type="password" />

        <x-forms.divider />
        <x-forms.input name="employer" label="Employer" />
        <x-forms.input name="logo" label="Logo" type="file" />

        <x-forms.button type="submit">Register</x-forms.button>
    </x-forms.form>
</x-layout>