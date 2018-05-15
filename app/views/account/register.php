<h1 class="logo">Регистрация</h1>
<ul class="social-login">
    <li><a href="#" class="fab fa-google"></a></li>
    <li><a href="#" class="fab fa-facebook-f"></a></li>
    <li><a href="#" class="fab fa-instagram"></a></li>
    <li><a href="#" class="fab fa-vk"></a></li>
</ul>
<p>или</p>
<form action="/account/register" method="post">
    <input type="email" name="email" placeholder="Почта">
    <input type="password" name="password" placeholder="Пароль">
    <input type="password" name="re-password" placeholder="Пароль еще раз">
    <label>
        <input type="checkbox" name="guide">
        Я – Гид
    </label>
    <label>
        <input type="checkbox" name="sla">
        Я принимаю лицензионное соглашение
    </label>
    <p><a href="#">Лицензионное соглашение</a></p>
    <button type="submit">Зарегистрироваться</button>
</form>
