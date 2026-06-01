<h1>liste des élèves</h1>
<a href="{{ route('eleve.create') }}">Ajouter un élève</a>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Âge</th>
            <th>Classe</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eleves as $eleve)
        <tr>
            <td>{{ $eleve->nom }}</td>
            <td>{{ $eleve->prenom }}</td>
            <td>{{ $eleve->age }}</td>
            <td>{{ $eleve->classe->nom }}</td>
            <td>
                <a href="{{ route('eleve.show', $eleve->id) }}">Voir</a>
                <a href="{{ route('eleve.edit', $eleve->id) }}">Modifier</a>
                <form action="{{ route('eleve.destroy', $eleve->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>