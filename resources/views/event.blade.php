<x-Doctype>
    <x-header></x-header>

    <div class="container mt-5">
        <div class="card mb-4">
            <div class="row g-0">
                @if($event->image_path)
                <div class="col-md-4">
                    <img src="{{ asset($event->image_path) }}" class="img-fluid rounded-start event-img" alt="{{ $event->title }}">
                </div>
                @endif
                <div class="{{ $event->image_path ? 'col-md-8' : 'col-md-12' }}">
                    <div class="card-body">
                        <h5 class="card-title mb-3">{{ $event->title }}</h5>
                        <p>{{ $event->content }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $event->category }}</p>
                        <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                        <p class="card-text"><strong>Time:</strong> {{ $event->start_time }} - {{ $event->end_time }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
</x-Doctype>


