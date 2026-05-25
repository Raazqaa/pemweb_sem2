<?php // header.php - 12 grid, carousel bootstrap 
?> <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators"> <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active"></button> <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1"></button> <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2"></button> </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="carousel-bg carousel-bg-1 d-flex align-items-center justify-content-center">
                <div class="carousel-caption-custom text-center">
                    <h1 class="display-3 fw-bold text-white">Selamat Datang</h1>
                    <p class="lead text-white-50">Personal Homepage - <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Tamu'; ?></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-bg carousel-bg-2 d-flex align-items-center justify-content-center">
                <div class="carousel-caption-custom text-center">
                    <h1 class="display-3 fw-bold text-white">Portofolio Saya</h1>
                    <p class="lead text-white-50">Web Developer & Designer</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="carousel-bg carousel-bg-3 d-flex align-items-center justify-content-center">
                <div class="carousel-caption-custom text-center">
                    <h1 class="display-3 fw-bold text-white">My Studies</h1>
                    <p class="lead text-white-50">Perjalanan Akademik Saya</p>
                </div>
            </div>
        </div>
    </div> <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev"> <span class="carousel-control-prev-icon"></span> </button> <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next"> <span class="carousel-control-next-icon"></span> </button>
</div>