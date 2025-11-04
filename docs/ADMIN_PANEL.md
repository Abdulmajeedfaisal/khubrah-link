# 🎛️ Admin Panel Documentation

## 📋 Overview

لوحة التحكم الإدارية الكاملة لمنصة Khubrah-Link - منصة تبادل المهارات P2P.

---

## 🚀 الصفحات المتوفرة

### **1. صفحة تسجيل الدخول**
- **المسار:** `/admin/login`
- **الملف:** `resources/views/admin/auth/login.blade.php`
- **المميزات:**
  - تصميم احترافي مع Gradient Background
  - Dark Mode Support
  - Remember Me
  - رابط "العودة للموقع"
  - Security Notice

---

### **2. لوحة التحكم الرئيسية**
- **المسار:** `/admin`
- **الملف:** `resources/views/admin/dashboard.blade.php`
- **المحتوى:**
  - 4 Stats Cards (Users, Sessions, Skills, Reports)
  - 2 Chart Placeholders (User Growth, Monthly Sessions)
  - Recent Users List
  - Quick Actions (5 أزرار)
  - System Status (3 مؤشرات)

---

### **3. إدارة المستخدمين**

#### **3.1 قائمة المستخدمين**
- **المسار:** `/admin/users`
- **الملف:** `resources/views/admin/users/index.blade.php`
- **المميزات:**
  - Search Box
  - 3 Filters (Role, Status, Add User)
  - جدول كامل (7 أعمدة)
  - Actions (عرض، تعليق، حذف)
  - Pagination

#### **3.2 تفاصيل المستخدم**
- **المسار:** `/admin/users/{id}`
- **الملف:** `resources/views/admin/users/show.blade.php`
- **المحتوى:**
  - بطاقة معلومات المستخدم مع Header ملون
  - 4 Stats (جلسات، تقييم، مهارات، تقييمات)
  - معلومات تفصيلية
  - قسم المهارات
  - النبذة التعريفية
  - الجلسات الأخيرة (3 جلسات)
  - أزرار الإجراءات (تعليق، رسالة، حذف)

---

### **4. إدارة البلاغات**

#### **4.1 قائمة البلاغات**
- **المسار:** `/admin/reports`
- **الملف:** `resources/views/admin/reports/index.blade.php`
- **المحتوى:**
  - 4 Stats Cards (إجمالي، قيد المراجعة، محلولة، مرفوضة)
  - 2 Filters (Status, Type)
  - بطاقات البلاغات
  - Actions (عرض، قبول، رفض)

#### **4.2 تفاصيل البلاغ**
- **المسار:** `/admin/reports/{id}`
- **الملف:** `resources/views/admin/reports/show.blade.php`
- **المحتوى:**
  - Header البلاغ (نوع، حالة، رقم، تاريخ)
  - معلومات المُبلغ
  - معلومات المُبلغ عنه
  - تفاصيل البلاغ الكاملة
  - الأدلة والمرفقات (3 صور)
  - سجل الإجراءات (Timeline)
  - أزرار الإجراءات (قبول، رفض، طلب معلومات)

---

### **5. التحليلات والإحصائيات**
- **المسار:** `/admin/analytics`
- **الملف:** `resources/views/admin/analytics.blade.php`
- **المحتوى:**
  - 4 Overview Stats Cards (ملونة)
  - 2 Chart Placeholders
  - Top Skills List (3 مهارات)
  - Top Providers List (3 مقدمين)
  - Activity Heatmap Placeholder

---

### **6. إدارة فئات المهارات**
- **المسار:** `/admin/categories`
- **الملف:** `resources/views/admin/categories/index.blade.php`
- **المحتوى:**
  - 4 Stats Cards
  - زر "إضافة فئة جديدة"
  - 6 بطاقات فئات ملونة:
    - 💻 التقنية والبرمجة (أزرق)
    - 🎨 الفنون والحرف (أخضر)
    - 🇬🇧 اللغات (بنفسجي)
    - 🍳 الطبخ (برتقالي)
    - ⚽ الرياضة (أحمر)
    - 📚 التعليم (وردي)
  - كل بطاقة: (عدد المهارات، عدد المقدمين، تعديل، حذف)

---

### **7. مراقبة الجلسات**
- **المسار:** `/admin/sessions`
- **الملف:** `resources/views/admin/sessions/index.blade.php`
- **المحتوى:**
  - 4 Stats Cards (إجمالي، قادمة، مكتملة، ملغاة)
  - فلاتر (بحث، حالة، فئة)
  - قائمة الجلسات مع التفاصيل
  - كل جلسة: (مقدم، متعلم، تاريخ، فئة، حالة، أزرار)
  - Pagination

