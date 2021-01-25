<div class="form-group">
    <label for="parent_id" class="col-form-label">Выбрать родительскую категорию:</label>
    <select id="parent_id" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id">
        <option value="">-- Выберите категорию</option>
        @foreach ($categories as $parent)
            <option value="{{ $parent->id }}"{{ $parent->id == old('parent_id') ? ' selected' : '' }}>
                @for ($i = 0; $i < $parent->depth; $i++) &mdash; @endfor
                {{ $parent->name }}
            </option>
        @endforeach;
    </select>
    @if ($errors->has('parent_id'))
        <span class="invalid-feedback">
            <strong>
                {{ $errors->first('parent_id') }}
            </strong>
        </span>
    @endif
</div>
