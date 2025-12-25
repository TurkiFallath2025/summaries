<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>log in</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;font-family:'Inter',sans-serif;margin:0;padding:0}
body{
  min-height:100vh;
  display:flex;
  align-items:center;
  justify-content:center; 
  background:#222831;
}
.container{
  width:420px;
  background:#393E46;
  border-radius:20px;
  overflow:hidden;
  box-shadow:0 20px 50px rgba(0,0,0,0.7);
}
.slide-container{
  display:flex;
  width:200%;
  transition: transform 0.5s ease-in-out;
}
.form-box{
  width:50%;
  padding:50px 30px;
}
h2{
  text-align:center;
  color:#00ADB5;
  margin-bottom:10px;
  font-weight:700;
  font-size:24px;
}
p{
  text-align:center;
  color:#EEEEEE;
  margin-bottom:30px;
  font-size:14px;
}
input{
  width:100%;
  padding:15px;
  margin-bottom:18px;
  border-radius:12px;
  border:1px solid #00ADB5;
  background:#222831;
  color:#EEEEEE;
  outline:none;
  font-size:14px;
}
button{
  width:100%;
  padding:15px;
  border:none;
  border-radius:12px;
  background:#00ADB5;
  color:#222831;
  font-weight:700;
  cursor:pointer;
  font-size:15px;
}
.toggle{
  text-align:center;
  margin-top:18px;
  color:#EEEEEE;
  font-size:13px;
}
.toggle a{
  color:#00ADB5;
  cursor:pointer;
  text-decoration:none;
}
.error{
  background:#ff4d4d;
  color:white;
  padding:10px;
  border-radius:10px;
  margin-bottom:15px;
  font-size:13px;
  text-align:center;
}
</style>
</head>
<body>

<div class="container">

  {{-- عرض الأخطاء --}}
  @if ($errors->any())
    <div class="error">
      {{ $errors->first() }}
    </div>
  @endif

  <div class="slide-container" id="slideBox">

    <!-- Login -->
    <div class="form-box">
      <h2>تسجيل الدخول</h2>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="••••••••" required>
        <button type="submit">دخول</button>
      </form>

      <div class="toggle">
        ليس لديك حساب؟ <a id="showRegister">إنشاء حساب</a>
      </div>
    </div>

    <!-- Register -->
    <div class="form-box">
      <h2>إنشاء حساب</h2>

      <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="الاسم الكامل" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>
        <button type="submit">إنشاء الحساب</button>
      </form>

      <div class="toggle">
        لديك حساب؟ <a id="showLogin">تسجيل الدخول</a>
      </div>
    </div>

  </div>
</div>

<script>
const slideBox = document.getElementById("slideBox");
document.getElementById("showRegister").onclick = () => {
  slideBox.style.transform = "translateX(-50%)";
};
document.getElementById("showLogin").onclick = () => {
  slideBox.style.transform = "translateX(0%)";
};
</script>

</body>
</html>