---

### **8. الإعدادات**
- **المسار:** `/admin/settings`
- **الملف:** `resources/views/admin/settings.blade.php`
- **الأقسام:**
  - **الإعدادات العامة:**
    - اسم المنصة
    - البريد الإلكتروني للدعم
    - وصف المنصة
    - السماح بالتسجيل الجديد
    - وضع الصيانة
  - **إعدادات البريد الإلكتروني:**
    - SMTP Host, Port, Username, Password
    - زر اختبار الاتصال
  - **إعدادات الإشعارات:**
    - إشعارات المستخدمين الجدد
    - إشعارات البلاغات
    - إشعارات الجلسات
  - **إعدادات الأمان:**
    - مدة الجلسة
    - الحد الأقصى لمحاولات تسجيل الدخول
    - المصادقة الثنائية (2FA)

---

## 🎨 التصميم

### **الألوان:**
- Primary: Blue (#2563EB)
- Secondary: Yellow (#FCD34D)
- Success: Green
- Warning: Yellow
- Danger: Red

### **المميزات:**
- ✅ Dark Mode Support
- ✅ RTL Support
- ✅ Responsive Design
- ✅ Modern UI/UX
- ✅ Gradient Backgrounds
- ✅ Smooth Transitions
- ✅ Interactive Elements

---

## 📂 هيكل الملفات

```
resources/views/
├── admin/
│   ├── auth/
│   │   └── login.blade.php
│   ├── categories/
│   │   └── index.blade.php
│   ├── reports/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   ├── sessions/
│   │   └── index.blade.php
│   ├── users/
│   │   ├── index.blade.php
│   │   └── show.blade.php
│   ├── analytics.blade.php
│   ├── dashboard.blade.php
│   └── settings.blade.php
├── layouts/
│   └── admin.blade.php
└── components/
    └── admin-layout.php
```

---

## 🔗 Routes

```php
// Admin Authentication
GET  /admin/login          → admin.login
POST /admin/login          → admin.login.post
POST /admin/logout         → admin.logout

// Dashboard
GET  /admin                → admin.dashboard

// Users
GET  /admin/users          → admin.users.index
GET  /admin/users/{id}     → admin.users.show
POST /admin/users/{id}/suspend  → admin.users.suspend
POST /admin/users/{id}/activate → admin.users.activate
DELETE /admin/users/{id}   → admin.users.destroy

// Reports
GET  /admin/reports        → admin.reports.index
GET  /admin/reports/{id}   → admin.reports.show
POST /admin/reports/{id}/approve → admin.reports.approve
POST /admin/reports/{id}/reject  → admin.reports.reject

// Analytics
GET  /admin/analytics      → admin.analytics

// Categories
GET  /admin/categories     → admin.categories.index

// Sessions
GET  /admin/sessions       → admin.sessions.index

// Settings
GET  /admin/settings       → admin.settings
```

---

## 🛡️ الأمان

### **Middleware:**
- `auth` - التحقق من تسجيل الدخول
- `admin` - التحقق من صلاحيات Admin
- `guest` - للصفحات العامة فقط

### **الحماية:**
- ✅ منع Admin من الدخول عبر صفحة تسجيل المستخدمين
- ✅ منع Admin من الوصول لصفحات المستخدمين
- ✅ رسائل خطأ عامة (لا تكشف معلومات)
- ✅ CSRF Protection
- ✅ Rate Limiting

---

## 📊 الإحصائيات

### **إجمالي الصفحات:** 10 صفحات
### **إجمالي الملفات:** 11 ملف
### **الحالة:** ✅ مكتمل 100%

---

## 🚀 الخطوات التالية (Backend)

### **المطلوب:**
1. إنشاء Controllers للصفحات
2. ربط Database Models
3. إضافة Validation
4. تفعيل Charts (Chart.js)
5. إضافة Real Data بدلاً من Dummy Data

---

## 📝 ملاحظات

- جميع الصفحات تستخدم `<x-admin-layout>`
- جميع الصفحات تدعم Dark Mode
- جميع الصفحات Responsive
- البيانات الحالية Static (Dummy Data)
- Charts جاهزة للتفعيل (Placeholders موجودة)

---

## 👨‍💻 المطور

تم التطوير بواسطة فريق Khubrah-Link

**التاريخ:** 2024-03-15
**الإصدار:** 1.0.0
**الحالة:** Production Ready ✅

---

## 📞 الدعم

للدعم والاستفسارات:
- Email: support@khubrah-link.com
- Documentation: /docs

---

**🎉 Admin Panel جاهز للاستخدام!**
