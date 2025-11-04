# 📘 دليل المطور الشامل - منصة خبرة لينك
## Khubrah-Link Platform - Complete Developer Guide

> **الإصدار:** 1.0  
> **التاريخ:** 2025-11-03  
> **الحالة:** جاهز للتطوير  

---

## 📋 جدول المحتويات

1. [نظرة عامة على المشروع](#overview)
2. [التحليل الشامل للمتطلبات](#requirements)
3. [هيكلة المشروع](#structure)
4. [قاعدة البيانات](#database)
5. [الواجهات المطلوبة](#interfaces)
6. [دليل التصميم](#design)
7. [خطة التطوير](#development-plan)
8. [الأمان والأداء](#security)

---

## 🎯 نظرة عامة على المشروع {#overview}

### وصف المشروع

**خبرة لينك** منصة مجتمعية P2P لتبادل المهارات بين الأفراد محلياً.

**المشكلة:**
- تفتت الخبرات المحلية
- تكلفة التدريب التقليدي
- انعدام الثقة في القنوات غير الرسمية
- عدم استغلال المواهب المحلية

**الحل:**
منصة ويب توفر بيئة موثوقة للربط بين مقدمي المهارات والباحثين عنها.

### التقنيات المستخدمة

```yaml
Backend:
  - PHP 8.2+
  - Laravel 11.x
  - Laravel Breeze
  - MySQL 8.0+
  - Pest Testing

Frontend:
  - Blade Templates
  - Alpine.js 3.x
  - Tailwind CSS 3.x
  - Vite
  - Cairo Font

Real-time:
  - Pusher / Laravel Echo
  - WebSocket
```

---

## 📊 المتطلبات الوظيفية {#requirements}

### FR-1: إدارة المستخدمين
- تسجيل حساب جديد (email, name, password, phone, location)
- تسجيل دخول/خروج
- تحقق من البريد الإلكتروني
- استعادة كلمة المرور
- تحديث الملف الشخصي

### FR-2: إدارة المهارات
- إضافة مهارات للتعليم (name, category, description, level)
- إضافة مهارات للتعلم
- تصنيف المهارات (10 فئات محددة)
- تحديد أوقات التوفر

### FR-3: البحث والاكتشاف
- بحث بالكلمات المفتاحية
- فلاتر (category, location, session type)
- ترتيب النتائج (nearest, highest rated)
- ترقيم الصفحات (12/page)

### FR-4: نظام الرسائل
- رسائل فورية بين المستخدمين
- صندوق وارد مع آخر رسالة
- إشعارات للرسائل غير المقروءة
- حد أقصى 1000 حرف/رسالة

### FR-5: الجدولة والحجز
- طلب جلسة (date, time, type)
- قبول/رفض الطلبات
- عرض الجلسات (upcoming, past)
- تحديد الجلسة كمكتملة
- إشعارات تذكيرية

### FR-6: التقييم والمراجعة
- تقييم ثنائي الاتجاه (provider ↔ learner)
- نجوم (1-5) + تعليق نصي
- عرض التقييمات على الملف الشخصي
- حساب متوسط التقييم

### FR-7: لوحة التحكم الإدارية
- عرض وإدارة المستخدمين
- تعليق/حذف الحسابات
- مراجعة المحتوى المبلغ عنه
- إحصائيات المنصة

---

## 🏗️ هيكلة المشروع {#structure}

### معمارية MVC

```
Presentation Layer (Blade + Alpine + Tailwind)
         ↓
Application Layer (Controllers + Services)
         ↓
Data Layer (Models + MySQL)
```

### هيكل المجلدات الأساسي

```
app/
├── Http/Controllers/
│   ├── Auth/          # Breeze authentication
│   ├── User/          # User features
│   ├── Admin/         # Admin panel
│   └── PublicController.php
├── Models/            # Eloquent models
├── Services/          # Business logic
└── Notifications/     # Email notifications

resources/views/
├── layouts/           # Base layouts
├── components/        # Reusable components
├── auth/              # Auth pages
├── pages/             # Public pages
├── user/              # User dashboard
└── admin/             # Admin panel

database/
├── migrations/        # Database schema
├── seeders/           # Test data
└── factories/         # Model factories
```

---

## 💾 قاعدة البيانات {#database}

### الجداول الرئيسية

#### 1. users
```sql
- user_id (PK)
- email (UNIQUE)
- password_hash
- full_name
- phone_number
- location
- profile_picture
- bio
- email_verified
- created_at
```

#### 2. skills
```sql
- skill_id (PK)
- skill_name (UNIQUE)
- category
- description
- created_at
```

#### 3. user_skills (Pivot)
```sql
- user_skill_id (PK)
- user_id (FK)
- skill_id (FK)
- skill_type (teach/learn)
- experience_level
- preferred_mode
```

#### 4. sessions
```sql
- session_id (PK)
- provider_id (FK)
- learner_id (FK)
- skill_id (FK)
- session_date
- session_time
- location_type
- status (pending/confirmed/completed/cancelled)
```

#### 5. reviews
```sql
- review_id (PK)
- session_id (FK)
- reviewer_id (FK)
- reviewee_id (FK)
- rating (1-5)
- review_text
- created_at
```

#### 6. messages
```sql
- message_id (PK)
- sender_id (FK)
- receiver_id (FK)
- message_text
- is_read
- created_at
```

### العلاقات

```
User 1:N UserSkill N:1 Skill
User 1:N Session (as provider)
User 1:N Session (as learner)
Session 1:N Review
User 1:N Message (as sender)
User 1:N Message (as receiver)
```

---

## 🎨 الواجهات المطلوبة {#interfaces}

### إجمالي الواجهات: 27 واجهة ✅

#### 🌐 واجهات الزوار (5)
1. **Landing Page** - الصفحة الرئيسية ✅
2. **Login** - تسجيل الدخول ✅
3. **Register** - التسجيل ✅
4. **Browse Skills** - استعراض المهارات ✅
5. **Public Profile** - الملف العام للمستخدم ✅

#### 👤 واجهات المستخدم (12)
6. **Dashboard** - لوحة التحكم الرئيسية ✅
7. **My Profile** - ملفي الشخصي ✅
8. **Edit Profile** - تعديل الملف ✅
9. **Manage Skills** - إدارة المهارات ✅
10. **Messages/Inbox** - الرسائل ✅
11. **My Sessions** - جلساتي ✅
12. **Book Session** - حجز جلسة ✅
13. **Session Details** - تفاصيل الجلسة ✅
14. **Submit Review** - تقديم تقييم ✅
15. **Notifications** - الإشعارات ✅
16. **Settings** - الإعدادات ✅
17. **Forgot Password** - نسيت كلمة المرور ✅

#### 🔧 واجهات المدير (10) ✅
18. **Admin Dashboard** - لوحة المدير ✅
19. **Users Management - Index** - إدارة المستخدمين ✅
20. **Users Management - Show** - تفاصيل المستخدم ✅
21. **Reports Management - Index** - إدارة البلاغات ✅
22. **Reports Management - Show** - تفاصيل البلاغ ✅
23. **Categories Management** - إدارة الفئات ✅
24. **Sessions Monitoring** - مراقبة الجلسات ✅
25. **Admin Analytics** - الإحصائيات ✅
26. **Admin Settings** - إعدادات الإدارة ✅
27. **Admin Layout** - تخطيط الإدارة (مع Sidebar) ✅

---

## 🎨 دليل التصميم والهوية {#design}

### الألوان الأساسية

```css
/* Primary Colors */
--blue-primary: #2563EB;    /* الأزرق الأساسي */
--blue-dark: #1E40AF;       /* الأزرق الداكن */
--yellow-accent: #FCD34D;   /* الأصفر المميز */

/* Neutral Colors */
--gray-50: #F8FAFC;
--gray-800: #1E293B;
--gray-900: #0F172A;

/* Status Colors */
--green-success: #10B981;
--red-error: #EF4444;
--orange-warning: #F59E0B;
```

### التايبوغرافي

```css
font-family: 'Cairo', sans-serif;

/* Headings */
h1: 3xl-6xl, font-bold
h2: 2xl-4xl, font-bold
h3: xl-2xl, font-bold

/* Body */
p: base-lg, font-normal
small: sm-xs, font-normal
```

### المكونات الأساسية

#### Buttons
```html
<!-- Primary Button -->
<button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-semibold shadow-md">
    نص الزر
</button>

<!-- Secondary Button -->
<button class="bg-gray-200 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-300 transition">
    نص الزر
</button>
```

#### Cards
```html
<div class="bg-white dark:bg-slate-800 p-6 rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 hover:shadow-xl transition">
    <!-- Card Content -->
</div>
```

#### Forms
```html
<input type="text" 
       class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-slate-700 dark:text-white"
       placeholder="النص التوضيحي">
```

### Dark Mode Support

```javascript
// Toggle Dark Mode
const darkModeToggle = () => {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', 
        document.documentElement.classList.contains('dark') ? 'dark' : 'light'
    );
};
```

### Responsive Breakpoints

```css
/* Mobile First */
sm: 640px   /* Small devices */
md: 768px   /* Tablets */
lg: 1024px  /* Laptops */
xl: 1280px  /* Desktops */
2xl: 1536px /* Large screens */
```

---

## 📅 خطة التطوير (10 أسابيع) {#development-plan}

### Sprint 1 (الأسابيع 1-2): الأساسيات

**الأهداف:**
- إعداد بيئة التطوير
- تثبيت Laravel + Breeze
- إنشاء قاعدة البيانات
- تصميم الواجهات الأساسية

**المخرجات:**
- ✅ Laravel project initialized
- ✅ Breeze authentication working
- ✅ Database migrations created
- ✅ Landing page + Auth pages

---

### Sprint 2 (الأسابيع 3-4): إدارة المستخدمين والمهارات

**الأهداف:**
- نظام الملفات الشخصية
- إدارة المهارات (CRUD)
- تصنيف المهارات
- الصفحات العامة

**المخرجات:**
- ✅ User profile pages
- ✅ Skills management
- ✅ Skill categories
- ✅ Public profile view

---

### Sprint 3 (الأسابيع 5-6): البحث والاكتشاف

**الأهداف:**
- محرك البحث المتقدم
- الفلاتر (category, location, type)
- صفحة النتائج
- الترتيب والترقيم

**المخرجات:**
- ✅ Search functionality
- ✅ Advanced filters
- ✅ Results page
- ✅ Pagination

---

### Sprint 4 (الأسابيع 7-8): الرسائل والجدولة

**الأهداف:**
- نظام الرسائل الفورية
- WebSocket integration
- حجز الجلسات
- إدارة الجلسات

**المخرجات:**
- ✅ Real-time messaging
- ✅ Session booking
- ✅ Sessions calendar
- ✅ Notifications

---

### Sprint 5 (الأسابيع 9-10): التقييمات والإدارة

**الأهداف:**
- نظام التقييم الثنائي
- لوحة التحكم الإدارية
- الاختبار الشامل
- التوثيق والنشر

**المخرجات:**
- ✅ Review system
- ✅ Admin panel
- ✅ Testing complete
- ✅ Documentation
- ✅ Deployment ready

---

## 🔒 الأمان والأداء {#security}

### إجراءات الأمان

```php
// 1. Password Hashing
use Illuminate\Support\Facades\Hash;
Hash::make($password);

// 2. CSRF Protection
@csrf

// 3. SQL Injection Prevention
User::where('email', $email)->first(); // Eloquent ORM

// 4. XSS Protection
{{ $variable }} // Blade auto-escapes

// 5. Rate Limiting
RateLimiter::for('api', function (Request $request) {
    return Limit::perMinute(60);
});
```

### تحسين الأداء

```php
// 1. Eager Loading
$users = User::with('skills', 'reviews')->get();

// 2. Caching
Cache::remember('skills', 3600, function () {
    return Skill::all();
});

// 3. Database Indexing
$table->index(['location', 'created_at']);

// 4. Query Optimization
User::select('id', 'name', 'email')->get();
```

---

## ✅ الاختبار والنشر

### اختبار Pest

```php
// tests/Feature/UserTest.php
test('user can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
    ]);
    
    $response->assertRedirect('/dashboard');
    $this->assertDatabaseHas('users', [
        'email' => 'test@example.com'
    ]);
});
```

### النشر

```bash
# 1. Build assets
npm run build

# 2. Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 3. Run migrations
php artisan migrate --force

# 4. Set permissions
chmod -R 755 storage bootstrap/cache
```

---

## 📝 ملاحظات نهائية

### الأولويات
1. **MUST** - يجب تنفيذها (MVP)
2. **SHOULD** - مهمة لكن ليست حرجة
3. **COULD** - تحسينات مستقبلية

### التواصل
- استخدم Git للتحكم بالإصدارات
- اتبع معايير PSR-12 للكود
- وثّق جميع الدوال المعقدة
- اختبر قبل كل commit

### الدعم
راجع الوثائق الرسمية:
- Laravel: https://laravel.com/docs
- Tailwind: https://tailwindcss.com/docs
- Alpine.js: https://alpinejs.dev/start-here

---

**تم بحمد الله**  
**Good Luck! 🚀**
