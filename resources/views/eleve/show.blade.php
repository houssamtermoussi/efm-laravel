<h1>Détails de l'élève</h1>
<p><strong>Nom:</strong> {{ $eleve->nom }}</p>
<p><strong>Prénom:</strong> {{ $eleve->prenom }}</p>
<p><strong>Âge:</strong> {{ $eleve->age }}</p>
<p><strong>Classe:</strong> {{ $eleve->classe->nom }}</p>
<a href="{{ route('eleve.edit', $eleve->id) }}">Modifier</a>
<a href="{{ route('eleve.index') }}">Retour à la liste</a>