<div>
    <ul>
        @foreach ($enrollments as $enrollment)
            <li>{{ $enrollment->course_id }}</li>
        @endforeach
    </ul>
</div>