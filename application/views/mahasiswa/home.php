    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <img src="" alt="" srcset="" style="height: 50px;">
            <a class="navbar-brand" href="#">Burger King</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Search Movie</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center">
        <div class="row mt-4">
            <div class="col">
                <h1 class="tle">All Menu</h1>
            </div>
        </div>
        <!-- <div class="">
            <div class="form-group mb-2">
                <label for="inputPassword2" class="sr-only">Movie name</label>
                <input type="text" class="form-control" id="search-input" placeholder="Movie Name">
            </div>
            <button type="submit" id="search-button" class="btn btn-primary mb-2 ml-2">Seacrh Movie</button>
        </div>
        <div class="row mt-2" id="Daftar-film"> -->
    </div>

    <div>
        <ul class="list-group">
            <?php foreach ($buku as $bk) { ?>
                <li class="list-group-item">
                    <?= $bk['judul'] ?>
                </li>
            <?php } ?>

        </ul>
    </div>
    </div>