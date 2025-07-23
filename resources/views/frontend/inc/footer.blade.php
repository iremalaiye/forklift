<footer class="site-footer border-top">
    <div class="container">
        <div class="row">



            <!-- Menu -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Menü</h3>

                <ul class="list-unstyled">
                    <li class="active"><a href="{{route('anasayfa')}}">Anasayfa</a></li>
                    <li><a href="{{route('hakkimizda')}}">Hakkımızda</a></li>
                    <li><a href="{{route('urunler')}}">Hizmetlerimiz</a></li>
                    <li><a href="{{route('iletisim')}}">İletişim</a></li>
                </ul>
            </div>

            <!-- Contact-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <div class="block-5 mb-5">
                <h3 class="footer-heading mb-4">İletişim</h3>
                <ul class="list-unstyled">
                    <li class="address"> {{$settings['adres']}}</li>
                    <li class="phone"><a href="tel://23923929210">{{$settings['phone']}}</a></li>
                    <li class="phone"><a href="tel://23923929210">{{$settings['phone2']}} </a></li>
                    <li class="email">{{$settings['email']}}</li>
                </ul>
                    </div>
            </div>
            <!-- Google Maps -->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h3 class="footer-heading mb-4">Konum</h3>
                <iframe
                    class="embed-responsive-item"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48987.880850056825!2d29.950103508509627!3d39.42394499272082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x409da4a7d804fbf9%3A0x5633dd1f4c10f1c3!2zS8O8dGFoeWE!5e0!3m2!1str!2str!4v1624905641234!5m2!1str!2str"
                    width="100%"
                    height="150"
                    style="border:0; border-radius: 15px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>



        <!-- Footer -->
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>

                    Copyright &copy;{{date ('d.m.y')}} Tüm Haklar Saklıdır

                </p>
            </div>
        </div>

    </div>
</footer>

