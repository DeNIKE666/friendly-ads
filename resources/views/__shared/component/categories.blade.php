<div class="form-group">
    <label for="category_id" class="col-form-label">Выбрать родительскую категорию:</label>
    <select id="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
        <option value="">-- Выберите категорию</option>
        @foreach ($categories as $parent)
            <option value="{{ $parent->id }}"
                    @isset($current)
                     {{ $parent->id == $current->category_id ? 'selected' : '' }}
                    @endisset
                    {{ $parent->id == old('category_id') ? ' selected' : '' }}>
                @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                {{ $parent->name }}
            </option>
        @endforeach;
    </select>
    @error('category_id')
        <span class="invalid-feedback">
            <strong>
                {{ $message }}
            </strong>
        </span>
    @enderror
</div>
