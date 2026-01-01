<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ملخصاتي') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<style>
/* === إعدادات عامة === */
* {
    box-sizing: border-box;
    font-family: 'Inter', sans-serif;
}

body {
    background: #222831;
    color: #EEEEEE;
    margin: 0;
    /* جعل الجسم مرن لترتيب العناصر فوق بعض */
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* الصفحة تأخذ كامل ارتفاع الشاشة */
}

/* ===== Navbar (الهيدر) ===== */
header {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    height: 70px;
    background: #393E46;
    padding: 0 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.4);
    z-index: 1000;
}

header h1 {
    color: #00ADB5;
    font-size: 20px;
    margin: 0;
    font-weight: bold;
}

/* زر العودة */
.back {
    text-decoration: none;
    background: #00ADB5;
    color: #222831;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    transition: 0.2s;
}
.back:hover {
    background: #00cfd9;
}

/* ===== المحتوى (Main) ===== */
main {
    padding: 20px;
    margin-top: 80px; /* مسافة عشان الهيدر الثابت ما يغطي المحتوى */
    flex: 1; /* هذا السطر السحري: يجعل المحتوى يتمدد ليدفع الفوتر للأسفل */
    width: 100%;
    max-width: 1200px; /* عرض أقصى للصفحة */
    margin-left: auto;
    margin-right: auto;
}

/* ===== الفوتر (Footer) - الإضافة الجديدة ===== */
footer {
    background: #393E46;
    padding: 20px 30px;
    margin-top: auto; /* تأكيد بقاء الفوتر في الأسفل */
    border-top: 3px solid #00ADB5;
    text-align: center;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between; /* الحقوق يمين والروابط يسار */
    align-items: center;
    flex-wrap: wrap; /* عشان يترتبوا في الجوال */
    gap: 15px;
}

.copyright {
    color: #EEEEEE;
    font-size: 14px;
}

.footer-links a {
    color: #00ADB5;
    text-decoration: none;
    margin-left: 15px;
    font-size: 14px;
    transition: 0.2s;
}
.footer-links a:hover {
    color: #fff;
    text-decoration: underline;
}

/* ===== كارد (Card) ===== */
.card {
    background: #393E46;
    max-width: 700px;
    margin: 20px auto;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.6);
}

/* ===== العناصر التفاعلية (Inputs & Buttons) ===== */
input, textarea {
    width: 100%;
    padding: 14px;
    margin-bottom: 15px;
    border-radius: 12px;
    border: 1px solid #00ADB5;
    background: #222831;
    color: #EEEEEE;
    outline: none;
}
input:focus, textarea:focus { box-shadow: 0 0 8px #00ADB5; }

button.primary {
    width: 100%;
    padding: 14px;
    background: #00ADB5;
    color: #222831;
    border: none;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.2s;
}
button.primary:hover { background: #00cfd9; }

/* =========================================
   📱 إعدادات الجوال (Responsive Media Queries)
   ========================================= */
@media (max-width: 768px) {
    /* تعديل الهيدر في الجوال */
    header {
        padding: 0 15px;
    }
    
    header h1 {
        font-size: 18px;
    }

    .back {
        padding: 6px 12px;
        font-size: 12px;
    }

    /* تعديل المحتوى والبطاقات */
    main {
        padding: 15px;
    }

    .card {
        padding: 20px;
        margin: 10px auto;
    }

    /* تعديل الفوتر ليصبح عمودياً */
    .footer-container {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-links a {
        margin: 0 8px; /* مسافات بين الروابط */
    }
}
</style>

<header>
    <h1>ملخصاتي 📚</h1>
    <a href="/dashboard" class="back">الرئيسية 🏠</a>
</header>

<main>
    {{ $slot }}
</main>

<footer>
    <div class="footer-container">
        <div class="copyright">
            جميع الحقوق محفوظة © {{ date('Y') }} منصة ملخصاتي
        </div>
        
        {{-- <div class="footer-links">
            <a href="#">سياسة الخصوصية</a>
            <a href="#">الشروط والأحكام</a>
            <a href="#">تواصل معنا</a>
        </div> --}}
    </div>
</footer>

</body>
</html>