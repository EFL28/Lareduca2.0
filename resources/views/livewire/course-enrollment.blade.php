<div>
    <ul>
        @foreach ($enrollments as $enrollment)
        <div class="p-4">
            <h2 class="font-semibold text-xl text-gray-800">{{ $enrollment->course->title }}</h2>
            <p class="text-gray-600">{{ $enrollment->course->description }}</p>
        </div>
        @endforeach
    </ul>
</div>