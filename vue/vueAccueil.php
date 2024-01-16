<?php

$title = TITREONGLET;
$header = "SPA";

$titre = "";

ob_start();
?>
<section class="home">
    <div class="hero">
        <img sizes="(max-width: 1400px) 100vw, 1400px" srcset="
                ./assets/fond_home/fond_home_x42khs_c_scale,w_200.png 200w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_464.png 464w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_627.png 627w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_783.png 783w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_923.png 923w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_999.png 999w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_1107.png 1107w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_1201.png 1201w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_1288.png 1288w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_1349.png 1349w,
                ./assets/fond_home/fond_home_x42khs_c_scale,w_1400.png 1400w" src="fond_home_x42khs_c_scale,w_1400.png"
            alt="fond d'écran home">
        <h1>Adoptez sans compter</h1>

        <span>Ici nous mettons tout les animaux à l’honneur, qu’ils souffrent de handicap ou non.</span>

        <div class="button_container">
            <?php
            if (!isset($_SESSION['USER'])) {
                echo ('
            <a href="index.php?action=animaux">
                <button class="home_button">
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
            <button class="home_button">
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
            } else {

                echo ('
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
            }
            ?>
        </div>
    </div>


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
            <h3 class="h3_pink">1</h3>
            <p>Vous aidez un animal dans le besoin</p>
        </div>
        <div class="second_reason">
            <h3>2</h3>
            <p>Vous trouvez un compagnons</p>
        </div>
        <div>
            <h3 class="h3_pink">3</h3>
            <p>Vous lui offrez une belle vie, et lui fait de même</p>
        </div>
    </div>

</section>

<section class="about_section">
    <div class="left">
        <img sizes="(max-width: 403px) 100vw, 403px" srcset="
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_200.png 200w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_231.png 231w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_258.png 258w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_288.png 288w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_312.png 312w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_338.png 338w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_362.png 362w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_384.png 384w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_399.png 399w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_403.png 403w"
            src="about_manoir_fx8rxw_c_scale,w_403.png" alt="image du manoir de la sp-hess">
    </div>

    <div class="right">
        <h2>Notre association, une <span>vocation</span></h2>

        <p>Nous existons depuis 2023, 3 personnes unis pour le bien être des animaux du refuge. </p>

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
                    <p>Chuck Norris /</p>
                    <p class="p_italic">Le GOAT</p>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="bg_animaux_section">
    <section class="animaux_section">
        <h3>Quelques un de nos pensionnaires</h3>
        <div class="animaux_container">
            <?php
            foreach ($animals as $animal) {
                ?>
                <div class="card">
                    <span class="name">
                        <?= $animal['nom'] ?>
                    </span>
                    <p class="age">
                        <?= $animal['age'] ?> ans
                    </p>
                    <img src="photoAnimal/<?= $animal['nomImg'] ?>" alt="">
                </div>
                <?php
            }
            ?>
        </div>
        <button>
            <a href="index.php?action=animaux">Voir plus d'animaux</a>
        </button>
    </section>
</div>

<section class="blogs_section">
    <h3>Blogs de notre refuge</h3>

    <div class="blogs_container">
        <div class="blog_left">
            <img sizes="(max-width: 403px) 100vw, 403px" srcset="
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_200.png 200w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_231.png 231w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_258.png 258w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_288.png 288w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_312.png 312w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_338.png 338w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_362.png 362w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_384.png 384w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_399.png 399w,
            ./assets/about_manoir/about_manoir_fx8rxw_c_scale,w_403.png 403w"
                src="about_manoir_fx8rxw_c_scale,w_403.png" alt="image du manoir de la sp-hess">
            <div class="text">
                <span>Blogs de la SP-Hess</span>
                <p>Ici vous trouverez l'ensemble de nos blogs </p>
            </div>
        </div>
        <div class="blog_right">
            <?php
            foreach ($blogs as $blog) {
                ?>
                <div class="blogs">
                    <img src="./photoBlog/<?= $blog['image'] ?>" alt="" srcset="">
                    <div class="text">
                        <span>
                            <?= $blog['titre'] ?>
                        </span>
                        <p>
                            <?= $blog['sousTitre'] ?>
                        </p>
                        <a href="index.php?action=blog&&idBlog=<?= $blog['id_blog'] ?>">
                            <button>
                                <svg width="30" height="30" viewBox="0 0 41 43" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                Voir le blog
                            </button>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    </div>

    <a href="index.php?action=blogs">
        <button>Voir plus de Blogs</button>
    </a>
</section>

<?php
$contenu = ob_get_clean();
$footer = "SPA";


require "gabarit.php";