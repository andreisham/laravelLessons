

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('welcome')}}">На главную</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('news.index')}}">Новости</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Контакты</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
