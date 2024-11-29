<x-layout>
    <h1 class="text-center text-4xl">Create Job Form</h1>

    <x-forms.form method="POST" action="{{ route('jobs.store') }}">
        <x-forms.input name="title" label="Title" placeholder="Senior Web Developer" />
        <x-forms.input name="salary" label="Salary" placeholder="$150,000 USD" />
        <x-forms.input name="location" label="Location" placeholder="California, NY" />
        <x-forms.select name="schedule" label="Job Time">
            @foreach (App\Enums\JobSchedule::values() as $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.select name="tags[]" label="Tags" multiple="multiple"
            class="job-tags-multiple bg-red-500 text-red-500">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}">{{ Str::ucfirst($tag->name) }}
                </option>
            @endforeach
        </x-forms.select>

        <x-forms.divider />
        <x-forms.input name="url" label="Link Job To Your Site" />
        <x-forms.checkbox name="featured" label="Put This Job On Featured Job (Extra fee will be charge)" />

        <x-forms.button type="submit">Create Job</x-forms.button>
    </x-forms.form>
</x-layout>
