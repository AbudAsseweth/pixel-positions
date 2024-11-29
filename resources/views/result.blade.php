<x-layout>
    <div class="space-y-10 pb-12">

        <section class="pt-6 text-center">
            <h1 class="mb-8 text-4xl font-bold">Let's Find Your Next Job</h1>

            <x-forms.form action="/search">
                <x-forms.input name="q" class="max-w-xl bg-white/5" />
            </x-forms.form>
        </section>

        <section>
            <x-section-heading>Jobs Found</x-section-heading>

            <div class="mt-6 space-y-6">

                @foreach ($jobs as $job)
                    <x-job-card-wide :$job />
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
