<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick and Morty</title>

    <!-- Linka o bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Define favicon -->
    <link rel="shortcut icon" type="image/jpg" href="/images/favicon.ico" />

    <link rel="stylesheet" href="/css/global.css">
</head>

<body>
    <nav class="navbar-expand-lg nav-custom-border nav-custom-color mb-2">
        <ul class="nav justify-content-end">
            <img class="mt-2" src="/images/logo.png" alt="" style="max-height: 50px; margin-right: 500px">
            <li class="nav-item nav-item-custom-bg">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item nav-item-custom-bg">
                <a class="nav-link" href="/characters">Personagens</a>
            </li>
            <li class="nav-item nav-item-custom-bg">
                <a class="nav-link" href="/about">Sobre</a>
            </li>
            @if($user)
            <li class="nav-item nav-item-custom-bg me-5">
                <a class="nav-link" href="/logout">Sair</a>
            </li>
            @endif
            @if(!$user)
            <li class="nav-item nav-item-custom-bg me-5">
                <a class="nav-link" href="/login">Entrar</a>
            </li>
            @endif
        </ul>
    </nav>
    @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3 me-5 ms-5" role="alert">
            <p>{{ session('error')}}</p>
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3 me-5 ms-5" role="alert">
            <p>{{ session('success')}}</p>
            <button class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif
    <div class="container-fluid bg-white text-dark w-auto me-5 ms-5 mt-3">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= $character->imagem ?>" alt="" class="mt-4 ms-lg-4 rounded-circle img-fluid">
            </div>
            <div class="col-md-8 mt-4">
                <form action="{{ route('character.update', $character->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-2">
                        <div class="col-md-6 mb-2">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control input-bg-color" name="nome" value="<?= $character->nome ?>" id="nome" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control input-bg-color" name="status" value="<?= $character->status ?>" id="status" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6 mb-2">
                            <label for="especie" class="form-label">Espécie</label>
                            <input type="text" class="form-control input-bg-color" name="especie" value="<?= $character->especie ?>" id="especie" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="genero" class="form-label">Gênero</label>
                            <input type="text" class="form-control input-bg-color" name="genero" value="<?= $character->genero ?>" id="genero" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mb-2">
                            <label for="localizacao" class="form-label">Localização</label>
                            <input type="text" class="form-control input-bg-color" name="localizacao" value="<?= $character->localizacao ?>" id="localizacao" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mb-2">
                            <label for="episodio" class="form-label">Primeira Aparição</label>
                            <input type="text" class="form-control input-bg-color" name="episodio" value="<?= $character->episodio ?>" id="episodio" required>
                        </div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col d-flex justify-content-end">
                            <a href="/character-db/<?= $character->id ?>" class="btn btn-danger me-3" style="width: 100px;">Cancelar</a>
                            <button type="submit" class="btn btn-success" style="width: 150px;">Salvar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</body>

</html>