# 🔐 Admin Setup Guide - Khubrah-Link

## ✅ ما تم إعداده:

### 1. Migration
- ✅ إضافة حقل `is_admin` في جدول `users`
- ✅ القيمة الافتراضية: `false`

### 2. Middleware
- ✅ إنشاء `IsAdmin` middleware
- ✅ التحقق من تسجيل الدخول
- ✅ التحقق من صلاحيات الإدارة

### 3. User Model
- ✅ إضافة `is_admin` في `$fillable`
- ✅ إضافة `is_admin` في `casts` كـ `boolean`

### 4. Routes
- ✅ جميع Admin Routes محمية بـ `auth` و `admin` middleware

---

## 🚀 خطوات التفعيل:

### **الخطوة 1: تشغيل Migration**
```bash
php artisan migrate
```

### **الخطوة 2: إنشاء Admin User**

#### **الطريقة 1: Artisan Command (الأسهل والأفضل) ⭐**
```bash
# طريقة تفاعلية
php artisan admin:create

# أو مع تحديد البيانات مباشرة
php artisan admin:create --name="Admin" --email="admin@khubrahlink.com" --password="password"
```

#### **الطريقة 2: Database Seeder**
```bash
# تشغيل AdminSeeder فقط
php artisan db:seed --class=AdminSeeder

# أو تشغيل جميع Seeders (يشمل Admin)
php artisan db:seed
```

#### **الطريقة 3: عبر Tinker**
```bash
php artisan tinker
```

```php
User::create([
    'name' => 'Admin',
    'email' => 'admin@khubrahlink.com',
    'password' => bcrypt('password'),
    'is_admin' => true,
    'email_verified_at' => now(),
]);
```

#### **الطريقة 4: جعل مستخدم موجود Admin**
```bash
php artisan tinker
```

```php
# بالبريد الإلكتروني
$user = User::where('email', 'test@example.com')->first();
$user->is_admin = true;
$user->save();
```

---

## 🔑 تسجيل الدخول كـ Admin:

### **⭐ صفحة تسجيل دخول منفصلة للإدارة**

#### **مع Subdomain Setup (الطريقة الوحيدة المدعومة):**
```
URL: http://admin.khubrahlink.test/login
Email: admin@khubrahlink.com
Password: password
```

### **بعد تسجيل الدخول:**
```
سيتم توجيهك تلقائياً إلى:
http://admin.khubrahlink.test
```

### **⚠️ ملاحظة مهمة:**
- ✅ **المشروع يعمل فقط مع Subdomain Setup**
- ❌ **`php artisan serve` لا يعمل** مع `Route::domain()`
- ✅ **يجب استخدام Apache/Nginx** مع Virtual Hosts
- 📖 راجع: `docs/SUBDOMAIN_SETUP_GUIDE.md` للإعداد الكامل

---

## 📍 Admin Routes المتاحة:

| Route | الوصف |
|-------|-------|
| `/admin` | Admin Dashboard |
| `/admin/users` | Users Management |
| `/admin/reports` | Reported Content |
| `/admin/analytics` | Analytics |

---

## 🛡️ الحماية:

### **Middleware Stack:**
```php
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Admin routes here
});
```

### **التحقق:**
1. ✅ المستخدم مسجل دخول (`auth`)
2. ✅ المستخدم لديه `is_admin = true` (`admin`)

### **في حالة الوصول غير المصرح:**
- إذا لم يكن مسجل دخول → يتم التحويل لـ `/login`
- إذا لم يكن Admin → خطأ 403 (Forbidden)

---

## 🧪 اختبار Admin Access:

### **Test 1: مستخدم عادي**
```bash
# سجل دخول بمستخدم عادي
# حاول الوصول لـ /admin
# النتيجة المتوقعة: 403 Forbidden
```

### **Test 2: مستخدم Admin**
```bash
# سجل دخول بمستخدم Admin
# انتقل لـ /admin
# النتيجة المتوقعة: Admin Dashboard يظهر بنجاح
```

---

## 📝 ملاحظات مهمة:

### **1. الأمان:**
- ⚠️ لا تشارك بيانات Admin مع أحد
- ⚠️ استخدم كلمة مرور قوية
- ⚠️ غيّر كلمة المرور الافتراضية فوراً

### **2. Production:**
```php
// في Production، استخدم:
'password' => Hash::make('strong-password-here'),

// وليس:
'password' => bcrypt('password'),
```

### **3. Multiple Admins:**
```php
// يمكنك إضافة عدة Admins
$users = User::whereIn('email', [
    'admin1@example.com',
    'admin2@example.com',
])->get();

foreach ($users as $user) {
    $user->is_admin = true;
    $user->save();
}
```

---

## 🔧 Troubleshooting:

### **مشكلة: 403 Forbidden**
```bash
# تحقق من is_admin
php artisan tinker
User::where('email', 'your@email.com')->first()->is_admin;

# إذا كانت false، قم بتغييرها
$user = User::where('email', 'your@email.com')->first();
$user->is_admin = true;
$user->save();
```

### **مشكلة: Middleware not found**
```bash
# امسح الـ cache
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

### **مشكلة: Column not found**
```bash
# تأكد من تشغيل Migration
php artisan migrate

# إذا لم تعمل
php artisan migrate:fresh
```

---

## ✅ Quick Start (خطوات سريعة):

### **الطريقة الوحيدة (مع Subdomain):**
```bash
# 1. إعداد Subdomain (مرة واحدة فقط)
# راجع: docs/SUBDOMAIN_SETUP_GUIDE.md

# 2. تشغيل Migration
php artisan migrate

# 3. إنشاء Admin
php artisan admin:create

# 4. تأكد من Apache يعمل (XAMPP)
# Apache: Start

# 5. سجل دخول
# URL: http://admin.khubrahlink.test/login
# Email: (الذي أدخلته)
# Password: (الذي أدخلته)

# 6. انتقل للإدارة
# URL: http://admin.khubrahlink.test
```

### **⚠️ ملاحظة مهمة:**
- ✅ **المشروع يستخدم `Route::domain()`** للفصل بين Admin والموقع العام
- ❌ **`php artisan serve` لا يدعم** `Route::domain()`
- ✅ **يجب استخدام Apache/Nginx** مع Virtual Hosts (راجع دليل الإعداد)

---

## 🎉 تم بنجاح!

الآن يمكنك الوصول إلى لوحة الإدارة والتحكم بالمنصة! 🚀
