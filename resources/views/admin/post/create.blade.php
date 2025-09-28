@extends('layouts.admin')
@section('title', 'Yeni Yazı Ekle')

@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center">
                        <p class="mb-0 dark:text-white/80 text-xl font-bold">Yeni Blog Yazısı</p>
                    </div>
                </div>

                <div class="flex-auto p-6">
                    @if ($errors->any())
                    <div class="relative flex flex-col min-w-0 break-words bg-red-50 border border-red-300 rounded-lg mb-4">
                        <div class="p-4 text-red-700">
                            <ul class="mb-0 list-disc pl-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="flex flex-wrap -mx-3">
                            <!-- AI Blog Oluşturma Bölümü - EN BAŞTA -->
                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-6 p-4 bg-gradient-to-r from-blue-50 to-purple-50 border border-blue-200 rounded-lg">
                                    <!-- Kullanım Durumu Paneli -->
                                    <div class="flex justify-between items-center mb-4 p-3 bg-white rounded-lg border border-blue-100">
                                        <div>
                                            <h3 class="text-lg font-bold text-slate-700 flex items-center">
                                                <i class="fas fa-magic mr-2 text-purple-600"></i>
                                                Yapay Zeka ile Blog Oluştur
                                            </h3>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-sm font-semibold text-slate-600">Bu Ay Kullanım</div>
                                            <div class="text-2xl font-bold {{ $aiUsageStatus['exceeded'] ? 'text-red-600' : 'text-green-600' }}">
                                                {{ $aiUsageStatus['used'] }} / {{ $aiUsageStatus['limit'] }}
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                {{ $aiUsageStatus['remaining'] }} hak kaldı
                                            </div>
                                        </div>
                                    </div>

                                    @if($aiUsageStatus['exceeded'])
                                        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-center">
                                            <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                            <span class="text-red-700 font-semibold">Aylık limitiniz doldu! Yeni ayı bekleyin.</span>
                                        </div>
                                    @else
                                        <p class="text-sm text-slate-600 mb-4">
                                            <i class="fas fa-lightbulb mr-1"></i>
                                            Aşağıdaki bilgileri girerek tüm blog içeriğini yapay zeka ile otomatik oluşturun.
                                        </p>
                                    @endif

                                    <div class="flex flex-wrap -mx-2">
                                        <div class="w-full max-w-full px-2 shrink-0 md:w-6/12 md:flex-0">
                                            <div class="mb-3">
                                                <label for="ai_domain" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Web Site Adresi</label>
                                                <input type="url" id="ai_domain" value="https://samsunarackiralama.com/" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" placeholder="https://example.com" />
                                            </div>
                                        </div>

                                        <div class="w-full max-w-full px-2 shrink-0 md:w-6/12 md:flex-0">
                                            <div class="mb-3">
                                                <label for="ai_location" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Konum/Şehir</label>
                                                <input type="text" id="ai_location" value="samsun" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" placeholder="İstanbul, Ankara, vb." />
                                            </div>
                                        </div>

                                        <div class="w-full max-w-full px-2 shrink-0">
                                            <div class="mb-3">
                                                <label for="ai_company_name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700">Şirket Adı</label>
                                                <input type="text" id="ai_company_name" value="Aracbu Rent a Car" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" placeholder="Şirket Adı" />
                                            </div>
                                        </div>

                                        <div class="w-full max-w-full px-2 shrink-0">
                                            <div class="text-center mt-4">
                                                @if($aiUsageStatus['exceeded'])
                                                    <button type="button" id="generateWithAI" onclick="generateAI()" disabled
                                                        style="background: linear-gradient(135deg, #9CA3AF 0%, #6B7280 100%); color: white; font-weight: bold; padding: 12px 32px; border-radius: 8px; border: none; cursor: not-allowed; font-size: 14px; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: all 0.2s ease; opacity: 0.6;">
                                                        <i class="fas fa-ban" style="margin-right: 8px;"></i>
                                                        LİMİT DOLDU
                                                    </button>
                                                @else
                                                    <button type="button" id="generateWithAI" onclick="generateAI()"
                                                        style="background: linear-gradient(135deg, #3B82F6 0%, #8B5CF6 100%); color: white; font-weight: bold; padding: 12px 32px; border-radius: 8px; border: none; cursor: pointer; font-size: 14px; text-transform: uppercase; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: all 0.2s ease;"
                                                        onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 15px rgba(0,0,0,0.2)'"
                                                        onmouseout="this.style.transform='translateY(0px)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'">
                                                        <i class="fas fa-magic" style="margin-right: 8px;"></i>
                                                        YAPAY ZEKA İLE OLUŞTUR
                                                    </button>
                                                @endif
                                            </div>
                                            </div>
                                            <div class="text-center mt-2">
                                                <small style="color: #64748B; font-size: 12px;">
                                                    @if($aiUsageStatus['exceeded'])
                                                        <i class="fas fa-calendar-times" style="margin-right: 4px;"></i>
                                                        {{ $aiUsageStatus['month'] }} ayında {{ $aiUsageStatus['limit'] }} kullanım tamamlandı
                                                    @else
                                                        <i class="fas fa-arrow-down" style="margin-right: 4px;"></i>
                                                        Bu işlem aşağıdaki tüm alanları otomatik olarak doldurur ({{ $aiUsageStatus['remaining'] }} hak kaldı)
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Temel Form Alanları -->
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="title" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Başlık</label>
                                    <input type="text" name="title" value="{{ old('title') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="slug" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Slug</label>
                                    <input type="text" name="slug" value="{{ old('slug') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="summary" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Özet</label>
                                    <textarea name="summary" rows="3" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none">{{ old('summary') }}</textarea>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="content" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">İçerik</label>
                                    <textarea name="content" id="summernote" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none">{{ old('content') }}</textarea>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="image" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Görsel</label>
                                    <input type="file" name="image" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="published_at" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Yayın Tarihi</label>
                                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="flex items-center mb-4">
                                    <input type="hidden" name="is_published" value="0">
                                    <input type="checkbox" name="is_published" value="1" id="is_published" class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500" checked>
                                    <label for="is_published" class="ml-2 text-sm font-medium text-slate-700 dark:text-white/80">Yayınla</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-6">
                            <button type="submit" class="inline-block px-8 py-2 mb-0 font-bold text-center text-black uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">KAYDET</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Summernote CSS - Doğrudan sayfaya ekle -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<!-- Summernote JS - Sayfanın sonuna ekle -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
