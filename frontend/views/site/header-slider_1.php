<style>
    .acc_slider {
        width: 100%;
        height: 100%;
        background-image: url("image/bg3.png");
        overflow: hidden;
        background-position: center;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;

    }
</style>
<section style="padding-bottom: 10px" >

    
    <div class="carousel slide" id="carousel-example-generic"data-ride="carousel" data-interval="3000" wrap="true">
            
             <ol class="carousel-indicators">
                 <li class="active" data-slide-to="0" data-target="#carousel-example-generic"></li>
                 <li data-slide-to="1" data-target="#carousel-example-generic"></li>
                 <li data-slide-to="2" data-target="#carousel-example-generic"></li>
             </ol>
        
        <!-- Wrapper for Slide -->
        <center>
            <div class="carousel-inner acc_slider" style="height:305px;">
                <div class="item active center">
                    <img src="logo/pkm1.jpg" alt="Slide 1" style="height:300px; margin:3px;">
                    <div class="carousel-caption">
                        <h4>PKM</h4>
                        <p>Kembangkan Kreatifias anda !</p>
                    </div>
                </div>
                <div class="item center">
                    <img src="logo/pkm2.png" alt="Slide 2" style="height:300px; margin:3px;">
                    <div class="carousel-caption">
                        <h4>Apa itu PKM</h4>
                        <p>PKM merupakan sarana untuk mengembangkan<br>
                            kreatifitas Mahasiswa-Mahasiswi indonesia</p>
                    </div>
                </div>
                <div class="item center">
                    <img src="logo/pkm4.jpg" alt="Slide 3" style="height:300px; margin:3px;">
                    <div class="carousel-caption">
                        <h4>Pemenang PKM 2016</h4>
                        <p>Para Mahasiswa-Mahasiswa Universitas Esa Unggul<br>
                            ini mendapatkan juara di 5 bidang kategori</p>
                    </div>
                </div>
            </div>
        </center>

        <!-- Control -->
        <a href="#carousel-example-generic" class="carousel-control left" data-slide="prev" role="button">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="#carousel-example-generic" class="carousel-control right" data-slide="next" role="button">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</section>