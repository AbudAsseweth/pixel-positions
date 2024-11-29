@props(['job'])

<x-panel class="flex-col">
    <div class="text-sm">{{ $job->employer->name }}</div>

    <div class="py-8 text-center">
        <h3 class="text-xl font-bold transition-colors duration-300 group-hover:text-blue-600">{{ $job->title }}</h3>
        <p class="mt-4 text-sm">{{ $job->schedule }} - From {{ $job->salary }}</p>
    </div>

    <div class="mt-auto flex items-center justify-between">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag size="small" :$tag />
            @endforeach
        </div>

        <x-employer-logo :employer="$job->employer" :width="42" :height="42"></x-employer-logo>
    </div>
</x-panel>
