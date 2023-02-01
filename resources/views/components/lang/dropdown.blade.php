            <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
            <style>
                .lang-drop{
                    margin-right: 12% !important;
                }
            </style>
            
        <div class="dropdown float-right m-2 mt-2 lang-drop">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                言語
            </button>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                            {{ $properties['native'] }}
                    </a>
                </div>
            @endforeach
        </div>    
        
        