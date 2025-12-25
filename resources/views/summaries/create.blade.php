<x-app-layout>
    
    <div class="form-container">

        <h2 class="form-title">
            إضافة ملخص جديد 📝
        </h2>

        {{-- رسالة النجاح --}}
        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- قائمة الأخطاء --}}
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('summaries.store') }}" class="summary-form">
            @csrf

            {{-- حقل العنوان --}}
            <div class="form-group">
                <label for="title" class="form-label">عنوان الملخص</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-input"
                    placeholder="مثال: ملخص مادة التاريخ - الفصل الأول"
                    value="{{ old('title') }}"
                    required
                    autofocus
                >
            </div>

            {{-- حقل المحتوى --}}
            <div class="form-group">
                <label for="content" class="form-label">المحتوى</label>
                <textarea
                    id="content"
                    name="summaries_content"
                    class="form-textarea"
                    rows="8"
                    placeholder="اكتب تفاصيل الملخص هنا..."
                    required
                >{{ old('summaries_content') }}</textarea>
            </div>

            {{-- زر الحفظ --}}
            <div class="form-footer">
                <button type="submit" class="btn-submit">
                    حفظ الملخص
                </button>
                
                {{-- زر إلغاء (اختياري للعودة) --}}
                <a href="{{ route('summaries.index') }}" class="btn-cancel">
                    إلغاء
                </a>
            </div>

        </form>

    </div>

</x-app-layout>