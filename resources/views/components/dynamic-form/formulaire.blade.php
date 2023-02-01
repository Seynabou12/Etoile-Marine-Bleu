
@isset($data)
@foreach ($data as $key => $item)
    @php
        $label = $item['label']?? '';
        $required = isset($item["required"]) && $item['required'] ? "required" : "" ;
        $class = $item['label_class']?? '';
        $type = $item['input'];
        $placeholder = $item['placeholder']??'info à saisir';
        $name = $item['name']??'';
        $card_id = $item['card_id']??'';
        $card_class = $item['card_class']??'';
        $value = $item['value']??'';
        $list = $item['list']??[];
        if(isset($action) && $action == 'edit') $id = $item['id2']??'';
        else $id = $item['id']??'';

    @endphp
    <div class="{{ $item['col']??'col-12 ' }} {{ $card_class??'' }}" id="{{ $card_id??'' }}">
        <div class="form-group">
            <label for="{{ $id }}" class="{{ $class }}">{{ $label}}</label>
            @if (in_array($item['input'],['text','number','email', 'date']))
                <input type="{{ $type }}" id="{{ $id }}" value="{{ $value }}" placeholder="{{ $placeholder }}" name="{{ $name }}"  {{ $required }}  class="form-control">
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $key => $error)
                        @if ($errors->has($name))
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $error }}</strong>
                            </span>
                        @endif
                    @endforeach
                    
                @endif --}}
                @error($name)
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            @elseif ($type == 'textarea')
                <textarea id="{{ $id }}" placeholder="{{ $placeholder }}" name="{{ $name }}" cols="30" rows="4" class="form-control" {{ $required }}></textarea>
            @elseif ($type == 'select')
                <select name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}" {{ $required }} class="form-control {{ $select2 ?? '' }}">
                    @foreach ($list as $key => $element )
                        @php $selected = "";
                            if( $key==$value ) $selected = "selected";
                        @endphp
                        <option value="{{ $element->id }}" {{ $selected }} class="text-primary"> {{ $element->name }}</option>
                    @endforeach
                </select>
            @endif
            
        </div>
    </div>
@endforeach
@else
<div class="jumbotron p-3">
    <h5 class="text-center">Formulaire non disponible</h5>
    <p>Veuillez configurer les infos</p>
</div>
@endisset