// Summernote'u window.onload ile güvenli şekilde initialize et
window.addEventListener('load', function() {
    console.log('Window fully loaded, initializing Summernote...');

    // Summernote'u initialize et
    if (typeof $ !== 'undefined' && typeof $.fn.summernote !== 'undefined') {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'İçerik girin...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        console.log('Summernote initialized successfully!');
    } else {
        console.error('jQuery or Summernote not loaded properly!');
    }
});

console.log('Script loaded!');

// Global fonksiyon olarak tanımla
window.generateAI = function() {
    alert('generateAI function called!');
    console.log('generateAI function called!');

    // Form verilerini al
    const domain = document.getElementById('ai_domain').value.trim();
    const location = document.getElementById('ai_location').value.trim();
    const companyName = document.getElementById('ai_company_name').value.trim();

    console.log('Values:', {domain, location, companyName});

    if (!domain || !location || !companyName) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    // Button'u güncelle
    const button = document.getElementById('generateWithAI');
    const originalText = button.innerHTML;
    button.disabled = true;
    button.innerHTML = 'Oluşturuluyor...';

    // AJAX isteği
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route("admin.post.generate-with-ai-ajax") }}', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

    xhr.onload = function() {
        button.disabled = false;
        button.innerHTML = originalText;

        if (xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                document.querySelector('input[name="title"]').value = response.data.title;
                document.querySelector('textarea[name="summary"]').value = response.data.summary;
                document.querySelector('input[name="slug"]').value = response.data.slug;

                // Summernote editöründe içerik güncellemesi
                $('#summernote').summernote('code', response.data.content);

                // Kullanım durumunu güncelle
                if (response.usage_status) {
                    updateUsageStatus(response.usage_status);
                }

                alert('İçerik oluşturuldu!');
            } else {
                alert('Hata: ' + response.error);
                // Limit aşıldıysa sayfayı yenile
                if (response.limit_exceeded) {
                    setTimeout(() => location.reload(), 2000);
                }
            }
        } else if (xhr.status === 429) {
            // Too Many Requests - Limit aşıldı
            const response = JSON.parse(xhr.responseText);
            alert(response.error);
            setTimeout(() => location.reload(), 2000);
        } else {
            alert('İstek hatası: ' + xhr.status);
        }
    };

    const data = `domain=${encodeURIComponent(domain)}&location=${encodeURIComponent(location)}&company_name=${encodeURIComponent(companyName)}&_token=${encodeURIComponent(document.querySelector('meta[name="csrf-token"]').content)}`;
    xhr.send(data);
}

