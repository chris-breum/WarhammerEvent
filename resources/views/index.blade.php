<x-Doctype>
    <x-header></x-header>

   

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <h1 class="mb-0">Kommende arrangementer i Warhammer</h1>
            
            <div class="sort-controls">
                <label for="sortBy" style="margin-right: 10px; font-weight: 600;">Sorter efter:</label>
                <select id="sortBy" class="form-select d-inline-block" style="width: auto; min-width: 150px;" onchange="updateSort()">
                    <option value="date" {{ $sortBy === 'date' ? 'selected' : '' }}>Dato</option>
                    <option value="title" {{ $sortBy === 'title' ? 'selected' : '' }}>Titel</option>
                    <option value="category" {{ $sortBy === 'category' ? 'selected' : '' }}>Kategori</option>
                </select>
                
                <button class="btn btn-outline-secondary btn-sm ms-2" onclick="toggleOrder()" id="orderBtn" style="min-width: 100px;">
                    {{ $order === 'asc' ? '↑ Stigende' : '↓ Faldende' }}
                </button>
            </div>
        </div>

        <script>
            function updateSort() {
                const sortBy = document.getElementById('sortBy').value;
                const currentOrder = '{{ $order }}';
                window.location.href = '{{ url('/') }}?sort=' + sortBy + '&order=' + currentOrder;
            }

            function toggleOrder() {
                const sortBy = '{{ $sortBy }}';
                const newOrder = '{{ $order }}' === 'asc' ? 'desc' : 'asc';
                window.location.href = '{{ url('/') }}?sort=' + sortBy + '&order=' + newOrder;
            }
        </script>

        @forelse ($events as $event)
            <div class="card mb-4">
                <div class="row g-0">
                    @if($event->image_path)
                    <div class="col-md-3">
                        <img src="{{ asset($event->image_path) }}" class="img-fluid rounded-start event-img" alt="{{ $event->title }}">
                    </div>
                    @endif
                    <div class="{{ $event->image_path ? 'col-md-9' : 'col-md-12' }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $event->title }}</h5>
                            {{-- <p class="card-text">{{ $event->content }}</p> --}}
                            <p class="card-text"><strong>Category:</strong> {{ $event->category }}</p>
                            <p class="card-text"><strong>Date:</strong> {{ $event->date }}</p>
                            <p class="card-text"><strong>Time:</strong> {{ $event->start_time }} - {{ $event->end_time }}</p>
                            <a href="{{ url('/event/' . $event->id) }}" class="btn btn-primary">Læs mere</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>No events found</p>
        @endforelse
    </div>

    <x-footer></x-footer>
</x-Doctype>