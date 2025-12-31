<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الصفحة الرئيسية</title>

    @vite(entrypoints: ['resources/css/dashboard.css'])
    

 
</head>
<body>

<!-- ===== Navbar ===== -->
<header class="navbar">
    
    <div class="nav-right">
        <a href="{{ route('dashboard') }}">🏠الرئيسية</a>
        @auth
            <a href="{{ route('summaries.index') }}">📚عرض ملخصاتي</a>
        @endauth
    </div>

    <div class="nav-left">
        @guest
            <a href="{{ route('login') }}">تسجيل الدخول</a>
            <a href="{{ route('register') }}">إنشاء حساب</a>
        @endguest

        @auth
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button class="logout" type="submit">تسجيل خروج</button>
            </form>
        @endauth
    </div>

</header>

<!-- ===== Hero Section ===== -->
<section class="hero">
    <h1>إدارة ملخصاتك بسهولة</h1>
    <p>أنشئ، عدّل، واحتفظ بملخصاتك في مكان واحد</p>

    <a href="{{ route('summaries.create') }}" class="main-btn">
        إضافة ملخص
    </a>
</section>

<!-- ===== Cards Section ===== -->
<section class="cards">
    <div class="card">
        <div class="icon">📝</div>
        <h3>إنشاء ملخصات</h3>
        <p>
            أنشئ ملخصاتك الدراسية أو العملية بسهولة
            واحفظها في مكان واحد.
        </p>
    </div>

    <div class="card">
        <div class="icon">📂</div>
        <h3>تنظيم ذكي</h3>
        <p>
            رتّب ملخصاتك حسب المادة أو التاريخ
            للوصول السريع.
        </p>
    </div>

    <div class="card">
        <div class="icon">✏️</div>
        <h3>تعديل في أي وقت</h3>
        <p>
            عدّل على ملخصاتك أو حدّثها
            متى ما احتجت.
        </p>
    </div>

    <div class="card">
        <div class="icon">🔒</div>
        <h3>حفظ آمن</h3>
        <p>
            جميع ملخصاتك محفوظة في حسابك
            وبخصوصية تامة.
        </p>
    </div>
</section>


<footer>
    <div class="footer-container">
        <div class="copyright">
            جميع الحقوق محفوظة © {{ date('Y') }} منصة ملخصاتي
        </div>
        
        <div class="footer-links">
            <a href="#">سياسة الخصوصية</a>
            <a href="#">الشروط والأحكام</a>
            <a href="#">تواصل معنا</a>
        </div>
    </div>
</footer>
</body>
</html>
