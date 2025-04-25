<x-layout title="Admin">
    <h1>Kezelői felület</h1>
    <div class="admin-box">
        <div class="admin-menu">
            <a href="">Diákok</a>
            <a href="">Menü pont</a>
            <a href="">Menü pont</a>
        </div>
        <div class="admin-content">
            {{$slot}}
        </div>
    </div>
</x-layout>