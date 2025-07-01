<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Welkom - Voedselbank Maaskantje</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            overflow: hidden;
        }
        #loginBtn {
            position: absolute;
            transition: top 0.25s ease, left 0.25s ease;
            z-index: 10;
        }
    </style>
</head>
<body class="bg-gray-100 text-black min-h-screen flex flex-col items-center justify-center">

<h1 class="text-3xl font-bold mb-10 text-green-700 underline">
    Welkom bij Voedselbank Maaskantje
</h1>

<a href="{{ route('login') }}" id="loginBtn"
   class="bg-white text-blue-600 border border-gray-300 shadow px-6 py-3 text-lg font-semibold rounded hover:underline">
    Inloggen
</a>

<script>
    const btn = document.getElementById('loginBtn');
    const escapeRadius = 100; // afstand in px waarop knop wegrent

    function getRandomPosition(btn) {
        const padding = 20;
        const windowWidth = window.innerWidth - btn.offsetWidth - padding;
        const windowHeight = window.innerHeight - btn.offsetHeight - padding;
        const newLeft = Math.floor(Math.random() * windowWidth);
        const newTop = Math.floor(Math.random() * windowHeight);
        return { left: newLeft, top: newTop };
    }

    function isMouseNear(mouseX, mouseY, btn) {
        const rect = btn.getBoundingClientRect();
        const btnX = rect.left + rect.width / 2;
        const btnY = rect.top + rect.height / 2;
        const dx = mouseX - btnX;
        const dy = mouseY - btnY;
        return Math.hypot(dx, dy) < escapeRadius;
    }

    // Move button if mouse gets too close
    document.addEventListener('mousemove', (e) => {
        if (isMouseNear(e.clientX, e.clientY, btn)) {
            const { left, top } = getRandomPosition(btn);
            btn.style.left = `${left}px`;
            btn.style.top = `${top}px`;
        }
    });

    // Initial random position
    window.addEventListener('load', () => {
        const { left, top } = getRandomPosition(btn);
        btn.style.left = `${left}px`;
        btn.style.top = `${top}px`;
    });
</script>
</body>
</html>
