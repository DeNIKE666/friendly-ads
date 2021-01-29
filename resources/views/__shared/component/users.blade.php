<div class="form-group">
    <label for="user_id" class="col-form-label">Выбрать пользователя:</label>
    <select id="user_id" class="form-control{{ $errors->has('user_id') ? ' is-invalid' : '' }}" name="user_id">
        <option value="">-- Выберите пользователя</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}"
                    @isset($current)
                        {{ $user->id == $current ? 'selected' : '' }}
                    @endisset
                    {{ $user->id == old('user_id') ? ' selected' : '' }}>
                {{ $user->username }}
            </option>
        @endforeach;
    </select>
    @error('user_id')
        <span class="invalid-feedback">
            <strong>
                {{ $message }}
            </strong>
        </span>
    @enderror
</div>
