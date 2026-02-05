<footer>
    <div class="footer-content">
        <h4>Kontakt</h4>
        <p><strong>Adresse:</strong></p>
        <p>Starup skolevej 33A</p>
        <p>6100 Haderslev</p>
        <p style="margin-top: 10px;"><strong>Email:</strong> kontakt@warhammer.dk</p>
        <p><strong>Telefon:</strong> +45 12 34 56 78</p>
    </div>

    <div class="footer-content footer-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('img/warhammerLogo.png') }}" 
            alt="Warhammer logo"
            class="logo">
        </a>
        <p style="margin-top: 15px; font-size: 14px;">© {{ date('Y') }} Warhammer Events</p>
        <p style="font-size: 12px; opacity: 0.8;">Organisering af events og turneringer</p>
    </div>

    <div class="footer-content">
        <h4>Åbningstider</h4>
        <p style="font-size: 14px;">Man-Fre: 16:00 - 22:00</p>
        <p style="font-size: 14px;">Lør-Søn: 10:00 - 18:00</p>
    </div>
</footer>