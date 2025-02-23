
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nala Virtual Center</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
        }

        header {
            background-color: #003d6b;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header img {
            height: 100px;
            border-radius: 50%;
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .hero {
            text-align: center;
            background-color: #eaf3ff;
            padding: 40px 20px;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #003d6b;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
        }

        .search-bar input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 200px;
        }

        .search-bar button {
            background-color: #003d6b;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #00538d;
        }

        .tenants {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .tenant-card {
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .tenant-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .tenant-card h3 {
            font-size: 18px;
            color: #003d6b;
            margin: 10px 0;
        }

        .tenant-card p {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <header>
        <img src="{{ asset('./images/logo/logo.png')}}" alt="Nala Virtual Center Logo">
        </div>
            <a href="/">Accueil</a>
            <a href="/about">À Propos</a>
            <a href="/contact">Nous Contacter</a>
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth
                        <a href="{{ url('admin.users') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                            Log in
                        </a>            
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
    </header>

    <div class="hero">
        <h1>Welcome to Nala Virtual Center</h1>
        <div class="search-bar">
            <input type="text" placeholder="Catégories">
            <input type="text" placeholder="Nom du box, numéro ou produit">
            <button>Rechercher</button>
        </div>
    </div>

    <section class="tenants">
        <div class="tenant-card">
            <img src="/path/to/tenant1.jpg" alt="Tenant 1">
            <h3>Entreprise 1</h3>
            <p>Description de l'entreprise.</p>
        </div>
        <div class="tenant-card">
            <img src="/path/to/tenant1.jpg" alt="Tenant 2">
            <h3>Entreprise 2</h3>
            <p>Description de l'entreprise.</p>
        </div>
        <div class="tenant-card">
            <img src="/path/to/tenant1.jpg" alt="Tenant 3">
            <h3>Entreprise 3</h3>
            <p>Description de l'entreprise.</p>
        </div>
        <div class="tenant-card">
            <img src="/path/to/tenant2.jpg" alt="Tenant 4">
            <h3>Entreprise 4</h3>
            <p>Description de l'entreprise.</p>
        </div>
        <div class="tenant-card">
            <img src="/path/to/tenant3.jpg" alt="Tenant 5">
            <h3>Entreprise 5</h3>
            <p>Description de l'entreprise.</p>
        </div>
    </section>
</body>
</html>
