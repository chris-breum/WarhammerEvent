<x-Doctype>
    <x-header></x-header>

    <div class="container mt-5 mb-5">
        <div class="form-container">
            <div class="form-header">
                <h1>✏️ Rediger Event</h1>
                <p class="form-subtitle">Opdater oplysningerne nedenfor</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>⚠️ Der er nogle fejl:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/events/' . $event->id) }}" method="POST" enctype="multipart/form-data" class="event-form">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <div class="form-group">
                        <label for="title">📝 Titel</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $event->title) }}" placeholder="Indtast event titel" required>
                    </div>

                    <div class="form-group">
                        <label for="category">🏷️ Kategori</label>
                        <input type="text" id="category" name="category" value="{{ old('category', $event->category) }}" placeholder="F.eks. Sport, Kultur, Møde" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">📄 Beskrivelse</label>
                    <textarea id="content" name="content" rows="6" placeholder="Beskriv dit arrangement i detaljer..." required>{{ old('content', $event->content) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="date">📅 Dato</label>
                        <input type="date" id="date" name="date" value="{{ old('date', $event->date) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="start_time">🕐 Starttid</label>
                        <input type="time" id="start_time" name="start_time" value="{{ old('start_time', $event->start_time) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="end_time">🕐 Sluttid</label>
                        <input type="time" id="end_time" name="end_time" value="{{ old('end_time', $event->end_time) }}" required>
                    </div>
                </div>

                <div class="form-group file-upload-group">
                    <label for="image" class="d-block mb-2">🖼️ Billede (valgfrit)</label>
                    @if($event->image_path)
                        <div class="mb-3">
                            <img src="{{ asset($event->image_path) }}" alt="Current image" style="max-width: 200px; height: auto; border-radius: 8px;">
                            <p class="mt-2 text-muted">Nuværende billede - upload et nyt for at erstatte</p>
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*" class="form-control">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <span>✓</span> Gem Ændringer
                    </button>
                    <a href="{{ url('/event/' . $event->id) }}" class="btn btn-secondary">
                        <span>✕</span> Annuller
                    </a>
                </div>
            </form>
        </div>
    </div>

    <x-footer></x-footer>
</x-Doctype>
