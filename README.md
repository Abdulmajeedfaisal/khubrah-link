# Khubrah-Link Platform
## منصة خبرة لينك - Community-Based Peer-to-Peer Skill Sharing

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white)

**منصة مجتمعية لتبادل المهارات والخبرات بين الأفراد محلياً**

[الميزات](#-الميزات) • [التثبيت](#-التثبيت) • [البنية](#-بنية-المشروع) • [الحالة](#-حالة-المشروع)

</div>

---

## 📖 نبذة عن المشروع

**خبرة لينك (Khubrah-Link)** هي منصة ويب مجتمعية متكاملة تربط بين مقدمي المهارات والباحثين عنها في نفس المنطقة الجغرافية. المشروع مبني بالكامل باستخدام **Laravel 12** مع **Blade Templates** و **Tailwind CSS** و **Alpine.js**.

### 🎯 الأهداف الرئيسية
- **ربط المجتمع المحلي** - اكتشف خبراء ومعلمين في منطقتك
- **تبادل المعرفة** - علّم ما تجيده، تعلّم ما تحتاجه
- **بناء الثقة** - نظام تقييم شامل ثنائي الاتجاه
- **جدولة مرنة** - حجز جلسات حضورية أو عن بُعد

---

## ✨ الميزات المطبقة

### 🔐 نظام المصادقة والصلاحيات
- ✅ تسجيل دخول وإنشاء حساب (Laravel Breeze)
- ✅ التحقق من البريد الإلكتروني
- ✅ إعادة تعيين كلمة المرور
- ✅ نظام صلاحيات Admin منفصل تماماً (Subdomain)
- ✅ Middleware للحماية (`auth`, `admin`, `verified`)

### 👤 إدارة الملفات الشخصية
- ✅ عرض الملف الشخصي العام والخاص
- ✅ تعديل المعلومات الشخصية (الاسم، البريد، الموقع، السيرة الذاتية)
- ✅ رفع وحذف الصورة الشخصية
- ✅ عرض إحصائيات المستخدم (المهارات، الجلسات، التقييمات)

### 🎓 إدارة المهارات
- ✅ إضافة مهارة جديدة مع جميع التفاصيل
- ✅ تعديل وحذف المهارات
- ✅ تفعيل/تعطيل المهارات
- ✅ تصنيف المهارات حسب الفئات (8 فئات)
- ✅ تحديد المستوى (مبتدئ، متوسط، متقدم، خبير)
- ✅ تحديد نوع الجلسة (حضوري، عن بُعد، كلاهما)
- ✅ تحديد السعر والمدة والموقع

### 🔍 البحث والاستكشاف
- ✅ صفحة تصفح المهارات (Browse Skills)
- ✅ بحث متقدم بالكلمات المفتاحية
- ✅ فلترة حسب الفئة، الموقع، المستوى، نوع الجلسة
- ✅ فلترة حسب نطاق السعر
- ✅ ترتيب النتائج (الأحدث، السعر، التقييم)
- ✅ Pagination للنتائج

### 📅 نظام الجلسات
- ✅ حجز جلسة مع مقدم خدمة
- ✅ اختيار التاريخ والوقت والمدة
- ✅ تحديد نوع الجلسة (حضوري/عن بُعد)
- ✅ إضافة ملاحظات للجلسة
- ✅ حالات الجلسة (قيد الانتظار، مؤكدة، مكتملة، ملغاة)
- ✅ تأكيد الجلسة (للمعلم)
- ✅ إكمال الجلسة (للمعلم)
- ✅ إلغاء الجلسة (قبل 24 ساعة)
- ✅ إعادة جدولة الجلسة
- ✅ عرض تفاصيل الجلسة الكاملة

### ⭐ نظام التقييمات
- ✅ تقييم شامل (5 نجوم)
- ✅ تقييمات فرعية (التواصل، المعرفة، الالتزام، الاحترافية)
- ✅ إضافة تعليق نصي
- ✅ عرض التقييمات في الملف العام
- ✅ حساب متوسط التقييم تلقائياً

### 💬 نظام الرسائل
- ✅ محادثات خاصة بين المستخدمين
- ✅ إرسال واستقبال الرسائل
- ✅ تحديد الرسائل كمقروءة
- ✅ عرض آخر رسالة في قائمة المحادثات
- ✅ عداد الرسائل غير المقروءة

### 🔔 نظام الإشعارات
- ✅ إشعارات قاعدة البيانات (Laravel Notifications)
- ✅ عرض الإشعارات
- ✅ تحديد كمقروء/غير مقروء
- ✅ حذف الإشعارات
- ✅ عداد الإشعارات غير المقروءة

### 🚨 نظام البلاغات
- ✅ الإبلاغ عن مستخدم أو محتوى
- ✅ تحديد السبب والوصف
- ✅ إرفاق أدلة
- ✅ حالات البلاغ (قيد الانتظار، قيد المراجعة، محلول، مرفوض)

### 🏠 الصفحات العامة
- ✅ الصفحة الرئيسية (Landing Page) مع إحصائيات حية
- ✅ صفحة تصفح المهارات
- ✅ الملف الشخصي العام
- ✅ من نحن (About)
- ✅ الشروط والأحكام (Terms)
- ✅ سياسة الخصوصية (Privacy)
- ✅ الأسئلة الشائعة (FAQ)
- ✅ اتصل بنا (Contact)

### 👨‍💼 لوحة الإدارة (Admin Panel)
- ✅ **Dashboard** - إحصائيات شاملة ورسوم بيانية
- ✅ **إدارة المستخدمين** - عرض، تعليق، تفعيل، حذف
- ✅ **إدارة المهارات** - عرض، تفعيل/تعطيل، حذف
- ✅ **مراقبة الجلسات** - عرض جميع الجلسات وحل النزاعات
- ✅ **إدارة التقييمات** - الموافقة/الرفض، حذف
- ✅ **إدارة البلاغات** - مراجعة، حل، رفض
- ✅ **إدارة الفئات** - إضافة، تعديل، حذف، ترتيب
- ✅ **التحليلات** - رسوم بيانية متقدمة (30 يوم)
- ✅ **الإعدادات** - إعدادات النظام
- ✅ **Subdomain منفصل** - `admin.khubrahlink.test`

---

## 🛠️ التقنيات المستخدمة

### Backend
- **Laravel 12.x** - PHP Framework
- **Laravel Breeze** - Authentication Scaffolding
- **MySQL 8.0+** - Relational Database
- **Eloquent ORM** - Database Abstraction
- **Pest PHP** - Testing Framework

### Frontend
- **Blade Templates** - Server-side Templating
- **Tailwind CSS 3.x** - Utility-first CSS Framework
- **Alpine.js 3.x** - Lightweight JavaScript Framework
- **Vite** - Frontend Build Tool
- **Cairo Font** - Arabic Typography

### Additional Tools
- **Composer** - PHP Dependency Manager
- **NPM** - JavaScript Package Manager
- **Git** - Version Control
- **XAMPP/Apache** - Local Development Server

---

## 📦 التثبيت

### المتطلبات الأساسية
```
- PHP >= 8.2
- Composer
- Node.js >= 18.x & NPM
- MySQL >= 8.0
- Apache/Nginx (XAMPP موصى به)
```

### خطوات التثبيت

```bash
# 1. استنساخ المشروع
git clone https://github.com/your-username/khubrah-link.git
cd khubrah-link

# 2. تثبيت Dependencies
composer install
npm install

# 3. إعداد ملف البيئة
cp .env.example .env
php artisan key:generate

# 4. تحديث .env بمعلومات قاعدة البيانات
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=khubrah_link
DB_USERNAME=root
DB_PASSWORD=

# 5. إعداد Domains (مهم جداً!)
APP_URL=http://khubrahlink.test
APP_DOMAIN=khubrahlink.test
ADMIN_DOMAIN=admin.khubrahlink.test
SESSION_DOMAIN=null

# 6. إنشاء قاعدة البيانات وتشغيل Migrations
php artisan migrate --seed

# 7. بناء Assets
npm run build
# أو للتطوير:
npm run dev

# 8. إعداد Virtual Hosts (راجع ADMIN_SETUP.md)
# يجب إعداد Apache Virtual Hosts للـ Subdomains

# 9. تشغيل Apache من XAMPP Control Panel
```

### الوصول للمشروع
- **الموقع العام:** `http://khubrahlink.test`
- **لوحة الإدارة:** `http://admin.khubrahlink.test/login`
- **بيانات Admin الافتراضية:**
  - Email: `admin@khubrahlink.com`
  - Password: `password`

⚠️ **ملاحظة مهمة:** المشروع يستخدم `Route::domain()` ولا يعمل مع `php artisan serve`

---

## 📁 بنية المشروع

```
khubrah-link/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/              # Admin Controllers (9 ملفات)
│   │   │   ├── Auth/               # Authentication Controllers
│   │   │   ├── ContactController.php
│   │   │   ├── DashboardController.php
│   │   │   ├── MessageController.php
│   │   │   ├── NotificationController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── PublicProfileController.php
│   │   │   ├── ReportController.php
│   │   │   ├── ReviewController.php
│   │   │   ├── SessionController.php
│   │   │   └── SkillController.php
│   │   ├── Middleware/
│   │   │   ├── IsAdmin.php         # Admin Middleware
│   │   │   └── ConfigureSession.php
│   │   └── Requests/
│   │       ├── ProfileUpdateRequest.php
│   │       ├── ReviewRequest.php
│   │       ├── SessionRequest.php
│   │       └── SkillRequest.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Conversation.php
│   │   ├── Message.php
│   │   ├── Report.php
│   │   ├── Review.php
│   │   ├── Session.php
│   │   ├── Skill.php
│   │   └── User.php
│   └── Helpers/
│       └── helpers.php              # 25+ Helper Functions
├── database/
│   ├── migrations/                  # 15 Migration Files
│   └── seeders/
│       ├── AdminSeeder.php
│       ├── CategorySeeder.php       # 8 Categories
│       ├── UsersSeeder.php          # 50 Users
│       ├── SkillsSeeder.php         # 25 Skills
│       ├── SessionsSeeder.php       # 100 Sessions
│       └── ReportsSeeder.php        # 15 Reports
├── resources/
│   ├── views/
│   │   ├── admin/                   # 12 Admin Views
│   │   ├── auth/                    # 6 Auth Views
│   │   ├── pages/                   # 8 Public Pages
│   │   ├── profile/                 # 2 Profile Views
│   │   ├── skills/                  # 2 Skills Views
│   │   ├── sessions/                # 3 Sessions Views
│   │   ├── messages/                # 2 Messages Views
│   │   ├── reviews/                 # 1 Review View
│   │   ├── notifications/           # 1 Notification View
│   │   ├── components/              # 17 Reusable Components
│   │   ├── layouts/                 # 3 Layouts
│   │   ├── dashboard.blade.php
│   │   └── settings.blade.php
│   ├── css/
│   │   └── app.css                  # Tailwind CSS
│   └── js/
│       ├── app.js
│       └── bootstrap.js
├── routes/
│   ├── web.php                      # User Routes (30+ routes)
│   ├── admin.php                    # Admin Routes (20+ routes)
│   ├── auth.php                     # Auth Routes
│   └── console.php
├── public/
│   └── picture_report/              # Screenshots
├── .env.example
├── composer.json
├── package.json
├── tailwind.config.js
├── vite.config.js
├── ADMIN_SETUP.md
└── README.md
```

---

## 🗄️ قاعدة البيانات

### الجداول المطبقة (15 جدول)
1. **users** - المستخدمون (مع حقول Admin)
2. **categories** - فئات المهارات (8 فئات)
3. **skills** - المهارات
4. **user_skills** - علاقة المستخدمين بالمهارات
5. **skill_sessions** - الجلسات
6. **reviews** - التقييمات
7. **reports** - البلاغات
8. **conversations** - المحادثات
9. **messages** - الرسائل
10. **notifications** - الإشعارات
11. **cache** - التخزين المؤقت
12. **jobs** - قائمة الانتظار
13. **failed_jobs** - المهام الفاشلة
14. **password_reset_tokens** - إعادة تعيين كلمة المرور
15. **sessions** - الجلسات

### العلاقات المطبقة
- User → Skills (One to Many)
- User → Sessions as Teacher (One to Many)
- User → Sessions as Learner (One to Many)
- User → Reviews (One to Many)
- User → Reports (One to Many)
- User → Conversations (Many to Many)
- Skill → Category (Many to One)
- Skill → Sessions (One to Many)
- Session → Review (One to One)
- Conversation → Messages (One to Many)

---

## 🎨 الواجهات المطبقة

### واجهات المستخدمين (18 واجهة) ✅
1. ✅ Landing Page - الصفحة الرئيسية
2. ✅ Browse Skills - تصفح المهارات
3. ✅ Skill Details - تفاصيل المهارة
4. ✅ Public Profile - الملف العام
5. ✅ Dashboard - لوحة التحكم
6. ✅ My Profile - ملفي الشخصي
7. ✅ Edit Profile - تعديل الملف
8. ✅ Manage Skills - إدارة مهاراتي
9. ✅ Sessions Index - جلساتي
10. ✅ Book Session - حجز جلسة
11. ✅ Session Details - تفاصيل الجلسة
12. ✅ Create Review - إضافة تقييم
13. ✅ Messages Index - الرسائل
14. ✅ Conversation - المحادثة
15. ✅ Notifications - الإشعارات
16. ✅ Settings - الإعدادات
17. ✅ About/Terms/Privacy/FAQ - صفحات ثابتة
18. ✅ Contact - اتصل بنا

### واجهات الإدارة (12 واجهة) ✅
1. ✅ Admin Login - تسجيل دخول الإدارة
2. ✅ Admin Dashboard - لوحة التحكم
3. ✅ Users Index - قائمة المستخدمين
4. ✅ User Details - تفاصيل المستخدم
5. ✅ Skills Index - قائمة المهارات
6. ✅ Skill Details - تفاصيل المهارة
7. ✅ Sessions Index - قائمة الجلسات
8. ✅ Session Details - تفاصيل الجلسة
9. ✅ Reviews Index - قائمة التقييمات
10. ✅ Reports Index - قائمة البلاغات
11. ✅ Report Details - تفاصيل البلاغ
12. ✅ Categories Management - إدارة الفئات
13. ✅ Analytics - التحليلات
14. ✅ Admin Settings - إعدادات الإدارة
15. ✅ Admin Profile - ملف المدير

---

## 🚀 حالة المشروع

### ✅ مكتمل 100%
- [x] **Frontend** - جميع الواجهات (30 واجهة)
- [x] **Database Design** - 15 جدول مع علاقات كاملة
- [x] **Migrations** - 15 migration file
- [x] **Models** - 8 models مع relationships
- [x] **Controllers** - 18 controller (User + Admin)
- [x] **Requests** - 4 Form Request classes
- [x] **Middleware** - Admin middleware
- [x] **Routes** - 50+ routes (web + admin)
- [x] **Seeders** - 6 seeders مع بيانات واقعية
- [x] **Helpers** - 25+ helper functions
- [x] **Authentication** - Laravel Breeze
- [x] **Authorization** - Admin system
- [x] **Validation** - جميع النماذج
- [x] **Dark Mode** - دعم كامل
- [x] **RTL Support** - دعم العربية
- [x] **Responsive Design** - جميع الأجهزة

### 🔄 قيد التطوير
- [ ] Real-time Messaging (WebSocket/Pusher)
- [ ] Real-time Notifications (Broadcasting)
- [ ] Email Notifications
- [ ] File Uploads (Skills images)
- [ ] Advanced Search (Elasticsearch)
- [ ] Payment Integration
- [ ] API Development
- [ ] Unit & Feature Tests

### 📅 مخطط مستقبلي
- [ ] Mobile App (Flutter)
- [ ] Video Call Integration
- [ ] AI Recommendations
- [ ] Multi-language Support
- [ ] Advanced Analytics
- [ ] Reporting System

---

## 🧪 الاختبار

```bash
# تشغيل جميع الاختبارات
php artisan test

# اختبار محدد
php artisan test --filter=UserTest

# مع تغطية الكود
php artisan test --coverage

# Pest (المستخدم في المشروع)
./vendor/bin/pest
```

---

## 📄 الترخيص

هذا المشروع مرخص تحت [MIT License](LICENSE).

---

## 📞 التواصل

- **Email:** abdulmajeed.faisal.abdo@gmail.com
- **GitHub:** [Abdulmajeedfaisal](https://github.com/Abdulmajeedfaisal)

---

<div align="center">

**صُنع بـ ❤️ بواسطة [Abdulmajeedfaisal](https://github.com/Abdulmajeedfaisal)**

**Made with ❤️ [Abdulmajeedfaisal](https://github.com/Abdulmajeedfaisal)**

[⬆ العودة للأعلى](#khubrah-link-platform)

</div>
