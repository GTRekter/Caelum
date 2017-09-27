<!-- START: Breeding -->
<style>
    body {
    font-family: sans-serif;
    }

    /* ---- button ---- */

    .button {
    display: inline-block;
    padding: 10px 18px;
    margin-bottom: 10px;
    background: #EEE;
    border: none;
    border-radius: 7px;
    background-image: linear-gradient( to bottom, hsla(0, 0%, 0%, 0), hsla(0, 0%, 0%, 0.2) );
    color: #222;
    font-family: sans-serif;
    font-size: 16px;
    text-shadow: 0 1px white;
    cursor: pointer;
    }

    .button:hover {
    background-color: #8CF;
    text-shadow: 0 1px hsla(0, 0%, 100%, 0.5);
    color: #222;
    }

    .button:active,
    .button.is-checked {
    background-color: #28F;
    }

    .button.is-checked {
    color: white;
    text-shadow: 0 -1px hsla(0, 0%, 0%, 0.8);
    }

    .button:active {
    box-shadow: inset 0 1px 10px hsla(0, 0%, 0%, 0.8);
    }

    /* ---- button-group ---- */

    .button-group:after {
    content: '';
    display: block;
    clear: both;
    }

    .button-group .button {
    float: left;
    border-radius: 0;
    margin-left: 0;
    margin-right: 1px;
    }

    .button-group .button:first-child { border-radius: 0.5em 0 0 0.5em; }
    .button-group .button:last-child { border-radius: 0 0.5em 0.5em 0; }

    /* ---- isotope ---- */

    .isotope-grid {
    border: 1px solid #333;
    }

    /* clear fix */
    .isotope-grid:after {
    content: '';
    display: block;
    clear: both;
    }

    /* ---- .element-item ---- */

    .element-item {
    position: relative;
    float: left;
    width: 100px;
    height: 100px;
    margin: 5px;
    padding: 10px;
    background: #888;
    color: #262524;
    }

    .element-item > * {
    margin: 0;
    padding: 0;
    }

    .element-item .name {
    position: absolute;

    left: 10px;
    top: 60px;
    text-transform: none;
    letter-spacing: 0;
    font-size: 12px;
    font-weight: normal;
    }

    .element-item .symbol {
    position: absolute;
    left: 10px;
    top: 0px;
    font-size: 42px;
    font-weight: bold;
    color: white;
    }

    .element-item .number {
    position: absolute;
    right: 8px;
    top: 5px;
    }

    .element-item .weight {
    position: absolute;
    left: 10px;
    top: 76px;
    font-size: 12px;
    }

    .element-item.alkali          { background: #F00; background: hsl(   0, 100%, 50%); }
    .element-item.alkaline-earth  { background: #F80; background: hsl(  36, 100%, 50%); }
    .element-item.lanthanoid      { background: #FF0; background: hsl(  72, 100%, 50%); }
    .element-item.actinoid        { background: #0F0; background: hsl( 108, 100%, 50%); }
    .element-item.transition      { background: #0F8; background: hsl( 144, 100%, 50%); }
    .element-item.post-transition { background: #0FF; background: hsl( 180, 100%, 50%); }
    .element-item.metalloid       { background: #08F; background: hsl( 216, 100%, 50%); }
    .element-item.diatomic        { background: #00F; background: hsl( 252, 100%, 50%); }
    .element-item.halogen         { background: #F0F; background: hsl( 288, 100%, 50%); }
    .element-item.noble-gas       { background: #F08; background: hsl( 324, 100%, 50%); }
</style>

<link href="<?php echo $this->config->item('libraries_url'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet" />  
<link href="<?php echo $this->config->item('libraries_url'); ?>/animate/css/animate.css" rel="stylesheet">
<link href="<?php echo $this->config->item('contents_css'); ?>/frontend.css" rel="stylesheet">

<header id="breeding-header">
</header>

<div id="breeding">
    <section class="section-breeding">
        <div class="container">
            <div class="row">
                <div class="col-xs-offset-2 col-sm-offset-3 col-xs-8 col-sm-6 wow fadeInDown">
                    <div class="box text-center">
                        <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/allevamento.png" alt="" >
                        <span class="title-breeding-header">L'Allevamento<br>Ibiscoblu</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center" >
                    <h2 class="section-heading">Alcune cose da sapere</h2>
                    <hr class="primary">
                    <p>Tutti i cani dell’allevamento sono selezionati per bellezza, salute e sono muniti di pedigree ENCI. I cuccioli potranno essere adottati dalle nuove famiglie dopo.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="service">
                        <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/icons/premio.png" alt="" />
                        <h3 class="service-header">Certificazioni ENCI FCI</h3>
                        <p class="text-muted">Allevamento professionale riconosciuto ENCI e FCI. Stipuliamo un contratto di vendita per la tutela dell’acquirente.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="service">
                        <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/icons/dna.png" alt="" />
                        <h3 class="service-header">Selezione genetica</h3>
                        <p class="text-muted">Selezioniamo con cura tutti i nostri cani per bellezza e salute. Ogni cane è munito di pedigree ENCI.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="service">
                        <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/icons/cuore.png" alt="" />
                        <h3 class="service-header">Imprinting</h3>
                        <p class="text-muted">Il contatto continuo con il personale permette ai cuccioli di ricevere l’imprinting necessario per essere cani equilibrati.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="service">
                        <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/icons/zampe.png" alt="" />
                        <h3 class="service-header">Adozione cuccioli</h3>
                        <p class="text-muted">I cuccioli potranno essere adottati dopo il 60° giorno d’età con il primo vaccino, un ciclo completo di sverminazione, microchip e pedigree.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="service">
                        <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/icons/osso.png" alt="" />
                        <h3 class="service-header">Pochi ma buoni!</h3>
                        <p class="text-muted">Non sempre sono disponibili cuccioli perchè non è una produzione a regime di fabbrica e non importiamo dall’estero.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                    <div class="service">
                        <img src="<?php echo $this->config->item('contents_img'); ?>/frontend/icons/telefono.png" alt="" />
                        <h3 class="service-header">Assistenza illimitata</h3>
                        <p class="text-muted">Ci piacciono le cose fatte bene, ecco perchè i nostri clienti hanno diritto ad assistenza post-vendita illimitata.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-carousel">
        <div class="container header-container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Le nostre razze</h2>
                </div>
            </div>
        </div>
        <div class="container carousel-container">

            <div id="breeding-carousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 left-side">
                                <img class="img-responsive" src="<?php echo $this->config->item('contents_img'); ?>/frontend/homepage-retire.jpg" />
                            </div>
                            <div class="col-xs-12 col-sm-6 right-side">
                                <h2 class="section-heading">Sto cercando  un nuovo cucciolo</h2>
                                <hr>
                                <p class="section-body">Il nostro allevamento è certificato ENCI e FCI per garantirti la massima professionalità e trasparenza. Scopri le nostre razze e i cuccioli disponibili!</p>
                            </div>
                        </div>     
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 left-side">
                                <img class="img-responsive" src="<?php echo $this->config->item('contents_img'); ?>/frontend/homepage-retire.jpg" />
                            </div>
                            <div class="col-xs-12 col-sm-6 right-side">
                                <h2 class="section-heading">Sto cercando  un nuovo cucciolo</h2>
                                <hr>
                                <p class="section-body">Il nostro allevamento è certificato ENCI e FCI per garantirti la massima professionalità e trasparenza. Scopri le nostre razze e i cuccioli disponibili!</p>
                            </div>
                        </div>     
                    </div>
                </div>

                <!-- Indicators -->
                <div class="row">
                    <div class="col-xs-12">
                        <ol class="carousel-indicators">
                            <li data-target="#breeding-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#breeding-carousel" data-slide-to="1"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-dog">

        <div class="button-group filters-button-group">
            <button class="button is-checked" data-filter="*">show all</button>
            <button class="button" data-filter=".metal">metal</button>
            <button class="button" data-filter=".transition">transition</button>
            <button class="button" data-filter=".alkali, .alkaline-earth">alkali and alkaline-earth</button>
            <button class="button" data-filter=":not(.transition)">not transition</button>
            <button class="button" data-filter=".metal:not(.transition)">metal but not transition</button>
            <button class="button" data-filter="numberGreaterThan50">number > 50</button>
            <button class="button" data-filter="ium">name ends with &ndash;ium</button>
        </div>


        <div class="isotope-grid">
            <div class="element-item transition metal " data-category="transition">
                <h3 class="name">Mercury</h3>
                <p class="symbol">Hg</p>
                <p class="number">80</p>
                <p class="weight">200.59</p>
            </div>
            <div class="element-item metalloid " data-category="metalloid">
                <h3 class="name">Tellurium</h3>
                <p class="symbol">Te</p>
                <p class="number">52</p>
                <p class="weight">127.6</p>
            </div>
            <div class="element-item post-transition metal " data-category="post-transition">
                <h3 class="name">Bismuth</h3>
                <p class="symbol">Bi</p>
                <p class="number">83</p>
                <p class="weight">208.980</p>
            </div>
            <div class="element-item post-transition metal " data-category="post-transition">
                <h3 class="name">Lead</h3>
                <p class="symbol">Pb</p>
                <p class="number">82</p>
                <p class="weight">207.2</p>
            </div>
            <div class="element-item transition metal " data-category="transition">
                <h3 class="name">Gold</h3>
                <p class="symbol">Au</p>
                <p class="number">79</p>
                <p class="weight">196.967</p>
            </div>
            <div class="element-item alkali metal " data-category="alkali">
                <h3 class="name">Potassium</h3>
                <p class="symbol">K</p>
                <p class="number">19</p>
                <p class="weight">39.0983</p>
            </div>
            <div class="element-item alkali metal " data-category="alkali">
                <h3 class="name">Sodium</h3>
                <p class="symbol">Na</p>
                <p class="number">11</p>
                <p class="weight">22.99</p>
            </div>
            <div class="element-item transition metal " data-category="transition">
                <h3 class="name">Cadmium</h3>
                <p class="symbol">Cd</p>
                <p class="number">48</p>
                <p class="weight">112.411</p>
            </div>
            <div class="element-item alkaline-earth metal " data-category="alkaline-earth">
                <h3 class="name">Calcium</h3>
                <p class="symbol">Ca</p>
                <p class="number">20</p>
                <p class="weight">40.078</p>
            </div>
            <div class="element-item transition metal " data-category="transition">
                <h3 class="name">Rhenium</h3>
                <p class="symbol">Re</p>
                <p class="number">75</p>
                <p class="weight">186.207</p>
            </div>
            <div class="element-item post-transition metal " data-category="post-transition">
                <h3 class="name">Thallium</h3>
                <p class="symbol">Tl</p>
                <p class="number">81</p>
                <p class="weight">204.383</p>
            </div>
            <div class="element-item metalloid " data-category="metalloid">
                <h3 class="name">Antimony</h3>
                <p class="symbol">Sb</p>
                <p class="number">51</p>
                <p class="weight">121.76</p>
            </div>
            <div class="element-item transition metal " data-category="transition">
                <h3 class="name">Cobalt</h3>
                <p class="symbol">Co</p>
                <p class="number">27</p>
                <p class="weight">58.933</p>
            </div>
            <div class="element-item lanthanoid metal inner-transition " data-category="lanthanoid">
                <h3 class="name">Ytterbium</h3>
                <p class="symbol">Yb</p>
                <p class="number">70</p>
                <p class="weight">173.054</p>
            </div>
            <div class="element-item noble-gas nonmetal " data-category="noble-gas">
                <h3 class="name">Argon</h3>
                <p class="symbol">Ar</p>
                <p class="number">18</p>
                <p class="weight">39.948</p>
            </div>
            <div class="element-item diatomic nonmetal " data-category="diatomic">
                <h3 class="name">Nitrogen</h3>
                <p class="symbol">N</p>
                <p class="number">7</p>
                <p class="weight">14.007</p>
            </div>
            <div class="element-item actinoid metal inner-transition " data-category="actinoid">
                <h3 class="name">Uranium</h3>
                <p class="symbol">U</p>
                <p class="number">92</p>
                <p class="weight">238.029</p>
            </div>
            <div class="element-item actinoid metal inner-transition " data-category="actinoid">
                <h3 class="name">Plutonium</h3>
                <p class="symbol">Pu</p>
                <p class="number">94</p>
                <p class="weight">(244)</p>
            </div>
            </div>
    </section>
</div>
<!-- END: Breeding -->