@php
$path_explode = explode('/', request()->path());
if(in_array($path_explode[0], Config::get('app.availables_lang'))) {
    array_splice($path_explode, 0, 1);
}
$base_path = "";
if(count($path_explode) > 0) $base_path = implode('/', $path_explode);
@endphp

<div id="langs">
    <a href="/jp{{ $base_path != "" ? "/$base_path" : "" }}" class="{{ app()->getLocale() == "jp" ? "active" : "" }}" title="日本"><img src="{{ asset('img/jp.png') }}" class="icon" width="15px" alt="FR"></a>
    <a href="/en{{ $base_path != "" ? "/$base_path" : "" }}" class="{{ app()->getLocale() == "en" ? "active" : "" }}" title="English"><img src="{{ asset('img/en.png') }}" class="icon" width="15px" alt="EN"></a>
</div>

