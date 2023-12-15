<?php

$title = TITREONGLET;
$header = NOMSITE;
$titre = "";

ob_start();
?>
<section class="home">
    <div class="hero">
        <h1>Adoptez sans compter</h1>

        <span>Adoptez chez nous par pitié ou je m'énerver de zinzin aller bouboubinks en sah de sah</span>

        <div class="button_container">
            <button>
                <svg width="41" height="43" viewBox="0 0 41 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="Group 8">
                        <ellipse id="Ellipse 12" cx="20.2741" cy="21.4003" rx="20.2741" ry="21.4003"
                            transform="matrix(0.999988 -0.00492757 0.00396583 0.999992 0 0.199768)" fill="#F7567C" />
                        <g id="&#240;&#159;&#166;&#134; icon &#34;chevron right&#34;">
                            <path id="Vector"
                                d="M18.6747 10.3827L14.6528 14.6639L21.4095 21.729L14.7063 28.8642L18.7603 33.1033L29.4855 21.6869L18.6747 10.3827Z"
                                fill="white" />
                        </g>
                    </g>
                </svg>
                <p>Voir nos ptits potes</p>

            </button>

            <button>
                <svg width="41" height="43" viewBox="0 0 41 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="Group 8">
                        <ellipse id="Ellipse 12" cx="20.2741" cy="21.4003" rx="20.2741" ry="21.4003"
                            transform="matrix(0.999988 -0.00492757 0.00396583 0.999992 0 0.199768)" fill="white" />
                        <g id="&#240;&#159;&#166;&#134; icon &#34;chevron right&#34;">
                            <path id="Vector"
                                d="M18.6747 10.3827L14.6528 14.6639L21.4095 21.729L14.7063 28.8642L18.7603 33.1033L29.4855 21.6869L18.6747 10.3827Z"
                                fill="#F7567C" />
                        </g>
                    </g>
                </svg>
                <p>Se connecter</p>

            </button>
        </div>
    </div>

    <img src="./assets/fond_home.png" alt="" srcset="">
</section>

<section class="pourquoi_adopter">
    <div class="text_pourquoi">
        <h2>Pourquoi <span>adopter </span> <br>chez nous ?</h2>

        <div class="citation">
            <p class="p_italic">"Nos compagnons parfaits n'ont jamais moins <br>de quatre pieds"</p>
            <p>Sidonie Gabrielle Colette</p>
        </div>

    </div>

    <div class="reasons_container">
        <div>
            <h3>1</h3>
            <p>Vous aidez un animal dans le besoin</p>
        </div>
        <div class="second_reason">
            <h3>2</h3>
            <p>Vous trouvez un compagnons</p>
        </div>
        <div>
            <h3>3</h3>
            <p>Vous lui offrez une belle vie, et lui fait de même</p>
        </div>
    </div>

</section>

<?php
$contenu = ob_get_clean();
$footer = "&copy; SAE 3D01";


require "gabarit.php";