<x-layout title="Admin">
    <h1>Kezelői felület</h1>
    <div class="admin-box">
        <div class="admin-menu">
            <a href="">Diákok</a>
            <a href="">Hiányzások</a>
            <a href="">Jegyek</a>
            <a href="/register">Diák felvétele</a>
            <a href="/feeds/create">Új hir létrehozása</a>
        </div>
        <div class="admin-content">
            {{$slot}}
        </div>
    </div>
</x-layout>