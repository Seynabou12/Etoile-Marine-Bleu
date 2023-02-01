@extends('layouts.admin')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@section('title', __('dashboard.nouvelle_universite'))

@section('content')

    <form method="POST" action="{{ route('admin.universites.store', $universite) }}" class="radius-30 card-body rounded bg-white">
        @csrf
        @include('admin.universites.form')
    </form>

@endsection
@section('scriptBottom')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $('.btn-trash').hide();
        var cpt = 0;
        $( ".add-faculte" ).click(function(){
            cpt++;
            // $('.faculte').addClass('faculte-'+cpt)
            $( ".contenu" ).first().clone().appendTo( ".cloned" )
                // .append('<button class="remove col-1 btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>')
                .find('input').val('');
            $(".cloned>.contenu").append('<div class=""><button class="remove btn btn-danger btn-sm mt-4"> <i class="fa fa-trash"></i></button></div>')
            $(".cloned>.contenu").removeClass('contenu')
            $(".cloned>div").addClass('removeBtn mt-3')
        });
        $( "body" ).on('click', '.remove', function(){
            $(this).closest('.removeBtn').remove();
        });

        $(function(){
            $('body').on('click', '.enable', function() {
                var x = document.getElementById("password");
                if (x.disabled === false) {
                    x.disabled = true;
                    // x.type = "text";
                    document.getElementById("password-confirm").disabled = true;
                } else {
                    x.disabled = false;
                    // x.type = "password";
                    document.getElementById("password-confirm").disabled = false;
                }
            });
        })

    </script>
    <script>
        $(document).ready(function () {
            $(function () {
                var facultesTags = @json($_facultes->pluck('name'));
                var departementsTags = @json($_departements->pluck('name'));


                function split( val ) {
                return val.split( /,\s*/ );
                }
                function extractLast( term ) {
                return split( term ).pop();
                }
                $('body').on('keydown', '.facultes', function() {

                    // action('clone',facultesTags)
                    $( ".facultes" ).autocomplete({
                        source: facultesTags
                    });
                });

                $("body").on("keydown",'.departements', function(){
                    action('departements',departementsTags)
                });
                function action(id,data){

                    $( "."+ id +"" )
                        // don't navigate away from the field on tab when selecting an item
                        .on( "keydown", function( event ) {
                            if ( event.keyCode === $.ui.keyCode.TAB &&
                                $( this ).autocomplete( "instance" ).menu.active ) {
                            event.preventDefault();
                            }
                        })
                        .autocomplete({
                                minLength: 0,
                                source: function( request, response ) {
                                // delegate back to autocomplete, but extract the last term
                                response( $.ui.autocomplete.filter(
                                    data, extractLast( request.term ) ) );
                                },
                                focus: function() {
                                // prevent value inserted on focus
                                return false;
                                },
                                select: function( event, ui ) {
                                var terms = split( this.value );
                                // remove the current input
                                terms.pop();
                                // add the selected item
                                terms.push( ui.item.value );
                                // add placeholder to get the comma-and-space at the end
                                terms.push( "" );

                                this.value = terms.join( ", " );
                                return false;
                                }
                    });
                }
            });
        });

    </script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"
        integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" ></script>


@endsection
