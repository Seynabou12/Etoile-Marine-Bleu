<link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
<!-- <div class="container">
   <div class="title">
        <div class="img">
            <img src="{{ asset('img/logicone.png') }}" alt="img">
        </div>
        <div class="txt">
            Bienvenue sur MyREVO
        </div>
   </div>
   <div class="row">
        <div class="img">
            <img src="{{ asset('img/homImg.png') }}" alt="img">
        </div>
        <div class="details-card">
            <button class="card-title">
                Connexion à MyPathway
            </button>
            <div class="card-content">
                <div class="txt">
                    <h3> Futurs étudiants</h3>
                    <p>Se connecter à l'espace</p>
                </div>
                <div class="cnx-btn">
                    <img src="{{ asset('img/l_etudiant.png') }}" alt="img">
                    <p>Connexion des étudiants</p>
                </div>
                <div class="txt">
                    <h3>Université</h3>
                    <p>Se connecter à l'espace</p>
                </div>
                <div class="cnx-btn">
                    <img src="{{ asset('img/l_universite.png') }}" alt="img">
                    <p>Connexion à l'université</p>
                </div>
            </div>
        </div>
   </div>
   <div class="section2 d-flex flex-row justify-content-between">
        <h2>Actualités</h2>
        <p>A la une</p>
   </div>
   <div class="section3">
     <div class="date">
        <p>13-07-2022</p>
     </div>
     <div class="txt">
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.  ipsum dolor sit amet consectetur, adipisicing elit.
        </p>
     </div>
     <div class="btn">
       <button>
        Voir autres
       </button>
     </div>
   </div>
   <div class="section4 d-flex flex-row ">
        <div class="txt">
            <p>
                En savoir plus sur
            </p>
        </div>
        <div class="btn">
            <button>
                MyREVO
            </button>
        </div>
   </div>
</div> -->

<style>
    .point-o{
        background-color: #FF552A;
        border-radius: 50%;
        width: 10px;
        height: 10px;
        margin-right: 10px;
        margin-left: 18px;
    }
</style>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12">
            <img class="minilogo" src="{{ asset('img/mini-logo.png') }}" alt="img">
            <h2 class="home-title ml-5 ">Bienvenue sur MyREVO</h2>
        </div>
    </div>
    <div class="row bg-white  section1 d-flex flex-row justify-content-between">
        <div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl6 ">
            <img class="home-img" src="{{ asset('img/homImg.png') }}" alt="img">
        </div>
        <div class="col-12 col-sm-12 col-md-8 col-lg-6 col-xl6">
            <div class="card detail-card ml-5">
                <div class="card-title">
                    <h3>Connexion à MyPathway</h3>
                </div>
                <div class="card-content">
                    <div class="txt">
                        <h3 class="h3-1">Futurs étudiants</h3>
                        <p>Se connecter à l'espace</p>
                    </div>
                    <a href="{{ url('/login') }}" class="cnx-btn">
                        <img src="{{ asset('img/l_etudiant.png') }}" alt="img">
                        <p>Connexion des étudiants</p>   
                    </a>
                    <div class="txt">
                        <h3 class="h3-2">Université</h3>
                        <p>Se connecter à l'espace</p>
                    </div>
                    <a href="{{ url('/myPathway/inscription') }}" class="cnx-btn">
                        <img src="{{ asset('img/l_universite.png') }}" alt="img">
                        <p>Connexion à l'université</p>
                    </a>  
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 mb-5 section-5">
        <div class="col-12 actualite ">
            <h4 class="text-primary d-inline">
                Actualité
            </h4>
            <span class="text-muted d-inline ml-2 ">à la une</span>
        </div>
    </div>
    <!-- descktop -->
    <div class="row mt-5 p-1 bg-white radius-3O desk">
        <div class="col-2">
            <span class="date p-2 radius-3O">13-07-2022</span>
        </div>
        <div class="actuality-txt col-8 d-flex flex-row">
            <div class="point-o"></div>
            <span class="">
                Lorem ipsum dolor sit amet consectetur.  ipsum dolor sit amet consectetur, adipisicing elit.
            </span>
        </div>
        <div class=" col-2 ">
            <button class="btn btn-outline-primary ml-3">
                Voir autres
            </button>
        </div>
    </div>
    <!-- modbile -->
    <div class="row mt-5 bg-danger rounded mobile">
        <div class="txt row bg-white p-2 rounded d-flex flex-row">
            <div class="point-o"></div>
            <p>
                Lorem ipsum dolor sit amet consectetur.  ipsum dolor sit amet consectetur, adipisicing elit.
            </p>
        </div>
       <div class="row bg-white bg-none p-3 rounded end">
            <div class="col-6 date ">
                <p>13-07-2022</p>
            </div>
            <div class=" col-6 ">
                <button class=" btn -primary voir-plus ml-3 ">
                    Voir autres
                </button>
            </div>
       </div>
    </div>
    <div class="row mt-5 mb-3">
        <div class="col-12 d-flex flex-row ">
            <h4 class="title-plus mt-3 mr-3 ml-0">
                En savoir plus sur
            </h4>
            <button 
                class="bg-primary p-1 btn-plus ml-0"

            >
               <a href="{{url('/Mypathway')}}">
                MyREVO
               </a>
            </button>
        </div>
    </div>
</div>