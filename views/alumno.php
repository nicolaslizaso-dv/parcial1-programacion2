<?php
$nombre = "Nicolás Valentín Lizaso";
$edad = 26; 
$email = "nicolas.lizaso@davinci.edu.ar";

$redes = [
    "LinkedIn" => "https://www.linkedin.com/in/nicolas-lizaso-1b6a58148",
    "GitHub"   => "https://github.com/nicolizaso",
    "Instagram" => "https://www.instagram.com/n1colizaso"
];
?>

<div class="container py-5 fade-in-up">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="profile-card d-flex align-items-center bg-white border p-4">
                <div class="profile-image-container me-5">
                    <img src="img/assets/yo.jpg" alt="Foto de <?= $nombre; ?>" style="width: 250px;" class="img-fluid border shadow-sm">
                </div>

                <div class="profile-info">
                    <p class="category-badge mb-1">Desarrollador</p>
                    <h2 class="h3 fw-light text-uppercase mb-3" style="letter-spacing: 1px;"><?= $nombre; ?></h2>
                    
                    <ul class="list-unstyled text-muted mb-4">
                        <li class="mb-2"><strong>Edad:</strong> <?= $edad; ?> años</li>
                        <li class="mb-2"><strong>Email:</strong> <a href="mailto:<?= $email; ?>" class="text-decoration-none text-primary"><?= $email; ?></a></li>
                    </ul>

                    <div class="social-links">
                        <p class="small text-uppercase fw-bold text-muted mb-2" style="letter-spacing: 1px;">Conexiones</p>
                        <?php foreach ($redes as $red => $url): ?>
                            <a href="<?= $url; ?>" target="_blank" class="btn-detail me-3"><?= $red; ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>