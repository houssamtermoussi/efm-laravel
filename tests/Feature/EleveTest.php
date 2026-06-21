<?php

use App\Models\Classe;
use App\Models\Eleve;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->classe = Classe::factory()->create();
});

// INDEX
it('displays the list of eleves', function () {
    Eleve::factory()->count(3)->create(['classe_id' => $this->classe->id]);

    $response = $this->actingAs($this->user)->get(route('eleve.index'));

    $response->assertStatus(200);
    $response->assertViewHas('eleves');
    $response->assertViewIs('eleve.index');
});

// CREATE
it('displays the create form', function () {
    $response = $this->actingAs($this->user)->get(route('eleve.create'));

    $response->assertStatus(200);
    $response->assertViewIs('eleve.create');
    $response->assertViewHas('classes');
});

// STORE
it('stores a new eleve', function () {
    $data = [
        'nom' => 'Dupont',
        'prenom' => 'Jean',
        'age' => 20,
        'classe_id' => $this->classe->id,
    ];

    $response = $this->actingAs($this->user)->post(route('eleve.store'), $data);

    $response->assertRedirect(route('eleve.index'));
    $response->assertSessionHas('success');
    $this->assertDatabaseHas('eleves', ['nom' => 'Dupont', 'prenom' => 'Jean']);
});

it('fails to store eleve without required fields', function () {
    $response = $this->actingAs($this->user)->post(route('eleve.store'), []);

    $response->assertSessionHasErrors(['nom', 'prenom', 'age', 'classe_id']);
});

// SHOW
it('displays a single eleve', function () {
    $eleve = Eleve::factory()->create(['classe_id' => $this->classe->id]);

    $response = $this->actingAs($this->user)->get(route('eleve.show', $eleve->id));

    $response->assertStatus(200);
    $response->assertViewIs('eleve.show');
    $response->assertViewHas('eleve');
});

// EDIT
it('displays the edit form', function () {
    $eleve = Eleve::factory()->create(['classe_id' => $this->classe->id]);

    $response = $this->actingAs($this->user)->get(route('eleve.edit', $eleve->id));

    $response->assertStatus(200);
    $response->assertViewIs('eleve.edit');
    $response->assertViewHas('eleve');
    $response->assertViewHas('classes');
});

// UPDATE
it('updates an existing eleve', function () {
    $eleve = Eleve::factory()->create(['classe_id' => $this->classe->id]);

    $data = [
        'nom' => 'Martin',
        'prenom' => 'Paul',
        'age' => 22,
        'classe_id' => $this->classe->id,
    ];

    $response = $this->actingAs($this->user)->put(route('eleve.update', $eleve->id), $data);

    $response->assertRedirect(route('eleve.index'));
    $this->assertDatabaseHas('eleves', ['id' => $eleve->id, 'nom' => 'Martin', 'prenom' => 'Paul']);
});

it('fails to update eleve without required fields', function () {
    $eleve = Eleve::factory()->create(['classe_id' => $this->classe->id]);

    $response = $this->actingAs($this->user)->put(route('eleve.update', $eleve->id), []);

    $response->assertSessionHasErrors(['nom', 'prenom', 'age', 'classe_id']);
});

// DESTROY
it('deletes an eleve', function () {
    $eleve = Eleve::factory()->create(['classe_id' => $this->classe->id]);

    $response = $this->actingAs($this->user)->delete(route('eleve.destroy', $eleve->id));

    $response->assertRedirect(route('eleve.index'));
    $this->assertDatabaseMissing('eleves', ['id' => $eleve->id]);
});
