<h1>Modifier un élève</h1>
<form action="{{ route('eleve.update', $eleve->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="{{ $eleve->nom }}" required>
    </div>
    <div>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="{{ $eleve->prenom }}" required>
    </div>
    <div>
        <label for="age">Âge:</label>
        <input type="number" id="age" name="age" value="{{ $eleve->age }}" required>
    </div>
    <div>
        <label for="classe_id">Classe:</label>
        <select id="classe_id" name="classe_id" required>
            @foreach($classes as $classe)
                <option value="{{ $classe->id }}" {{ $eleve->classe_id == $classe->id ? 'selected' : '' }}>
                    {{ $classe->nom }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit">Modifier</button>
</form>