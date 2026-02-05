<x-Doctype>
    <x-header></x-header>

    <div class="container mt-5 mb-5">
        <h1>Brugeradministration</h1>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="card mt-4">
            <div class="card-body p-0">
                <!-- Desktop view -->
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Rolle</th>
                            <th>Oprettet</th>
                            <th>Handling</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if ($user->id !== auth()->id())
                                        <form action="{{ url('/users/' . $user->id . '/role') }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            
                                            @if ($user->role === 'user')
                                                <input type="hidden" name="role" value="admin">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    Gør til Admin
                                                </button>
                                            @else
                                                <input type="hidden" name="role" value="user">
                                                <button type="submit" class="btn btn-sm btn-secondary">
                                                    Gør til Bruger
                                                </button>
                                            @endif
                                        </form>
                                    @else
                                        <span class="text-muted">Dig selv</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>

                <!-- Mobile view -->
                <div class="d-md-none">
                    @foreach ($users as $user)
                        <div class="user-card-mobile">
                            <div class="user-card-header">
                                <strong>{{ $user->email }}</strong>
                                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </div>
                            <div class="user-card-body">
                                <p class="mb-1"><small class="text-muted">ID:</small> {{ $user->id }}</p>
                                <p class="mb-2"><small class="text-muted">Oprettet:</small> {{ $user->created_at->format('d/m/Y') }}</p>
                                
                                @if ($user->id !== auth()->id())
                                    <form action="{{ url('/users/' . $user->id . '/role') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        
                                        @if ($user->role === 'user')
                                            <input type="hidden" name="role" value="admin">
                                            <button type="submit" class="btn btn-primary w-100">
                                                🔼 Gør til Admin
                                            </button>
                                        @else
                                            <input type="hidden" name="role" value="user">
                                            <button type="submit" class="btn btn-secondary w-100">
                                                🔽 Gør til Bruger
                                            </button>
                                        @endif
                                    </form>
                                @else
                                    <div class="alert alert-info mb-0" style="font-size: 14px; padding: 8px;">
                                        ℹ️ Dette er din egen konto
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</x-Doctype>
