# Khubrah-Link Platform
## منصة خبرة لينك - Community-Based Peer-to-Peer Skill Sharing

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

**منصة مجتمعية لتبادل المهارات والخبرات بين الأفراد محلياً**

[الميزات](#-الميزات) • [التثبيت](#-التثبيت) • [التوثيق](#-التوثيق) • [المساهمة](#-المساهمة)

</div>

---

## نبذة عن المشروع

**خبرة لينك** هي منصة ويب مجتمعية تربط بين مقدمي المهارات (Skill Providers) والباحثين عنها (Skill Seekers) في نفس المنطقة الجغرافية. تهدف المنصة إلى:

- **ربط المجتمع المحلي** - اكتشف خبراء في منطقتك
- **تبادل المعرفة** - علّم ما تجيده، تعلّم ما تحتاجه
- **بناء الثقة** - نظام تقييم ثنائي الاتجاه
- **جدولة مرنة** - حدد الأوقات التي تناسبك

---

## الميزات

### للمستخدمين
- **إدارة الملف الشخصي** - أنشئ ملفك وأضف مهاراتك
- **بحث متقدم** - ابحث بالمهارة، الموقع، والفئة
- **رسائل فورية** - تواصل مباشرة مع الآخرين
- **حجز الجلسات** - احجز جلسات حضورية أو عن بُعد
- **نظام التقييم** - قيّم وكن مقيّماً
- **إشعارات** - تنبيهات للرسائل والجلسات

### للمسؤولين
- **لوحة تحكم** - إحصائيات شاملة
- **إدارة المستخدمين** - تعليق وحذف الحسابات
- **مراجعة البلاغات** - إدارة المحتوى المبلغ عنه
- **تحليلات** - متابعة نمو المنصة

### التصميم
- **Dark Mode** - وضع داكن مريح للعين
- **Responsive** - متجاوب مع جميع الأجهزة
- **RTL Support** - دعم كامل للغة العربية
- **Modern UI** - تصميم عصري وجذاب

---

## التقنيات المستخدمة

### Backend
- **Laravel 11.x** - PHP Framework
- **Laravel Breeze** - Authentication
- **MySQL 8.0+** - Database
- **Pest** - Testing Framework

### Frontend
- **Blade Templates** - Templating Engine
- **Alpine.js 3.x** - JavaScript Framework
- **Tailwind CSS 3.x** - CSS Framework
- **Vite** - Build Tool

### Additional
- **Pusher/Laravel Echo** - Real-time Messaging
- **Cairo Font** - Arabic Typography

---

## التثبيت

### المتطلبات
- PHP 8.2 أو أحدث
- Composer
- Node.js & NPM
- MySQL 8.0+

### خطوات التثبيت

```bash
# 1. Clone المشروع
git clone https://github.com/your-username/khubrah-link.git
cd khubrah-link

# 2. تثبيت Dependencies
composer install
npm install

# 3. إعداد البيئة
cp .env.example .env
php artisan key:generate

# 4. تحديث .env
# للتطوير المحلي مع Subdomain (الموصى به):
APP_URL=http://khubrahlink.test
APP_DOMAIN=khubrahlink.test
ADMIN_DOMAIN=admin.khubrahlink.test
SESSION_DOMAIN=null

# 5. إعداد قاعدة البيانات
# قم بتعديل .env بمعلومات قاعدة البيانات
php artisan migrate --seed

# 6. بناء Assets
npm run dev

# 7. إعداد Subdomain (اختياري لكن موصى به)
# راجع: docs/SUBDOMAIN_SETUP_GUIDE.md

# 8. تشغيل المشروع
# تأكد من Apache يعمل (XAMPP Control Panel)
```

**الوصول للمشروع:**
- الموقع العام: `http://khubrahlink.test`
- لوحة الإدارة: `http://admin.khubrahlink.test/login`

**⚠️ ملاحظة:** المشروع يستخدم `Route::domain()` ولا يعمل مع `php artisan serve`

---

## التوثيق

### الملفات المرجعية

| الملف | الوصف |
|--------|-------|
| [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md) | دليل المطور الشامل |
| [ADMIN_SETUP.md](ADMIN_SETUP.md) | إعداد لوحة الإدارة |
| [docs/SUBDOMAIN_SETUP_GUIDE.md](docs/SUBDOMAIN_SETUP_GUIDE.md) | دليل إعداد Subdomain |
| [DATABASE_SCHEMA.md](DATABASE_SCHEMA.md) | مخطط قاعدة البيانات |
| [INTERFACES_CHECKLIST.md](INTERFACES_CHECKLIST.md) | قائمة الواجهات |
| [FRONTEND_STATUS.md](FRONTEND_STATUS.md) | حالة Frontend (100% ✅) |
| [BACKEND_HANDOFF.md](BACKEND_HANDOFF.md) | دليل Backend (27 واجهة) |
| [docs/ADMIN_PANEL.md](docs/ADMIN_PANEL.md) | لوحة الإدارة (10 صفحات) |
| [PROJECT_SUMMARY.md](PROJECT_SUMMARY.md) | ملخص المشروع |

### بنية المشروع
├── app/
│   ├── Http/Controllers/    # Controllers
│   ├── Models/              # Eloquent Models
│   └── Services/            # Business Logic
├── database/
│   ├── migrations/          # Database Migrations
│   └── seeders/             # Data Seeders
├── resources/
│   ├── views/               # Blade Templates
│   ├── css/                 # Styles
│   └── js/                  # JavaScript
├── routes/
│   ├── web.php              # Web Routes
│   └── admin.php            # Admin Routes
└── tests/                   # Tests
```

---

## الاختبار

```bash
# تشغيل جميع الاختبارات
php artisan test

# اختبار محدد
php artisan test --filter=UserTest

# مع تغطية الكود
php artisan test --coverage
```

---

## لقطات الشاشة

### الصفحة الرئيسية
![Landing Page](picture_report/1.png)

### لوحة التحكم
*قريباً...*

---

## خارطة الطريق

### ✅ المكتمل (Frontend 100% ✅)
- [x] إعداد Laravel + Breeze
- [x] تصميم قاعدة البيانات
- [x] **جميع واجهات المستخدمين (18 واجهة)**
- [x] **جميع واجهات الإدارة (10 واجهات)**
- [x] Landing Page
- [x] Browse Skills
- [x] Public Profile
- [x] Dashboard
- [x] Profile Management
- [x] Skills Management
- [x] Sessions (Index, Book, Details)
- [x] Reviews System
- [x] Messages UI
- [x] Notifications
- [x] Settings
- [x] **Admin Dashboard**
- [x] **Users Management (Index + Show)**
- [x] **Reports Management (Index + Show)**
- [x] **Categories Management**
- [x] **Sessions Monitoring**
- [x] **Admin Analytics**
- [x] **Admin Settings**

### 🔄 قيد التطوير (Backend)
- [ ] Database Migrations
- [ ] Models & Relationships
- [ ] Controllers Implementation
- [ ] Validation & Business Logic
- [ ] Seeders

### 📅 المخطط
- [ ] نظام الرسائل الفورية (WebSocket)
- [ ] Real-time Notifications
- [ ] لوحة الإدارة
- [ ] Testing & Deployment

---

## المساهمة

نرحب بمساهماتكم! يرجى اتباع الخطوات التالية:

1. Fork المشروع
2. أنشئ Branch للميزة (`git checkout -b feature/AmazingFeature`)
3. Commit التغييرات (`git commit -m 'Add some AmazingFeature'`)
4. Push للـ Branch (`git push origin feature/AmazingFeature`)
5. افتح Pull Request

---

##  الاعتمادات

تم تطوير وتصميم هذا المشروع من قبل [Abdulmajeedfaisal](https://github.com/Abdulmajeedfaisal)   كمشروع تخرج لطلاب جامعة الباحة.

##  الترخيص

هذا المشروع مرخص تحت [MIT License](LICENSE).

---

**Final Year Project - Albaha University**

- Abdul Wahab Ahmed Abdullah AL-Suhaimi (443036955)
- Musaad Hussin Musaad AL-Shamrani (444027667)
- Muhannad AHMAD Hassan Al-Zahrani (444027702)
- Sultan Khalid Abdullrahim Alzahrani (444025350)
- Rayan Ahmed Abdullah Al-Zahrani (444015731)

**المشرف:** Dr. Mufrah Waqddani

---

## التواصل

- **Email:** [project@khubrahlink.com](mailto:project@khubrahlink.com)
- **GitHub:** [Abdulmajeedfaisal](https://github.com/Abdulmajeedfaisal)

---

<div align="center">

**صُنع بـ ❤️ بواسطة [Abdulmajeedfaisal](https://github.com/Abdulmajeedfaisal)**

**Made with ❤️ by [Abdulmajeedfaisal](https://github.com/Abdulmajeedfaisal) in Saudi Arabia**

[⬆ العودة للأعلى](#-khubrah-link-platform)

</div>
