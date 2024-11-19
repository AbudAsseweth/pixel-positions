@props(['job'])

<x-panel>
    <div>
        <x-employer-logo></x-employer-logo>
    </div>

    <div class="ml-10 flex flex-1 flex-col">
        <a href="" class="text-sm text-gray-400">{{ $job->employer->name }}</a>

        <h3 class="mt-3 text-xl font-bold transition-colors duration-300 group-hover:text-blue-600">{{ $job->title }}
        </h3>
        <p class="mt-auto text-sm text-gray-400">Full Time - From $60,000</p>
    </div>

    <div class="flex flex-col justify-between">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size="small" />
            @endforeach
        </div>

        {{-- <div>
            <x-tag>Tag</x-tag>
            <x-tag>Tag</x-tag>
        </div> --}}
    </div>
</x-panel>
