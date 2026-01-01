<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية</title>

    @vite(['resources/css/dashboard.css'])
</head>
<body>

<header class="navbar">
    <div class="logo">ملخصاتي 📚</div>

    <div class="menu-toggle" id="mobile-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>

    <nav class="nav-container">
        <ul class="nav-menu">
            <li><a href="{{ route('dashboard') }}">🏠 الرئيسية</a></li>
            
            @auth
                <li><a href="{{ route('summaries.index') }}">📚 عرض ملخصاتي</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button class="logout-btn" type="submit">تسجيل خروج</button>
                    </form>
                </li>
            @endauth

            @guest
                <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                <li><a href="{{ route('register') }}" class="register-btn">إنشاء حساب</a></li>
            @endguest
        </ul>
    </nav>
</header>

<section class="hero">
    <h1>إدارة ملخصاتك بسهولة</h1>
    <p>أنشئ، عدّل، واحتفظ بملخصاتك في مكان واحد</p>
    <a href="{{ route('summaries.create') }}" class="main-btn">إضافة ملخص</a>
</section>

<section class="cards">
    <div class="card">
        <div class="icon">📝</div>
        <h3>إنشاء ملخصات</h3>
        <p>أنشئ ملخصاتك الدراسية أو العملية بسهولة واحفظها في مكان واحد.</p>
    </div>
    <div class="card">
        <div class="icon">📂</div>
        <h3>تنظيم ذكي</h3>
        <p>رتّب ملخصاتك حسب المادة أو التاريخ للوصول السريع.</p>
    </div>
    <div class="card">
        <div class="icon">✏️</div>
        <h3>تعديل في أي وقت</h3>
        <p>عدّل على ملخصاتك أو حدّثها متى ما احتجت.</p>
    </div>
    <div class="card">
        <div class="icon">🔒</div>
        <h3>حفظ آمن</h3>
        <p>جميع ملخصاتك محفوظة في حسابك وبخصوصية تامة.</p>
    </div>
</section>

<footer>
    <div class="footer-container">
        <div class="copyright">
            جميع الحقوق محفوظة © {{ date('Y') }} منصة ملخصاتي
        </div>
    </div>
</footer>

<script>
    // كود تشغيل القائمة المنسدلة
    const menu = document.querySelector('#mobile-menu');
    const menuLinks = document.querySelector('.nav-menu');

    menu.addEventListener('click', function() {
        menu.classList.toggle('is-active');
        menuLinks.classList.toggle('active');
    });
</script>

</body>
</html>