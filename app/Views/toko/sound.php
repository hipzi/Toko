<?= $this->extend('layout/toko'); ?>

<?= $this->section('content'); ?>

    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title">Sound</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    
    <div class="portfolio-grid-area bg__white pt--1 pb--100">
        <div class="container">
            <div class="portfolio-menu-active gutter-btn mb--50 text-center">
                <button class="active" data-filter="*">All</button>
                <button data-filter=".cat2">Mental Health</button>
                <button data-filter=".cat3">Motivate</button>
            </div>
            <div class="portfolio-style">
                <div class="row grid">
                    <audio controls>
                        <source src="audio/preview.mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <audio controls>
                        <source src="audio/0106. Calming - AShamaluevMusic.mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <audio controls>
                        <source src="audio/2019-04-20_-_Quiet_Time_-_David_Fesliyan.mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <audio controls>
                        <source src="audio/2019-07-26_-_Healing_Water_FesliyanStudios.com_-_David_Renda.mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <audio controls>
                        <source src="audio/2020-02-22_-_Relaxing_Green_Nature_-_David_Fesliyan.mp3">
                        Your browser does not support the audio element.
                    </audio>
                    <audio controls>
                        <source src="audio/2020-09-14_-_Tropical_Keys_-_www.FesliyanStudios.com_David_Renda.mp3">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection('content'); ?>