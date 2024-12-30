<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Nom -->
    <div>
        <label for="name">Nom</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <!-- Email -->
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <!-- Mot de passe -->
    <div>
        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Confirmation du mot de passe -->
    <div>
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <!-- Sélection du rôle -->
    <div>
        <label for="role">Rôle</label>
        <select name="role" id="role" required>
            <option value="eleve" {{ old('role') == 'eleve' ? 'selected' : '' }}>Élève</option>
            <option value="professeur" {{ old('role') == 'professeur' ? 'selected' : '' }}>Professeur</option>
        </select>
    </div>

    <div>
        <button type="submit">S'inscrire</button>
    </div>
</form>
