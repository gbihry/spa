<?php

$title = TITREONGLET;
$header = "Sp-Hess";
$titre = "";

ob_start();
?>
<section class="home">
    <div class="hero">
        <h1>Adoptez sans compter</h1>

        <span>Adoptez chez nous par pitié ou je m'énerver de zinzin aller bouboubinks en sah de sah</span>

        <div class="button_container">
        <?php
            echo('
            <a href="index.php?action=animaux">
                <button>
                    <svg width="41" height="43" viewBox="0 0 41 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g id="Group 8">
                            <ellipse id="Ellipse 12" cx="20.2741" cy="21.4003" rx="20.2741" ry="21.4003"
                                transform="matrix(0.999988 -0.00492757 0.00396583 0.999992 0 0.199768)"
                                fill="#F7567C" />
                            <g id="&#240;&#159;&#166;&#134; icon &#34;chevron right&#34;">
                                <path id="Vector"
                                    d="M18.6747 10.3827L14.6528 14.6639L21.4095 21.729L14.7063 28.8642L18.7603 33.1033L29.4855 21.6869L18.6747 10.3827Z"
                                    fill="white" />
                            </g>
                        </g>
                    </svg>
                    <p>Voir nos petits potes</p>
                </button>
            </a>');

            
            echo ('
            <a href="index.php?action=login">
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
            <a/>');
            ?>
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

<section class="about_section">
    <div class="left">
        <img src="./assets/about_manoir.png" alt="" srcset="">
    </div>

    <div class="right">
        <h2>Notre association, une <span>vocation</span></h2>

        <p>Nous existons depuis 2023, 3 personnes unis pour le bien être animak </p>

        <div class="achievements">
            <div>
                <h3>
                    100 +
                </h3>
                <p>Animaux sauvés</p>
            </div>
            <div>
                <h3>
                    3
                </h3>
                <p>Refuges à travers l'Alsace</p>
            </div>
            <div>
                <h3>
                    990 +
                </h3>
                <p>Adoptions par ans</p>
            </div>
        </div>

        <div class="citation">
            <span>"Un refuge de fou furieux sérieux"</span>
            <div class="chuck_norris">
                <div class="profil_picture">
                    <img src="./assets/chuck_norris.svg" alt="" srcset="">
                </div>
                <div class="chuck_profil">
                    <p>Chuck Norris</p>
                    <p class="p_italic">Le GOAT</p>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="animaux_section">
    <h3>Quelques un de nos pensionnaires</h3>
    <p>Voici les derniers arrivant du refuges</p>

    <div class="animaux_container">
        <div class="animaux">
            <div class="animaux_description">
                <span class="name">Stefano</span>
                <p class="age">12 ans</p>
            </div>
        </div>
        <div class="animaux">
            <div class="animaux_description">
                <span class="name">Chuck Borris</span>
                <p class="age">230 ans</p>
            </div>
        </div>
        <div class="animaux">
            <div class="animaux_description">
                <span class="name">Alfredo</span>
                <p class="age">40 ans</p>
            </div>
        </div>
    </div>

    <button>
        Voir plus d'animaux
    </button>
</section>

<section class="blogs_section">
    <h3>Blogs de notre refuge</h3>

    <div class="blogs_container">

        <div class="blog_left">
            <div class="text">
                <span>La création de la Sp-Hess</span>
                <p>Nous retraçons l'histoire de notre association à travers ce blog</p>
            </div>
        </div>

        <div class="blog_right">
            <div class="blogs">
                <img src="./assets/blogs/blog1.png" alt="" srcset="">
                <div class="text">
                    <span>La création de la Sp-hess</span>
                    <p>Nous retraçons l'histoire de notre association à travers ce blog</p>
                    <button>
                        <svg width="30" height="30" viewBox="0 0 41 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Group 8">
                                <ellipse id="Ellipse 12" cx="20.2741" cy="21.4003" rx="20.2741" ry="21.4003"
                                    transform="matrix(0.999988 -0.00492757 0.00396583 0.999992 0 0.199768)"
                                    fill="#F7567C" />
                                <g id="&#240;&#159;&#166;&#134; icon &#34;chevron right&#34;">
                                    <path id="Vector"
                                        d="M18.6747 10.3827L14.6528 14.6639L21.4095 21.729L14.7063 28.8642L18.7603 33.1033L29.4855 21.6869L18.6747 10.3827Z"
                                        fill="white" />
                                </g>
                            </g>
                        </svg>
                        Voir plus
                    </button>
                </div>
            </div>
            <div class="blogs">
                <img src="./assets/blogs/blog2.png" alt="" srcset="">
                <div class="text">
                    <span>La création de la Sp-hess</span>
                    <p>Nous retraçons l'histoire de notre association à travers ce blog</p>
                    <button>
                        <svg width="30" height="30" viewBox="0 0 41 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Group 8">
                                <ellipse id="Ellipse 12" cx="20.2741" cy="21.4003" rx="20.2741" ry="21.4003"
                                    transform="matrix(0.999988 -0.00492757 0.00396583 0.999992 0 0.199768)"
                                    fill="#F7567C" />
                                <g id="&#240;&#159;&#166;&#134; icon &#34;chevron right&#34;">
                                    <path id="Vector"
                                        d="M18.6747 10.3827L14.6528 14.6639L21.4095 21.729L14.7063 28.8642L18.7603 33.1033L29.4855 21.6869L18.6747 10.3827Z"
                                        fill="white" />
                                </g>
                            </g>
                        </svg>
                        Voir plus
                    </button>
                </div>
            </div>
            <div class="blogs">
                <img src="./assets/blogs/blog3.png" alt="" srcset="">
                <div class="text">
                    <span>La création de la Sp-hess</span>
                    <p>Nous retraçons l'histoire de notre association à travers ce blog</p>
                    <button>
                        <svg width="30" height="30" viewBox="0 0 41 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Group 8">
                                <ellipse id="Ellipse 12" cx="20.2741" cy="21.4003" rx="20.2741" ry="21.4003"
                                    transform="matrix(0.999988 -0.00492757 0.00396583 0.999992 0 0.199768)"
                                    fill="#F7567C" />
                                <g id="&#240;&#159;&#166;&#134; icon &#34;chevron right&#34;">
                                    <path id="Vector"
                                        d="M18.6747 10.3827L14.6528 14.6639L21.4095 21.729L14.7063 28.8642L18.7603 33.1033L29.4855 21.6869L18.6747 10.3827Z"
                                        fill="white" />
                                </g>
                            </g>
                        </svg>
                        Voir plus
                    </button>
                </div>
            </div>
        </div>

    </div>

    <button>Voir plus de Blogs</button>

</section>

<?php
$contenu = ob_get_clean();
$footer = "Sp-Hess";


require "gabarit.php";