// Kullanım durumunu güncelleme fonksiyonu
function updateUsageStatus(status) {
    // Ana kullanım panelini güncelle
    const usageDisplay = document.querySelector('.text-2xl.font-bold');
    if (usageDisplay) {
        usageDisplay.textContent = `${status.used} / ${status.limit}`;
        usageDisplay.className = status.exceeded ? 'text-2xl font-bold text-red-600' : 'text-2xl font-bold text-green-600';
    }

    // Kalan hak bilgisini güncelle
    const remainingDisplay = document.querySelector('.text-xs.text-slate-500');
    if (remainingDisplay && remainingDisplay.textContent.includes('hak kaldı')) {
        remainingDisplay.textContent = `${status.remaining} hak kaldı`;
    }

    // Eğer limit aşıldıysa butonu devre dışı bırak
    if (status.exceeded) {
        const button = document.getElementById('generateWithAI');
        button.disabled = true;
        button.style.background = 'linear-gradient(135deg, #9CA3AF 0%, #6B7280 100%)';
        button.style.cursor = 'not-allowed';
        button.style.opacity = '0.6';
        button.innerHTML = '<i class="fas fa-ban" style="margin-right: 8px;"></i>LİMİT DOLDU';

        // Alt metni güncelle
        const smallText = button.parentElement.nextElementSibling.querySelector('small');
        if (smallText) {
            smallText.innerHTML = '<i class="fas fa-calendar-times" style="margin-right: 4px;"></i>' +
                                 status.month + ' ayında ' + status.limit + ' kullanım tamamlandı';
        }
    }
}
</script>

