<a class="{{ isset($class) ? $class : 'btn btn-danger btn-sm'}}" type="button" href="#"
    onclick="event.preventDefault();
    if(confirm('voulez vous supprimer l\'élement')){
        document.getElementById('element{{ $entity->id }}').submit();
    }"
>
    {!! isset($btnInnerHTML) ? $btnInnerHTML : '<i class="fa fa-trash"></i>' !!}
</a>
<form id="element{{ $entity->id }}" action="{{ $url }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>