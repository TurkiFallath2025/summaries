<!DOCTYPE html>
<html lang="ar" dir="rtl"> <head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>تسجيل الدخول</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    * { box-sizing: border-box; font-family: 'Inter', sans-serif; margin: 0; padding: 0; }
    
    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center; 
        background: #222831;
        padding: 20px; /* مسافة أمان عند تصغير الشاشة */
    }

    .container {
        width: 100%;
        max-width: 420px; /* العرض الأقصى 420 لكن يمكنه أن يصغر */
        background: #393E46;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 50px rgba(0,0,0,0.7);
    }

    .slide-container {
        display: flex;
        width: 200%;
        /* ملاحظة: التبديل في الـ RTL يحتاج تغيير القيمة من سالب إلى موجب */
        transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .form-box {
        width: 50%;
        padding: 40px 30px; /* تقليل البادينج قليلاً ليناسب الشاشات الصغيرة */
    }

    h2 {
        text-align: center;
        color: #00ADB5;
        margin-bottom: 10px;
        font-weight: 700;
        font-size: clamp(20px, 5vw, 24px); /* خط مرن */
    }

    p {
        text-align: center;
        color: #EEEEEE;
        margin-bottom: 25px;
        font-size: 14px;
    }

    input {
        width: 100%;
        padding: 14px;
        margin-bottom: 15px;
        border-radius: 12px;
        border: 1px solid #444e5a; /* لون حدود أهدأ */
        background: #222831;
        color: #EEEEEE;
        outline: none;
        font-size: 16px; /* 16px تمنع متصفح Safari من عمل زووم تلقائي عند الكتابة */
        transition: border-color 0.3s;
    }

    input:focus {
        border-color: #00ADB5;
    }

    button {
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 12px;
        background: #00ADB5;
        color: #222831;
        font-weight: 700;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s opacity;
    }

    button:active {
        transform: scale(0.98);
    }

    .toggle {
        text-align: center;
        margin-top: 20px;
        color: #EEEEEE;
        font-size: 14px;
    }

    .toggle a {
        color: #00ADB5;
        cursor: pointer;
        text-decoration: none;
        font-weight: 600;
    }

    .error {
        background: #ff4d4d;
        color: white;
        padding: 12px;
        border-radius: 10px;
        margin: 20px 20px 0; /* هوامش داخلية */
        font-size: 13px;
        text-align: center;
    }

    /* تحسينات إضافية للجوالات الصغيرة جداً */
    @media (max-width: 380px) {
        .form-box {
            padding: 30px 20px;
        }
        h2 {
            font-size: 18px;
        }
    }
</style>
</head>
<body>

<div class="container">

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="slide-container" id="slideBox">

        <div class="form-box">
            <h2>تسجيل الدخول</h2>
            <p>مرحباً بك مجدداً</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                <input type="password" name="password" placeholder="كلمة المرور" required>
                <button type="submit">دخول</button>
            </form>

            <div class="toggle">
                ليس لديك حساب؟ <a id="showRegister">إنشاء حساب</a>
            </div>
        </div>

        <div class="form-box">
            <h2>إنشاء حساب</h2>
            <p>انضم إلينا الآن</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text" name="name" placeholder="الاسم الكامل" required>
                <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                <input type="password" name="password" placeholder="كلمة المرور" required>
                <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
                <button type="submit">إنشاء الحساب</button>
            </form>

            <div class="toggle">
                لديك حساب بالفعل؟ <a id="showLogin">تسجيل الدخول</a>
            </div>
        </div>

    </div>
</div>

<script>
    const slideBox = document.getElementById("slideBox");
    // قمنا بتعديل الاتجاه ليناسب الـ RTL (العربية)
    document.getElementById("showRegister").onclick = () => {
        slideBox.style.transform = "translateX(50%)"; // في RTL نتحرك لليمين لعرض المحتوى الأيسر
    };
    document.getElementById("showLogin").onclick = () => {
        slideBox.style.transform = "translateX(0%)";
    };
</script>

</body>
</html>