<script>
    console.log('Script loaded!');

    // Test function - inline onclick ile çağırılacak
    function testAIFunction() {
        console.log('testAIFunction called!');
        alert('Inline onclick çalışıyor!');

        // Asıl AI fonksiyonunu çağır
        generateAIContent();
    }

    // AI content generation function
    function generateAIContent() {
        console.log('generateAIContent started');

        const domain = document.getElementById('ai_domain').value.trim();
        const location = document.getElementById('ai_location').value.trim();
        const companyName = document.getElementById('ai_company_name').value.trim();

        console.log('Form values:', { domain, location, companyName });

        if (!domain || !location || !companyName) {
            alert('Lütfen tüm AI alanlarını doldurun.');
            return;
        }

        // URL validation
        try {
            new URL(domain);
        } catch (e) {
            alert('Lütfen geçerli bir web site adresi girin.');
            return;
        }

        const button = document.getElementById('generateWithAI');
        const originalText = button.innerHTML;

        // Button loading state
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Oluşturuluyor...';

        console.log('Sending AJAX request...');

        // AJAX request with vanilla JavaScript
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("admin.post.generate-with-ai-ajax") }}', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                console.log('Response received:', xhr.status, xhr.responseText);

                // Reset button
                button.disabled = false;
                button.innerHTML = originalText;

                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        console.log('Parsed response:', response);

                        if (response.success) {
                            // Form alanlarını doldur
                            document.querySelector('input[name="title"]').value = response.data.title;
                            document.querySelector('textarea[name="summary"]').value = response.data.summary;
                            document.querySelector('input[name="slug"]').value = response.data.slug;

                            // Summernote için
                            if (typeof $ !== 'undefined' && $('#summernote').length) {
                                $('#summernote').summernote('code', response.data.content);
                            } else {
                                document.querySelector('textarea[name="content"]').value = response.data.content;
                            }

                            alert('Yapay zeka ile içerik başarıyla oluşturuldu!');
                            window.scrollTo(0, 0);
                        } else {
                            alert('Hata: ' + response.error);
                        }
                    } catch (e) {
                        console.error('JSON parse error:', e);
                        alert('Yanıt işlenemedi: ' + xhr.responseText.substring(0, 100));
                    }
                } else {
                    alert('İstek başarısız: ' + xhr.status + ' - ' + xhr.statusText);
                }
            }
        };

        const data = 'domain=' + encodeURIComponent(domain) +
                    '&location=' + encodeURIComponent(location) +
                    '&company_name=' + encodeURIComponent(companyName) +
                    '&_token=' + encodeURIComponent('{{ csrf_token() }}');

        xhr.send(data);
    }

    $(document).ready(function() {
        console.log('Document ready!');
        console.log('jQuery version:', $.fn.jquery);
        console.log('Generate button found:', $('#generateWithAI').length);

        // Summernote'un yüklenmesini bekle ve initialize et
        function initializeSummernote() {
            if (typeof $.fn.summernote !== 'undefined') {
                console.log('Summernote initializing...');
                $('#summernote').summernote({
                    height: 300,
                    placeholder: 'İçerik girin...',
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'italic', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
                console.log('Summernote initialized successfully!');
            } else {
                console.log('Summernote not ready, waiting...');
                setTimeout(initializeSummernote, 100);
            }
        }

        // Summernote'u initialize et
        initializeSummernote();

        // AI Blog Generation
        console.log('Adding event listener to generateWithAI button');

        $('#generateWithAI').on('click', function(e) {
            e.preventDefault();
            console.log('AI Generate button clicked - event triggered!');

            alert('Button clicked! Event listener is working.');

            const button = $(this);
            const originalText = button.html();

            // Form validation
            const domain = $('#ai_domain').val().trim();
            const location = $('#ai_location').val().trim();
            const companyName = $('#ai_company_name').val().trim();

            console.log('Form values:', { domain, location, companyName });

            if (!domain || !location || !companyName) {
                alert('Lütfen tüm AI alanlarını doldurun.');
                return;
            }

            // URL validation
            try {
                new URL(domain);
            } catch (e) {
                alert('Lütfen geçerli bir web site adresi girin.');
                return;
            }

            // Button loading state
            button.prop('disabled', true);
            button.html('<i class="fas fa-spinner fa-spin mr-2"></i>Oluşturuluyor...');

            console.log('Sending AJAX request to:', '{{ route("admin.post.generate-with-ai-ajax") }}');

            // AJAX request
            $.ajax({
                url: '{{ route("admin.post.generate-with-ai-ajax") }}',
                method: 'POST',
                data: {
                    domain: domain,
                    location: location,
                    company_name: companyName,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Success response:', response);
                    if (response.success) {
                        // Fill form fields with AI generated content
                        $('input[name="title"]').val(response.data.title);
                        $('textarea[name="summary"]').val(response.data.summary);
                        $('input[name="slug"]').val(response.data.slug);
                        $('#summernote').summernote('code', response.data.content);

                        // Show success message
                        showNotification('Yapay zeka ile içerik başarıyla oluşturuldu!', 'success');

                        // Scroll to top to show filled content
                        $('html, body').animate({ scrollTop: 0 }, 500);
                    } else {
                        console.log('Error in response:', response.error);
                        showNotification('Hata: ' + response.error, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', xhr, status, error);
                    console.log('Response Text:', xhr.responseText);

                    let errorMessage = 'Bir hata oluştu. Lütfen tekrar deneyin.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                        const errors = Object.values(xhr.responseJSON.errors).flat();
                        errorMessage = errors.join('<br>');
                    }

                    showNotification(errorMessage, 'error');
                },
                complete: function() {
                    // Reset button state
                    button.prop('disabled', false);
                    button.html(originalText);
                }
            });
        });
                        $('textarea[name="summary"]').val(response.data.summary);
                        $('input[name="slug"]').val(response.data.slug);
                        $('#summernote').summernote('code', response.data.content);

                        // Show success message
                        showNotification('Yapay zeka ile içerik başarıyla oluşturuldu!', 'success');

                        // Scroll to top to show filled content
                        $('html, body').animate({ scrollTop: 0 }, 500);
                    } else {
                        showNotification('Hata: ' + response.error, 'error');
                    }
                },
                error: function(xhr, status, error) {
                    let errorMessage = 'Bir hata oluştu. Lütfen tekrar deneyin.';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.errors) {
                        const errors = Object.values(xhr.responseJSON.errors).flat();
                        errorMessage = errors.join('<br>');
                    }

                    showNotification(errorMessage, 'error');
                },
                complete: function() {
                    // Reset button state
                    button.prop('disabled', false);
                    button.html(originalText);
                }
            });
        });

        // Notification function
        function showNotification(message, type) {
            const alertClass = type === 'success' ? 'bg-green-50 border-green-300 text-green-700' : 'bg-red-50 border-red-300 text-red-700';
            const icon = type === 'success' ? 'fas fa-check-circle' : 'fas fa-exclamation-triangle';

            const notification = `
                <div class="fixed top-4 right-4 z-50 max-w-md">
                    <div class="relative flex flex-col min-w-0 break-words ${alertClass} border rounded-lg shadow-lg">
                        <div class="p-4 flex items-center">
                            <i class="${icon} mr-2"></i>
                            <div>${message}</div>
                            <button class="ml-auto text-lg font-bold cursor-pointer" onclick="this.closest('.fixed').remove()">&times;</button>
                        </div>
                    </div>
                </div>
            `;

            $('body').append(notification);

            // Auto remove after 5 seconds
            setTimeout(function() {
                $('.fixed.top-4.right-4').fadeOut(function() {
                    $(this).remove();
                });
            }, 5000);
        }
    });
        }
    });
</script>
@endsection


