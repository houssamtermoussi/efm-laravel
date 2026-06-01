<h1>Ajouter un élève</h1>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form action="{{ route('eleve.store') }}" method="POST">
    @csrf
    <div>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
    </div>
    <div>
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
    </div>
    <div>
        <label for="age">Âge:</label>
        <input type="number" id="age" name="age" required>
    </div>
    <div>
        <label for="classe_id">Classe:</label>
        <select id="classe_id" name="classe_id" required>
            @foreach($classes as $classe)
                <option value="{{ $classe->id }}">{{ $classe->nom }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Ajouter</button>
</form>
