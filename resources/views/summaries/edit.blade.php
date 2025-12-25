<x-app-layout>

    <div class="form-container">

        <h2 class="form-title">
            تعديل الملخص ✏️
        </h2>

        {{-- عرض الأخطاء إن وجدت --}}
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('summaries.update', $summary->id) }}" class="summary-form">
            @csrf
            @method('PUT') {{-- ضروري جداً لتعديل البيانات --}}

            {{-- حقل العنوان --}}
            <div class="form-group">
                <label for="title" class="form-label">العنوان</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-input"
                    {{-- دالة old تضمن بقاء النص القديم في حال وجود خطأ، والقيمة الثانية هي القيمة المخزنة في الداتا --}}
                    value="{{ old('title', $summary->title) }}"
                    required
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
                    required
                >{{ old('summaries_content', $summary->summaries_content) }}</textarea>
            </div>

            {{-- الأزرار --}}
            <div class="form-footer">
                <button type="submit" class="btn-submit">
                    حفظ التعديلات
                </button>

                <a href="{{ route('summaries.index') }}" class="btn-cancel">
                    إلغاء
                </a>
            </div>

        </form>

    </div>

</x-app-layout>