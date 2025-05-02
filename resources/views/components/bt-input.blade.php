@props(['label' => '', 'type' => 'text', 'messages'])

<div class="mb-3">
    <label class="form-label" for="validationCustom01">{{ $label }}</label>
    <input type={{ $type }} {{ $attributes->merge(['class' => 'form-control']) }}>
    {{-- @if (!empty($messages))
        <div class="invalid-feedback">
            <ul>
                @foreach ((array) $messages as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
</div>
