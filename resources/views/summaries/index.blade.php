<x-app-layout>

    <div class="main-content">

        {{-- 🟢 المنطقة العلوية الثابتة: العنوان وزر الإضافة الوحيد --}}
        <div class="page-header">
            <h2 class="page-title">
                عرض ملخصاتي 📚
            </h2>
            
            {{-- هذا هو الزر الوحيد والثابت --}}
            <a href="{{ route('summaries.create') }}" class="btn-add-new">
                <span>+</span>
                <span>إضافة ملخص</span>
            </a>
        </div>

        {{-- رسالة النجاح --}}
        @if(session('success'))
            <div class="alert-box success">
                {{ session('success') }}
            </div>
        @endif

        {{-- المحتوى --}}
        @if($summaries->isEmpty())
            {{-- الحالة الفارغة --}}
            <div class="empty-state-box">
                <div class="empty-icon">📭</div>
                <p class="empty-text">لا يوجد ملخصات حتى الآن</p>
                <p class="empty-subtext">اضغط على زر الإضافة في الأعلى للبدء</p>
            </div>
        @else
            {{-- شبكة البطاقات --}}
            <div class="cards-grid">
                @foreach ($summaries as $summary)
                    <div class="summary-card">
                        
                        <div class="card-body">
                            <h3 class="card-title">
                                {{ $summary->title }}
                            </h3>
                            <p class="card-text">
                                {{ Str::limit($summary->summaries_content, 120) }}
                            </p>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('summaries.edit', $summary->id) }}" class="btn-action edit">
                                تعديل
                            </a>

                            <form action="{{ route('summaries.destroy', $summary->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action delete">
                                    حذف
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

</x-app-layout>